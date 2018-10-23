<?php
include ("../conexao.php");
//VARIÁVEIS DO ITEM
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$sit_item = filter_input(INPUT_GET, 'sit_item', FILTER_SANITIZE_SPECIAL_CHARS);

//VARIÁVEIS DO FILTRO
$ordenar = filter_input(INPUT_GET, 'select_ordenacao', FILTER_SANITIZE_SPECIAL_CHARS);
$desc = filter_input(INPUT_GET, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
$cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_SPECIAL_CHARS);
$cod_siscop = filter_input(INPUT_GET, 'cod_siscop', FILTER_SANITIZE_SPECIAL_CHARS);
$sit = filter_input(INPUT_GET, 'select_situacao', FILTER_SANITIZE_SPECIAL_CHARS);

if($sit_item == "I"){
    $queryDelete = $link->query("UPDATE tb_itens SET situacao = 'A' where id='$id'");
}
else{
    $queryDelete = $link->query("UPDATE tb_itens SET situacao = 'I' where id='$id'");
}

if (mysqli_affected_rows($link) > 0){
    header("Location:../../_paginas/admin/consultar-item.php?select_ordenacao=$ordenar&desc=$desc&cod=$cod&select_situacao=$sit&cod_siscop=$cod_siscop");
}

?>
