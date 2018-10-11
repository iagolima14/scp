<?php
include_once '../conexao.php';
//$id = $_SESSION['id'];

$id_patrimonio     = filter_input(INPUT_POST, 'id_patrimonio', FILTER_SANITIZE_NUMBER_INT);
$id_setor = filter_input(INPUT_POST, 'sel_setor', FILTER_SANITIZE_NUMBER_INT);
$id_setor_selecionado = filter_input(INPUT_POST, 'id_setor', FILTER_SANITIZE_NUMBER_INT);


$queryUpdate = $link->query("update tb_patrimonio set id_setor='$id_setor' where id='$id_patrimonio'");
$affected_rows = mysqli_affected_rows($link);

if ($affected_rows > 0){
    echo "<script>alert('Movimentação efetuada com sucesso!')</script>";
    echo "<script>location.href='../../_paginas/comum/consultar-item-no-setor.php?id_setor=$id_setor_selecionado'</script>";
}else{
    echo "<script>alert('ERRO na Movimentação!')</script>";
    echo "<script>location.href='../../_paginas/comum/consultar-item-no-setor.php?id_setor=$id_setor_selecionado'</script>";
}

?>