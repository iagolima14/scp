<?php
include_once '../conexao.php';

$nome_item     = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$codigo     = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$quantidade     = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$data     = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_NUMBER_INT);
$valor     = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_SPECIAL_CHARS);


//VERIFICANDO SE JÁ EXISTE O NOME DA UNIDADE OU NÃO
$querySelect = $link->query("select nome_item from tb_itens");
$array_descricoes = [];

while ($descricoes = $querySelect->fetch_assoc()) {
    $descricoes_existentes = $descricoes['nome_item'];
    array_push($array_descricoes, $descricoes_existentes);
}

if (in_array($nome_item,$array_descricoes)){
//    $_SESSION['msg'] = "<p class='center red-text'>".'Já existe um ITEM cadastrado com esse nome'."</p>";
//    header("Location:../../_paginas/admin/cadastrar-item.php");
      echo "<script>alert('Já existe um ITEM cadastrado com esse nome!')</script>";
      echo "<script>location.href='../../_paginas/admin/cadastrar-item.php'</script>";
}else{
    $queryInsert = $link->query("insert into tb_itens (id, nome_item, codigo, quantidade, `data`, valor) values (default, '$nome_item','$codigo','$quantidade','$data','$valor') ");
    $affected_row = mysqli_affected_rows($link);

    if ($affected_row > 0){
//        $_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com sucesso!'."</p>";
//        header("location:../../_paginas/admin/cadastrar-item.php");
          echo "<script>alert('Cadastro efetuado com sucesso!')</script>";
          echo "<script>location.href='../../_paginas/admin/cadastrar-item.php'</script>";
    }
}

?>