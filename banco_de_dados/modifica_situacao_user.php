<?php
include ("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$sit = filter_input(INPUT_GET, 'sit', FILTER_SANITIZE_SPECIAL_CHARS);
$id_unidade_pesquisada = filter_input(INPUT_GET, 'id_anterior', FILTER_SANITIZE_SPECIAL_CHARS);

if($sit == "I"){
    $queryDelete = $link->query("UPDATE tb_usuarios SET situacao = 'A' where id='$id'");
}
else{
    $queryDelete = $link->query("UPDATE tb_usuarios SET situacao = 'I' where id='$id'");
}

if (mysqli_affected_rows($link) > 0){
    header("Location:../consultar-usuario.php?select_unidades=$id_unidade_pesquisada");
}

?>
