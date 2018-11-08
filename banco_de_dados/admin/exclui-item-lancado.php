<?php
    include_once '../conexao.php';

    $id_lancamento = filter_input(INPUT_GET, 'id_lancamento', FILTER_SANITIZE_NUMBER_INT);

    $link->query("DELETE FROM tb_itens_lancamento WHERE id = '$id_lancamento' and adicionado is null");
    $linhas_afetadas = mysqli_affected_rows($link);
    if($linhas_afetadas == 1){
        echo "<script>location.href='../../_paginas/admin/verifica-itens-lancados.php'</script>";
    }
    else{
        echo "<script>alert('ERRO')</script>";
        echo "<script>location.href='../../_paginas/admin/verifica-itens-lancados.php'</script>";
    }
    ?>