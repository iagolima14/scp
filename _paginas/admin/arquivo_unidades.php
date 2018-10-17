<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>
<?php
    include_once '../../banco_de_dados/conexao.php';

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

                    $querySelect = $link->query("SELECT * FROM tb_itens WHERE nome_item = '$nome_item' ");
                    $num_linhas = $querySelect->num_rows;

                    if ($num_linhas < 1) {
                        echo "<script>alert('item não encontrado Item:$nome_item ID= $i')</script>";
                        $texto = "ITEM NÃO LOCALIZADO: Nome: ".$nome_item."  ----  Patrimônio: ".$patrimonio."\r\n";
                        fwrite($fp1, "$texto");
                    }
                    else if ($num_linhas > 1) {
                        echo "<script>alert('foram encontrados mais de 1 item com a mesma descricao Item:$nome_item')</script>";
                        $texto = "ITEM EM DUPLICIDADE: Nome: ".$nome_item."  ----  Patrimônio: ".$patrimonio."\r\n";
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
                        $data_aquisicao_sql = substr($data_aquisicao, 6)."-".substr($data_aquisicao, 3, -5)."-".substr($data_aquisicao, 0, -8);
                        $queryInsert = $link->query("insert into tb_patrimonio (num_patrimonio, id_item, descricao, id_unidade, sit_fisica, data_aquisicao, valor_aquisicao) values ('$patrimonio', '$id_item', '$descricao_item', '$id_unidade', '$sit_fisica', '$data_aquisicao_sql', '$valor_aquisicao') ");
                        $affected_rows = mysqli_affected_rows($link);

                        if ($affected_rows > 0){
                            $j++;
                            $texto = "ITEM ADICIONADO COM SUCESSO:\r\n Nome: ".$nome_item."\r\nPatrimônio: ".$patrimonio."\r\nDescrição:".$descricao_item."\r\nSit. Física:".$sit_fisica."\r\n\r\n";
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
