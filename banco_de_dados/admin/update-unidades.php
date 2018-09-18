<?php
include_once '../conexao.php';
$id = $_SESSION['id'];

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
$regiao = filter_input(INPUT_POST, 'regiao', FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

$queryUpdate = $link->query("update tb_unidades set nome='$nome',cidade='$cidade',regiao='$regiao',telefone='$telefone' where id='$id'");
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