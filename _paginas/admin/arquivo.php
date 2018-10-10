<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>
<?php

    if (!empty($_FILES['arquivo']['tmp_name'])) {
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        if ($extensao != "xml") {
            echo "<script>alert('O arquivo deve ser salvo na extenção .xml. Carregue o arquivo correto') </script>";
            echo "<script> location.href='carrega_arquivo.php'</script>";
        } else {
            $arquivo = new DomDocument();
            $arquivo->load($_FILES['arquivo']['tmp_name']);
            $linhas = $arquivo->getElementsByTagName("Row");
            $primeira_linha = true;
            $i = 0;
            $j = 0;
            $k = 0;
            $fp = fopen("relatorio_novos_itens.txt", "w");
            $fp2 = fopen("relatorio_itens_agregados.txt", "w");
            foreach ($linhas as $linha) {
                if ($primeira_linha == false) {
                    $i++;
                    $cod_nome = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                    $quantidade = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                    $codigo_item = substr($cod_nome, 0, 9);
                    $nome_item = substr($cod_nome, 12);
                    $permitidas = "abcdefghijklmnopqrstuvxzyw0123456789ABCDEFGHIJKLMNOPQRSTUVXZYW";


                    $tamanho_permitidas = strlen($permitidas);
                    $array_permitidas = str_split($permitidas);
                    $tamanho_nome_item = strlen($nome_item);
                    $array_nome_item = str_split($nome_item);

                    $cont_nome = 0;
                    $nome_para_salvar_no_banco = $nome_item;

                    for ($i = $tamanho_nome_item; $i >0; $i--) {
                        $diferente = 0;
                        for ($p = 0; $p < $tamanho_permitidas; $p++) {
                            if ($array_nome_item[$i-1] === $array_permitidas[$p]) {
                                $control = 1;
                                break;
                            }
                            else {
                                $diferente++;
                                $control = 0;
                            }
                        }
                        if ($control) {
                            break;
                        }
                        if($diferente == $tamanho_permitidas){
                            $nome_para_salvar_no_banco = substr($nome_para_salvar_no_banco, 0, -1);
                        }
                    }

                    $querySelect = $link->query("SELECT * FROM tb_itens WHERE nome_item = '$nome_para_salvar_no_banco' ");
                    $num_linhas = $querySelect->num_rows;
                    if($num_linhas == 0){
                        $queryInsert = $link->query("insert into tb_itens (id, nome_item, codigo, quantidade, disponivel) values (default, '$nome_para_salvar_no_banco','$codigo_item','$quantidade','$quantidade') ");
                        $j++;
                        $texto = "NOVO ITEM: Nome: ".$nome_para_salvar_no_banco."  ----  Código: ".$codigo_item."\r\n";
                        fwrite($fp, "$texto");
                    }
                    else{
                        $k++;
                        $registros = $querySelect->fetch_assoc();
                        $id_item = $registros['id'];
                        $codigo_item_banco = $registros['codigo'];
                        $nome_item_banco = $registros['nome_item'];
                        $qnt_antiga = $registros['quantidade'];
                        $qnt_nova = $qnt_antiga + $quantidade;
                        $queryInsert = $link->query("UPDATE tb_itens SET quantidade = '$qnt_nova' WHERE id='$id_item'");
                        $texto = "\r\n ITEM AGREGADO: ".$nome_para_salvar_no_banco."  |||||  ".$codigo_item."   --->  ".$codigo_item_banco."\r\n";
                        fwrite($fp2, "$texto");
                    }


                }
                $primeira_linha = false;
            }
            fclose($fp);
            fclose($fp2);
        }
    }


    ?>
    <div class="container">
        <div class="col s6 offset-s3 ">
            <a href='relatorio_novos_itens.txt' download="Relatório de Novos Itens.txt">relatorio_novos_itens.txt</a><br><br>
            <a href='relatorio_itens_agregados.txt' download="Relatório de Itens Agregados.txt">relatorio_itens_agregados.txt</a>
            Foram criados <?php echo $j ?> novos itens <br>
            Foram agregados <?php echo $k ?> itens<br>

            <input type="button" value="limpar" name="limpar" class="btn red"">
            <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="location.href='tela-admin.php'">
        </div>
    </div>
    <?php
        include_once ("../../_includes/comum/footer_comum.inc.php");
    ?>
