<?php
session_start();
include_once '../conexao.php';
$id = $_SESSION['id'];

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$responsavel = filter_input(INPUT_POST, 'responsavel', FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

$queryUpdate = $link->query("update tb_setores set nome='$nome',responsavel='$responsavel',telefone='$telefone' where id='$id'");
$affected_rows = mysqli_affected_rows($link);

if ($affected_rows > 0){
    header("Location:../../_paginas/comum/consultar-setor.php");
}

?>