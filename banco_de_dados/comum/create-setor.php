<?php
include_once '../../banco_de_dados/conexao.php';
include_once ("../../_includes/comum/controle_acesso_comum.php");

$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$responsavel     = filter_input(INPUT_POST, 'responsavel', FILTER_SANITIZE_SPECIAL_CHARS);
$telefone     = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);


//VERIFICANDO SE JÁ EXISTE O NOME DO SETOR OU NÃO
$querySelect = $link->query("select nome from tb_setores");
$array_nomes = [];

while ($nomes = $querySelect->fetch_assoc()) {
    $nomes_existentes = $nomes['nome'];
    array_push($array_nomes, $nomes_existentes);
}

if (in_array($nome,$array_nomes)){
//    $_SESSION['msg'] = "<p class='center red-text'>".'Já existe uma UNIDADE cadastrada com esse nome'."</p>";
//    header("Location:../../_paginas/admin/cadastrar-unidade.php");
    echo "<script>alert('Já existe um SETOR cadastrado com esse nome!')</script>";
    echo "<script>location.href='../../_paginas/comum/cadastrar-setor.php'</script>";
}else{
    $queryInsert = $link->query("insert into tb_setores (id, nome, id_unidade, responsavel, telefone) values (default, '$nome','$id_unidade_user','$responsavel','$telefone') ");
    $affected_row = mysqli_affected_rows($link);

    if ($affected_row > 0){
//        $_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com sucesso!'."</p>";
//        header("location:../../_paginas/admin/cadastrar-unidade.php");
        echo "<script>alert('Cadastro efetuado com sucesso!')</script>";
        echo "<script>location.href='../../_paginas/comum/cadastrar-setor.php'</script>";
    }
}

?>