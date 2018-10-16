<?php
include_once '../conexao.php';
include_once ("../../_includes/comum/controle_acesso_comum.php");

$id_patrimonio     = filter_input(INPUT_POST, 'id_patrimonio', FILTER_SANITIZE_NUMBER_INT);
$id_setor = filter_input(INPUT_POST, 'sel_setor', FILTER_SANITIZE_NUMBER_INT);
$id_setor_selecionado = filter_input(INPUT_POST, 'id_setor', FILTER_SANITIZE_NUMBER_INT);
$situacao_fisica_momento = filter_input(INPUT_POST, 'sit', FILTER_SANITIZE_SPECIAL_CHARS);


$queryUpdate = $link->query("update tb_patrimonio set id_setor='$id_setor' where id='$id_patrimonio'");
$affected_rows = mysqli_affected_rows($link);


if ($affected_rows > 0){
    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    $dataLocal = date('Y/m/d H:i:s', time());
    $link->query("INSERT INTO tb_movimentacoes (id_setor_antigo, id_novo_setor, `data`, usuario_responsavel, id_patrimonio, sit_fisica_momento, id_unidade) VALUES ('$id_setor_selecionado', '$id_setor', '$dataLocal', '$id_user', '$id_patrimonio', '$situacao_fisica_momento', '$id_unidade_user')");
    echo "<script>alert('Movimentação efetuada com sucesso!')</script>";
    echo "<script>location.href='../../_paginas/comum/movimentacao-itens.php'</script>";
}else{
    echo "<script>alert('ERRO na Movimentação!')</script>";
    echo "<script>location.href='../../_paginas/comum/movimentacao-itens.php'</script>";
}

?>