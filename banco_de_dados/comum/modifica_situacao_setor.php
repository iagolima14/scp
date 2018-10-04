<?php
    include ("../conexao.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    $sit = filter_input(INPUT_GET, 'sit_setor', FILTER_SANITIZE_SPECIAL_CHARS);

    if($sit == "I"){
        $queryDelete = $link->query("UPDATE tb_setores SET situacao = 'A' where id='$id'");
    }
    else{
        $queryDelete = $link->query("UPDATE tb_setores SET situacao = 'I' where id='$id'");
    }

    if (mysqli_affected_rows($link) > 0){
        header("Location:../../_paginas/comum/consultar-setor.php");
    }

?>
