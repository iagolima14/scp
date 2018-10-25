<?php
    include_once '../conexao.php';
    include_once ("../../_includes/admin/controle_acesso_admin.php");

    $info_item     = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $valores_item = explode(" # ", $info_item);
    $id_item = $valores_item[0];
    $nome_item = $valores_item[1];

    $quantidade     = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $valor   = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_SPECIAL_CHARS);
    $ultimo_id = $_SESSION['ultimo_id'];

    //VERIFICANDO SE O ITEM JÁ FOI LANÇADO
    $querySelect = $link->query("select * from tb_itens_lancamento WHERE id_lancamento = '$ultimo_id' and id_item = '$id_item'");
    $num_linha = $querySelect->num_rows;

    if ($num_linha>0){
        echo "<script>alert('Item já adicionado no Lançamento Nº $ultimo_id!')</script>";
        echo "<script>location.href='../../_paginas/admin/adiciona-itens-na-nota.php'</script>";
    }
    else{

        $queryInsert = $link->query("insert into tb_itens_lancamento (id_item, id_lancamento, quantidade, valor) values 
                                                               ('$id_item','$ultimo_id', '$quantidade', '$valor') ");
        $affected_row = mysqli_affected_rows($link);
        if ($affected_row > 0){
            echo "<script>alert('Item adicionado com sucesso ao Lançamento de Nº $ultimo_id!')</script>";
            echo "<script>location.href='../../_paginas/admin/adiciona-itens-na-nota.php'</script>";
        }
    }

?>