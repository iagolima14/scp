<?php
session_start();
include_once 'conexao.php';

$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

//VERIFICANDO SE JÁ EXISTE O EMAIL OU NÃO
$querySelect = $link->query("select email from tb_clientes");
$array_emails = [];

while ($emails = $querySelect->fetch_assoc()) {
    $emails_existentes = $emails['email'];
    array_push($array_emails, $emails_existentes);
}

if (in_array($email,$array_emails)){
    $_SESSION['msg'] = "<p class='center red-text'>".'Já existe um cliente cadastrado com esse email'."</p>";
    header("Location:../");
}else{
    $queryInsert = $link->query("insert into tb_clientes values(default, '$nome','$email','$telefone') ");
    $affected_row = mysqli_affected_rows($link);

    if ($affected_row > 0){
        $_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com sucesso!'."</p>";
        header("location:../");
    }
}


?>
