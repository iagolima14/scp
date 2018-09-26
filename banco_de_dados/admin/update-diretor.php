<?php include_once '../../banco_de_dados/conexao.php';
//$id = $_SESSION['id']; ?>

<?php
$idDiretor = filter_input(INPUT_GET, 'id_user_diretor', FILTER_SANITIZE_SPECIAL_CHARS);

$querySelect = $link->query("select * from tb_unidades where diretor='$idDiretor'");
while ($registros = $querySelect->fetch_assoc()) {
    $id = $registros['id'];
    $nome = $registros['nome'];
}

echo "testando.....";
echo "$idDiretor<br>";
echo "$id<br>";
echo "$nome<br>";
?>


<?php
$queryUpdate = $link->query("update tb_unidades set diretor='$idDiretor' where id='$id'");
$affected_rows = mysqli_affected_rows($link);

if ($affected_rows > 0){
    //header("Location:../../_paginas/admin/consultar-unidade.php");
    echo "<script>alert('Unidade Cadastrada com Sucesso!')</script>";
    echo "<script>location.href='../../_paginas/admin/consultar-unidade.php'</script>";
}
else{
    echo "<script>alert('Unidade já Cadastrada!')</script>";
    echo "<script>location.href='../../_paginas/admin/consultar-unidade.php'</script>";
}
?>

