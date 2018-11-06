<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>
<?php

    if (!empty($_FILES['arquivo']['tmp_name'])) {
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        $nome_arquivo_enviado = pathinfo($_FILES['arquivo']['name'], PATHINFO_FILENAME);
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
            $cont_itens = 0;
            $cont_lanc = 0;
            $nome_novos_itens = "../../_arquivos/_relatorios/geral/NOVOS ITENS - ".$nome_arquivo_enviado.".txt";
            $nome_itens_duplicados = "../../_arquivos/_relatorios/geral/ITENS DUPLICADOS - ".$nome_arquivo_enviado.".txt";
            $fp = fopen($nome_novos_itens, "w");
            $fp2 = fopen($nome_itens_duplicados, "w");
            $texto = "SECRETARIA DE ADMINISTRAÇÃO PENITENCIÁRIA E RESSOCIALIZAÇÃO - SEAP\r\n";
            $texto .= "DIRETORIA GERAL (DG)  -  DIRETORIA ADMINISTRATIVA (DA)\r\n";
            $texto .= "SISTEMA DE CONTROLE PATRIMONIAL - SISCOP\r\n";
            $texto .= "----------------------------------------------------------------------------------------\r\n\r\n";
            fwrite($fp, "$texto");
            fwrite($fp2, "$texto");



            date_default_timezone_set('America/Sao_Paulo');
            $data_aquisicao = date('Y/m/d');
            $dataLocal = date('Y/m/d H:i:s', time());
            $queryInsert_lancamento = $link->query("insert into tb_lancamentos (num_doc, id_origem, data_aquisicao, id_operador, diaehora) values ('IMPORTADO SIAP','3', '$data_aquisicao', '$id_user', '$dataLocal') ");
            $affected_row = mysqli_affected_rows($link);
            if ($affected_row > 0){
                $ultimo_id_lancamento = $link->insert_id;
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
                            $queryInsert2 = $link->query("insert into tb_itens (nome_item, codigo) values ('$nome_para_salvar_no_banco','$codigo_item') ");
                            $ultimo_id_item = $link->insert_id;
                            $affected_row2 = mysqli_affected_rows($link);
                            if ($affected_row2 > 0){
                               $cont_itens++;
                            }
                            $queryInsert3 = $link->query("insert into tb_itens_lancamento (id_item, id_lancamento, quantidade, adicionado) values ('$ultimo_id_item','$ultimo_id_lancamento', '$quantidade', 'S') ");
                            $affected_row3 = mysqli_affected_rows($link);
                            if ($affected_row3 > 0){
                                $cont_lanc++;
                            }
                            $j++;
                           $texto = "| NOVO ITEM: | Nome: ".$nome_para_salvar_no_banco." | Código: ".$codigo_item." |\r\n";
                           fwrite($fp, "$texto");
                        }
                        else{
                            $k++;
                            $registros = $querySelect->fetch_assoc();
                            $id_item = $registros['id'];
                            $codigo_item_banco = $registros['codigo'];

                            $querySelect2 = $link->query("SELECT * FROM tb_itens_lancamento WHERE id_item = '$id_item' and id_lancamento = '$ultimo_id_lancamento'");
                            $row = $querySelect2->fetch_assoc();
                            $qnt_antiga = $row['quantidade'];
                            $id_do_lancamento = $row['id'];
                            $qnt_nova = $qnt_antiga + $quantidade;
                            $link->query("UPDATE tb_itens_lancamento SET quantidade = '$qnt_nova' WHERE id = '$id_do_lancamento'");
                            $texto = "| ITEM AGREGADO: | Nome: ".$nome_para_salvar_no_banco." | Código Suprimido: ".$codigo_item."   --->  Código Destino: ".$codigo_item_banco." |\r\n";
                            fwrite($fp2, "$texto");
                        }


                    }
                    $primeira_linha = false;
                }
                fclose($fp);
                fclose($fp2);
            }}
        }


    ?>
    <div class="container">
        <div class="col s6 offset-s5 ">
            <br><br><br><br><br><br><br><br>
            <a href='<?php echo $nome_novos_itens ?>' download="Relatório de Novos Itens.txt">NOVOS ITENS</a><br><br>
            <a href='<?php echo $nome_itens_duplicados ?>' download="Relatório de Itens Agregados.txt">ITENS AGREGADOS</a><br><br>
            Foram criados <?php echo $cont_itens ?> novos itens na tabela de itens <br><br><br>
            Foram criados <?php echo $cont_lanc ?> novos itens na tabela de lancamentos <br><br><br>
            Foram agregados <?php echo $k ?> itens<br><br><br>

            <input type="button" value="limpar" name="limpar" class="btn red"">
            <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="location.href='tela-admin.php'">
        </div>
    </div>
    <?php
        include_once ("../../_includes/comum/footer_comum.inc.php");
    ?>