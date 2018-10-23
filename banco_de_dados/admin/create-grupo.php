<?php
include_once '../conexao.php';

$nome_grupo     = filter_input(INPUT_POST, 'nome_grupo', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_grupo = strtoupper($nome_grupo);
$cod_grupo     = filter_input(INPUT_POST, 'cod_grupo', FILTER_SANITIZE_NUMBER_INT);


//VERIFICANDO SE JÁ EXISTE O NOME DO GRUPO OU NÃO
$querySelect = $link->query("select nome_grupo from tb_grupo");
$array_nomes = [];

while ($descricoes = $querySelect->fetch_assoc()) {
    $nomes_existentes = $descricoes['nome_grupo'];
    array_push($array_nomes, $nomes_existentes);
}

if (in_array($nome_grupo,$array_nomes)){
//    $_SESSION['msg'] = "<p class='center red-text'>".'Já existe um ITEM cadastrado com esse nome'."</p>";
//    header("Location:../../_paginas/admin/cadastrar-item.php");
    echo "<script>alert('Já existe um GRUPO cadastrado com esse nome!')</script>";
    echo "<script>location.href='../../_paginas/admin/cadastrar-grupo.php'</script>";
}else{
    $queryInsert = $link->query("insert into tb_grupo (id, nome_grupo, cod_grupo) values (default, '$nome_grupo','$cod_grupo') ");
    $affected_row = mysqli_affected_rows($link);

    if ($affected_row > 0){
//        $_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com sucesso!'."</p>";
//        header("location:../../_paginas/admin/cadastrar-item.php");
        echo "<script>alert('Cadastro efetuado com sucesso!')</script>";
        echo "<script>location.href='../../_paginas/admin/cadastrar-grupo.php'</script>";
    }
}

?>