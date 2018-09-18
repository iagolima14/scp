<?php
session_start();
include_once 'conexao.php';

$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$login     = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);


if(isset($_REQUEST['salvar'])) {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "ERRO";
    if ($nome == "ERRO") {
        echo "<script> alert('Erro ao registrar o nome do Usuário. Tente novamente!');</script>";
        echo "<script> locatin.href='cadastrar-usuario.php'</script>";
    }
    $matricula = isset($_POST["matricula"]) ? $_POST["matricula"] : "";
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
//calculo de validade do CPF
    $digitos_verificadores = substr($cpf, -2);
//calculo verificador CPF
    $array_cpf1 = str_split($cpf);
//primeiro numero do dígito verificador
    $soma = 0;
    $n = 0;
    for ($i = 10; $i >= 2; $i--) {
        $soma = $soma + ($array_cpf1[$n] * $i);
        $n++;
    }
    $digito_um = ($soma * 10) % 11;
    if ($digito_um == 10) {
        $digito_um = 0;
    }
//segundo número do dígito verificador

    $cpf_parcial = substr($cpf, 0, -1);
    $array_cpf2 = str_split($cpf_parcial);
    $soma = 0;
    $n = 0;
    for ($i = 11; $i >= 2; $i--) {
        $soma = $soma + ($array_cpf2[$n] * $i);
        $n++;
    }
    $digito_dois = ($soma * 10) % 11;
    if ($digito_dois == 10) {
        $digito_dois = 0;
    }
    $digito_obtido = $digito_um . $digito_dois;
    if ($digito_obtido != $digitos_verificadores) {
        echo "<script> alert('CPF Inválido! Tente Novamente');</script>";
        echo "<script> location.href='cadastrar-usuario.php'</script>";
    } else {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $login = isset($_POST["login"]) ? $_POST["login"] : "";
        $permitidas = "abcdefghijklmnopqrstuvxzyw._@=0123456789#ABCDEFGHIJKLMNOPQRSTUVXZYW";
        $num_permitidas = strlen($permitidas);
        $array_permitidas = str_split($permitidas);
        $num_usuario = strlen($login);
        $array_usuario = str_split($login);
        $cont_usuario = 0;
        for ($i = 0; $i < $num_usuario; $i++) {
            $diferente = 0;
            for ($p = 0; $p < $num_permitidas; $p++) {
                if ($array_usuario[$i] == $array_permitidas[$p]) {
                    $cont_usuario++;
                    $p = $num_permitidas;
                } else {
                    $diferente++;
                }
            }
            if ($diferente == $num_permitidas) {
                echo "<script> alert('Inserido Caracter Inválido! Tente Novamente');</script>";
                sleep(0.3);
                echo "<script> location.href='cadastrar-usuario.php'</script>";
                exit;
            } else if ($cont_usuario == $num_usuario) {
            }
        }
        $telefone = isset($_POST["tel"]) ? $_POST["tel"] : "";
        $permissao = isset($_POST["group1"]) ? $_POST["group1"] : "2";

        $sql2 = "SELECT * FROM tb_usuarios WHERE login = '$login'";
        $linha2 = $link->query($sql2);
        $num2 = $linha2->num_rows;
        if ($num2 > 0) {
            echo "<script> alert('Login Já Cadastrado! Tente Novamente...')</script>";
            echo "<script>location.href='cadastrar_usuario.php'</script>";
        } else {
            $senha = "Seap=2018";
            $senha_criptografada = md5($senha);
            $sql3 = "INSERT INTO tb_usuarios (login, senha, matricula, nome, cpf, permissao, situacao, telefone, email) VALUES ('$login', '$senha_criptografada', '$matricula', '$nome','$cpf' ,'$permissao', 'A', '$telefone', '$email')";
            $link->query($sql3);
            date_default_timezone_set('America/Sao_Paulo');
            $data_log = date('Y-m-d');
            $hora_log = date('H:i:s');
            $sql_log = "INSERT INTO log (id_usuario, `data`, hora, codigo, operacao) VALUES ('$id_user', '$data_log', '$hora_log', '04', 'Cadastrou o Usuário $nome CPF $cpf')";
            $link->query($sql_log);
            echo "<script> alert('Usuário Cadastrado com Sucesso!')</script>";
            echo "<script>location.href='tela_admin.php'</script>";
        }
    }
}
?>