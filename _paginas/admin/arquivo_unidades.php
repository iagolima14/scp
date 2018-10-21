<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>
<?php
    include_once '../../banco_de_dados/conexao.php';
    $origem     = filter_input(INPUT_POST, 'origem', FILTER_SANITIZE_NUMBER_INT);
    echo "<br>";
    if (!empty($_FILES['arquivo']['tmp_name'])) {
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        $id_unidade = $_POST['id_unidade'];
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
            $nao_encontrado =0;
            $duplicado = 0;
            $fp1 = fopen("itens_nao_adicionados.txt", "w");
            $fp2 = fopen("itens_em_duplicidade.txt", "w");
            $fp3 = fopen("itens_add_corretamente.txt", "w");
            foreach ($linhas as $linha) {
                if ($primeira_linha == false) {
                    $i++;
                    $patrimonio = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                    //$patrimonio_antigo = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                    $nome_desc = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                    $data_aquisicao = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                    $sit_fisica = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                    $valor_aquisicao = $linha->getElementsByTagName("Data")->item(4)->nodeValue;

                    $valores_item = explode(" - DESCRICAO: ", $nome_desc);

                    $nome_item = $valores_item[0];
                    $descricao_item = isset($valores_item[1]) ? $valores_item[1] : "SD";



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

                    if ($num_linhas < 1) {
                        $nao_encontrado++;
                        echo "<script>alert('item não encontrado Item:$nome_para_salvar_no_banco ID= $i')</script>";
                        $texto = $nao_encontrado."ITEM NÃO LOCALIZADO: Nome: ".$nome_para_salvar_no_banco."  ----  Patrimônio: ".$patrimonio."\r\n";
                        fwrite($fp1, "$texto");
                    }
                    else if ($num_linhas > 1) {
                        $duplicado++;
                        echo "<script>alert('foram encontrados mais de 1 item com a mesma descricao Item:$nome_para_salvar_no_banco')</script>";
                        $texto = $duplicado."ITEM EM DUPLICIDADE: Nome: ".$nome_para_salvar_no_banco."  ----  Patrimônio: ".$patrimonio."\r\n";
                        fwrite($fp2, "$texto");
                    }
                    else {
                        $registros = $querySelect->fetch_assoc();
                        $id_item = $registros['id'];

                        /*echo "ID: $i <br>";
                        echo "Patrimonio: $patrimonio <br>";
                        echo "Patrimonio Antigo: $patrimonio_antigo <br>";
                        echo "ID_ITEM: $id_item <br>";
                        echo "Nome do Item: $nome_item <br>";
                        echo "Descrição: $descricao_item <br>";
                        echo "ID_UNIDADE: $id_unidade <br>";
                        echo "Sit. Física: $sit_fisica <br>";
                        echo "Data Aquisição: $data_aquisicao <br>";
                        echo "Valor Aquisição: $valor_aquisicao <br>";
                        echo "---------------------------------------------------------------------------------------<br>";*/
                        if($origem == 0){
                            $data_aquisicao_sql = substr($data_aquisicao, 6)."-".substr($data_aquisicao, 3, -5)."-".substr($data_aquisicao, 0, -8);
                            $queryInsert = $link->query("insert into tb_patrimonio (num_patrimonio, id_item, descricao, id_unidade, sit_fisica, data_aquisicao, valor_aquisicao) values ('$patrimonio', '$id_item', '$descricao_item', '$id_unidade', '$sit_fisica', '$data_aquisicao_sql', '$valor_aquisicao') ");
                            $affected_rows = mysqli_affected_rows($link);
                            if ($affected_rows > 0){
                                $j++;
                                $texto = $j."ITEM ADICIONADO COM SUCESSO:\r\n Nome: ".$nome_para_salvar_no_banco."\r\nPatrimônio: ".$patrimonio."\r\nDescrição:".$descricao_item."\r\nSit. Física:".$sit_fisica."\r\n\r\n";
                                fwrite($fp3, "$texto");
                            }
                        }
                        else{
                            $j++;
                            $texto = $j."ITEM ADICIONADO COM SUCESSO:\r\n Nome: ".$nome_para_salvar_no_banco."\r\nPatrimônio: ".$patrimonio."\r\nDescrição:".$descricao_item."\r\nSit. Física:".$sit_fisica."\r\n\r\n";
                            fwrite($fp3, "$texto");
                        }
                    }
                }
                $primeira_linha = false;
            }
            fclose($fp1);
            fclose($fp2);
            fclose($fp3);
        }


    }
?>
<div class="container">
    <div class="col s6 offset-s3 ">
        <a href='itens_nao_adicionados.txt' download="Relatório de Itens não Adicionados.txt">itens_nao_adicionados.txt</a><br><br>
        <a href='itens_em_duplicidade.txt' download="Relatório de Itens Em Duplicidade.txt">itens_em_duplicidade.txt</a><br><br>
        <a href='itens_add_corretamente.txt' download="Relatório de Itens Adicionados Corretamente.txt">itens_add_corretamente.txt</a><br><br>
        <p>Foram adicionados <?php echo $j ?> ao estoque da Unidade</p>
        <input type="button" value="limpar" name="limpar" class="btn red"">
        <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="location.href='tela-admin.php'">
    </div>
</div>
<?php
    include_once ("../../_includes/comum/footer_comum.inc.php");
?>
