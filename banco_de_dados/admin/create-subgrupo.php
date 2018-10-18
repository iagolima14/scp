<?php
include_once '../conexao.php';

$nome_subgrupo     = filter_input(INPUT_POST, 'nome_subgrupo', FILTER_SANITIZE_SPECIAL_CHARS);
$cod_subgrupo     = filter_input(INPUT_POST, 'cod_subgrupo', FILTER_SANITIZE_NUMBER_INT);


//VERIFICANDO SE JÁ EXISTE O NOME DO GRUPO OU NÃO
$querySelect = $link->query("select nome_subgrupo from tb_subgrupo");
$array_nomes = [];

while ($descricoes = $querySelect->fetch_assoc()) {
    $nomes_existentes = $descricoes['nome_subgrupo'];
    array_push($array_nomes, $nomes_existentes);
}

if (in_array($nome_subgrupo,$array_nomes)){
//    $_SESSION['msg'] = "<p class='center red-text'>".'Já existe um ITEM cadastrado com esse nome'."</p>";
//    header("Location:../../_paginas/admin/cadastrar-item.php");
    echo "<script>alert('Já existe um SUBGRUPO cadastrado com esse nome!')</script>";
    echo "<script>location.href='../../_paginas/admin/cadastrar-subgrupo.php'</script>";
}else{
    $queryInsert = $link->query("insert into tb_subgrupo (id, nome_subgrupo, cod_subgrupo) values (default, '$nome_subgrupo','$cod_subgrupo') ");
    $affected_row = mysqli_affected_rows($link);

    if ($affected_row > 0){
//        $_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com sucesso!'."</p>";
//        header("location:../../_paginas/admin/cadastrar-item.php");
        echo "<script>alert('Cadastro efetuado com sucesso!')</script>";
        echo "<script>location.href='../../_paginas/admin/cadastrar-subgrupo.php'</script>";
    }
}

?>