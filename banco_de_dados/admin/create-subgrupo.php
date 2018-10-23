<?php
include_once '../conexao.php';

$nome_subgrupo     = filter_input(INPUT_POST, 'nome_subgrupo', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_subgrupo = strtoupper($nome_subgrupo);
$cod_subgrupo     = filter_input(INPUT_POST, 'cod_subgrupo', FILTER_SANITIZE_NUMBER_INT);
$id_grupo     = filter_input(INPUT_POST, 'grupo', FILTER_SANITIZE_NUMBER_INT);


//VERIFICANDO SE JÁ EXISTE O NOME DO GRUPO OU NÃO
$querySelect = $link->query("select nome_subgrupo from tb_subgrupo");
$array_nomes = [];

while ($descricoes = $querySelect->fetch_assoc()) {
    $nomes_existentes = $descricoes['nome_subgrupo'];
    array_push($array_nomes, $nomes_existentes);
}

if (in_array($nome_subgrupo,$array_nomes)){
    echo "<script>alert('Já existe um SUBGRUPO cadastrado com esse nome!')</script>";
    echo "<script>location.href='../../_paginas/admin/cadastrar-subgrupo.php'</script>";
}
else{

    $queryInsert = $link->query("insert into tb_subgrupo (id, nome_subgrupo, cod_subgrupo, id_grupo) values (default, '$nome_subgrupo','$cod_subgrupo', '$id_grupo') ");
    $affected_row = mysqli_affected_rows($link);
    if ($affected_row > 0){
        echo "<script>alert('Cadastro efetuado com sucesso!')</script>";
        echo "<script>location.href='../../_paginas/admin/cadastrar-subgrupo.php'</script>";
    }
}

?>