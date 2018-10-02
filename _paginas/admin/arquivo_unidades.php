<pre>
<?php
include_once '../../banco_de_dados/conexao.php';
//    $dados = $_FILES['arquivo'];
//    var_dump($dados);

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
        //var_dump($arquivo);

        $linhas = $arquivo->getElementsByTagName("Row");
        //var_dump($linhas);

        $primeira_linha = true;
        $i = 0;
        foreach ($linhas as $linha) {
            if ($primeira_linha == false) {
                $i++;
                $patrimonio = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                $patrimonio_antigo = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                $nome_desc = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                $data_aquisicao = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                $sit_fisica = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                $valor_aquisicao = $linha->getElementsByTagName("Data")->item(5)->nodeValue;

                $valores_item = explode(" - DESCRICAO: ", $nome_desc);

                $nome_item = $valores_item[0];
                $descricao_item = isset($valores_item[1]) ? $valores_item[1] : "SD";

                $querySelect = $link->query("SELECT * FROM tb_itens WHERE nome_item = '$nome_item' ");
                $num_linhas = $querySelect->num_rows;

                if ($num_linhas < 1) {
                    echo "<script>alert('item não encontrado Item:$nome_item ID= $i')</script>";
                } else if ($num_linhas > 1) {
                    echo "<script>alert('foram encontrados mais de 1 item com a mesma descricao Item:$nome_item')</script>";
                } else {
                    $registros = $querySelect->fetch_assoc();
                    $id_item = $registros['id'];

                    echo "ID: $i <br>";
                    echo "Patrimonio: $patrimonio <br>";
                    echo "Patrimonio Antigo: $patrimonio_antigo <br>";
                    echo "ID_ITEM: $id_item <br>";
                    echo "Nome do Item: $nome_item <br>";
                    echo "Descrição: $descricao_item <br>";
                    echo "ID_UNIDADE: $id_unidade <br>";
                    echo "Sit. Física: $sit_fisica <br>";
                    echo "Data Aquisição: $data_aquisicao <br>";
                    echo "Valor Aquisição: $valor_aquisicao <br>";
                    echo "---------------------------------------------------------------------------------------<br>";
                    $data_aquisicao_sql = substr($data_aquisicao, 6)."-".substr($data_aquisicao, 3, -5)."-".substr($data_aquisicao, 0, -8);
                    $queryInsert = $link->query("insert into tb_patrimonio (num_patrimonio, patri_antigo, id_item, descricao, id_unidade, sit_fisica, data_aquisicao, valor_aquisicao) values ('$patrimonio', '$patrimonio_antigo', '$id_item', '$descricao_item', '$id_unidade', '$sit_fisica', '$data_aquisicao_sql', '$valor_aquisicao') ");
                }



            }
            $primeira_linha = false;
        }
    }


}
?>
</pre>
