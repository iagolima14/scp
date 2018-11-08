<?php
include_once '../conexao.php';

$id_lancamento = filter_input(INPUT_GET, 'id_lancamento', FILTER_SANITIZE_NUMBER_INT);

$link->query("UPDATE tb_itens_lancamento SET adicionado = 'S' WHERE id_lancamento = '$id_lancamento'");
$linhas_afetadas1 = mysqli_affected_rows($link);

$link->query("UPDATE tb_lancamentos SET confirmado = 'S' WHERE id = '$id_lancamento'");
$linhas_afetadas2 = mysqli_affected_rows($link);

if($linhas_afetadas1 > 0 && $linhas_afetadas1 > 0){
    echo "<script>alert('Itens Lançados com Sucesso')</script>";
    echo "<script>location.href='../../_paginas/admin/tela-admin.php'</script>";
}
else{
    echo "<script>alert('ERRO')</script>";
    echo "<script>location.href='../../_paginas/admin/verifica-itens-lancados.php'</script>";
}
?>