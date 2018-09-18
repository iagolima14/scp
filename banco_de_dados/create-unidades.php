<?php
include_once 'conexao.php';

$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade     = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
$regiao     = filter_input(INPUT_POST, 'regiao', FILTER_SANITIZE_SPECIAL_CHARS);


//VERIFICANDO SE JÁ EXISTE O NOME DA UNIDADE OU NÃO
$querySelect = $link->query("select nome from tb_unidades");
$array_nomes = [];

while ($nomes = $querySelect->fetch_assoc()) {
    $nomes_existentes = $nomes['nome'];
    array_push($array_nomes, $nomes_existentes);
}

if (in_array($nome,$array_nomes)){
    $_SESSION['msg'] = "<p class='center red-text'>".'Já existe uma UNIDADE cadastrada com esse nome'."</p>";
    header("Location:../cadastrar-unidade.php");
}else{
    $queryInsert = $link->query("insert into tb_unidades (nome,cidade,regiao) values('$nome','$cidade','$regiao') ");
    $affected_row = mysqli_affected_rows($link);

    if ($affected_row > 0){
        $_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com sucesso!'."</p>";
        header("location:../cadastrar-unidade.php");
    }
}

?>