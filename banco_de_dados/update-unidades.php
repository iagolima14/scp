<?php
session_start();
include_once 'conexao.php';
$id = $_SESSION['id'];

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
$regiao = filter_input(INPUT_POST, 'regiao', FILTER_SANITIZE_SPECIAL_CHARS);

$queryUpdate = $link->query("update tb_unidades set nome='$nome',cidade='$cidade',regiao='$regiao' where id='$id'");
$affected_rows = mysqli_affected_rows($link);

if ($affected_rows > 0){
    header("Location:../consultar-unidade.php");
}

?>