<pre>
<?php
include_once '../../banco_de_dados/conexao.php';
//    $dados = $_FILES['arquivo'];
//    var_dump($dados);

echo "<br>";
if (!empty($_FILES['arquivo']['tmp_name'])) {
    $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
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
                $cod_nome = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                $quantidade = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                $codigo_item = substr($cod_nome, 0, 9);
                $nome_item = substr($cod_nome, 12);
                echo "ID: $i <br>";
                echo "Nome: $nome_item <br>";
                echo "Código: $codigo_item <br>";
                echo "Quantidade: $quantidade <br>";
                echo "---------------------------------------------------------------------------------------<br>";
                //sleep(0.1);


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
                    $queryInsert = $link->query("insert into tb_itens (id, nome_item, codigo, quantidade) values (default, '$nome_para_salvar_no_banco','$codigo_item','$quantidade') ");
                }
                else{
                    $registros = $querySelect->fetch_assoc();
                    $id_item = $registros['id'];
                    $qnt_antiga = $registros['quantidade'];
                    $qnt_nova = $qnt_antiga + $quantidade;
                    $queryInsert = $link->query("UPDATE tb_itens SET quantidade = '$qnt_nova' WHERE id='$id_item'");
                }


            }
            $primeira_linha = false;
        }
    }


}
?>
</pre>
