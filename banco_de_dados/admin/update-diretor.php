<?php include_once '../../banco_de_dados/conexao.php';?>

<?php
    $idDiretor = filter_input(INPUT_POST, 'sel_diretor', FILTER_SANITIZE_SPECIAL_CHARS);
    $id_unidade_selecionada = filter_input(INPUT_POST, 'id_unidade_selecionada', FILTER_SANITIZE_SPECIAL_CHARS);
    $opcao_anterior = filter_input(INPUT_POST, 'opcao_anterior', FILTER_SANITIZE_SPECIAL_CHARS);

    $queryUpdate = $link->query("update tb_unidades set diretor='$idDiretor' where id='$id_unidade_selecionada'");
    $affected_rows = mysqli_affected_rows($link);
    if ($affected_rows > 0){
        echo "<script>alert('Diretor Atualizado com Sucesso!')</script>";
        echo "<script>location.href='../../_paginas/admin/consultar-unidade.php?select_unidades=$opcao_anterior'</script>";
    }
    else{
        echo "<script>alert('Erro ao atualizar!')</script>";
        echo "<script>location.href='../../_paginas/admin/consultar-unidade.php?select_unidades=$opcao_anterior'</script>";
    }
?>

