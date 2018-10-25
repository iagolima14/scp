<?php
include_once '../conexao.php';
include_once ("../../_includes/admin/controle_acesso_admin.php");

$num_doc     = filter_input(INPUT_POST, 'num_doc', FILTER_SANITIZE_SPECIAL_CHARS);
$origem     = filter_input(INPUT_POST, 'origem', FILTER_SANITIZE_NUMBER_INT);
$data_aquisicao     = filter_input(INPUT_POST, 'data_aquisicao', FILTER_SANITIZE_SPECIAL_CHARS);


//VERIFICANDO SE O DOCUMENTO JÁ FOI LANÇADO
$querySelect = $link->query("select num_doc from tb_lancamentos WHERE num_doc = '$num_doc'");
$num_linha = $querySelect->num_rows;

if ($num_linha>0){
    echo "<script>alert('Documento já lançado no SISCOP!')</script>";
    echo "<script>location.href='../../_paginas/admin/lancar-itens.php'</script>";
}
else{
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    $dataLocal = date('Y/m/d H:i:s', time());
    $queryInsert = $link->query("insert into tb_lancamentos (id, num_doc, id_origem, data_aquisicao, id_operador, diaehora) values 
                                                           (default, '$num_doc','$origem', '$data_aquisicao', '$id_user', '$dataLocal') ");
    $affected_row = mysqli_affected_rows($link);
    if ($affected_row > 0){
        $ultimo_id = $link->insert_id;
        $_SESSION['ultimo_id'] = $ultimo_id;
        echo "<script>location.href='../../_paginas/admin/adiciona-itens-na-nota.php'</script>";
    }
}

?>