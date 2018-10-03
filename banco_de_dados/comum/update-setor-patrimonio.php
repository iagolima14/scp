<?php
include_once '../conexao.php';
//$id = $_SESSION['id'];

$id_patrimonio     = filter_input(INPUT_POST, 'id_patrimonio', FILTER_SANITIZE_NUMBER_INT);
$id_setor = filter_input(INPUT_POST, 'sel_setor', FILTER_SANITIZE_NUMBER_INT);

echo "$id_patrimonio<br>";
echo "$id_setor";

$queryUpdate = $link->query("update tb_patrimonio set id_setor='$id_setor' where id='$id_patrimonio'");
$affected_rows = mysqli_affected_rows($link);

if ($affected_rows > 0){
    echo "<script>alert('Inserção efetuada com sucesso!')</script>";
    header("Location:../../_paginas/comum/distribuição-itens.php");
}else{
    echo "<script>alert('ERRO na Inserção!')</script>";
}

?>