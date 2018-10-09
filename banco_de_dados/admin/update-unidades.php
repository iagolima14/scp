<?php
    include_once '../conexao.php';

    $id = filter_input(INPUT_POST, 'id_unidade', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
    $regiao = filter_input(INPUT_POST, 'regiao', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
    $op_anterior = filter_input(INPUT_POST, 'op_anterior', FILTER_SANITIZE_SPECIAL_CHARS);

    $queryUpdate = $link->query("update tb_unidades set nome='$nome',cidade='$cidade',regiao='$regiao',telefone='$telefone' where id='$id'");
    $affected_rows = mysqli_affected_rows($link);

    if ($affected_rows > 0){
        echo "<script>alert('Unidade Atualizada com Sucesso!')</script>";
        echo "<script>location.href='../../_paginas/admin/consultar-unidade.php?select_unidades=$op_anterior'</script>";
    }
    else{
        echo "<script>alert('Não atualizada!')</script>";
        echo "<script>location.href='../../_paginas/admin/consultar-unidade.php?select_unidades=$op_anterior'</script>";
    }

?>