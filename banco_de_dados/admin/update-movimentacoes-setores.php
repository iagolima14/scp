<?php include_once '../../banco_de_dados/conexao.php';?>
<?php
    /**
     * Created by PhpStorm.
     * User: Marcus Assis
     * Date: 16/10/2018
     * Time: 23:07
     */

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

    $queryUpdate = $link->query("update tb_movimentacoes set analisado='S' where id='$id'");
    $affected_rows = mysqli_affected_rows($link);

    if ($affected_rows > 0){
        echo "<script>alert('Movimentação Atualizada com Sucesso!')</script>";
        echo "<script>location.href='../../_paginas/admin/listar-movimentacoes.php'</script>";
    }
    else{
        echo "<script>alert('Não atualizada!')</script>";
        echo "<script>location.href='../../_paginas/admin/listar-movimentacoes.php'</script>";
    }

?>