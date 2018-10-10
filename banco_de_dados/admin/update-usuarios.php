<?php
include_once '../conexao.php';
$id = $_SESSION['id'];

$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$matricula     = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
$email     = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$login     = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
$telefone     = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
$id_unidade     = filter_input(INPUT_POST, 'select_unidades', FILTER_SANITIZE_NUMBER_INT);

$queryUpdate = $link->query("update tb_usuarios set nome='$nome',matricula='$matricula',email='$email',login='$login',telefone='$telefone',id_unidade='$id_unidade' where id='$id'");
$affected_rows = mysqli_affected_rows($link);

if ($affected_rows > 0){
    header("Location:../../_paginas/admin/consultar-usuario.php");
}

?>