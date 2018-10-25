<?php
include_once '../conexao.php';

$id = filter_input(INPUT_POST, 'id_grupo', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_grupo     = filter_input(INPUT_POST, 'nome_grupo', FILTER_SANITIZE_SPECIAL_CHARS);
$cod_grupo     = filter_input(INPUT_POST, 'cod_grupo', FILTER_SANITIZE_SPECIAL_CHARS);

$queryUpdate = $link->query("update tb_grupo set nome_grupo='$nome_grupo' where id='$id'");
$affected_rows = mysqli_affected_rows($link);

if ($affected_rows > 0){
    echo "<script>alert('Grupo Atualizado com Sucesso!')</script>";
    echo "<script>location.href='../../_paginas/admin/consultar-grupos.php'</script>";
}
else{
    echo "<script>alert('Não atualizado!')</script>";
    echo "<script>location.href='../../_paginas/admin/consultar-grupos.php'</script>";
}


?>