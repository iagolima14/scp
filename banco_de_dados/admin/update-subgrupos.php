<?php
include_once '../conexao.php';

$id = filter_input(INPUT_POST, 'id_subgrupo', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_subgrupo     = filter_input(INPUT_POST, 'nome_subgrupo', FILTER_SANITIZE_SPECIAL_CHARS);
$cod_subgrupo     = filter_input(INPUT_POST, 'cod_subgrupo', FILTER_SANITIZE_SPECIAL_CHARS);

$queryUpdate = $link->query("update tb_subgrupo set nome_subgrupo='$nome_subgrupo' where id='$id'");
$affected_rows = mysqli_affected_rows($link);

if ($affected_rows > 0){
    echo "<script>alert('Subgrupo Atualizado com Sucesso!')</script>";
    echo "<script>location.href='../../_paginas/admin/consultar-grupos.php'</script>";
}
else{
    echo "<script>alert('Não atualizado!')</script>";
    echo "<script>location.href='../../_paginas/admin/consultar-grupos.php'</script>";
}


?>