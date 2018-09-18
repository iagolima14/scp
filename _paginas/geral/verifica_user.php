<?php
    /*define("SERVIDOR", "localhost");
    define("USUARIO", "root");
    define("SENHA", "");
    define("BANCODEDADOS", "db_sip");*/

    define("SERVIDOR", "br782.hostgator.com.br:3306");
    define("USUARIO", "marmo643_iago");
    define("SENHA", "Seap=2018");
    define("BANCODEDADOS", "marmo643_scp");
    $conecta = new mysqli(SERVIDOR, USUARIO, SENHA, BANCODEDADOS); // CONECTA
    mysqli_set_charset($conecta, 'utf8');
    if ($conecta->connect_error) {
        trigger_error("ERRO NA CONEXÃO: " . $conecta->connect_error, E_USER_ERROR);
    }


    $usuario = isset($_POST["login"]) ? $_POST["login"] : "Usuário não informado!";
    $permitidas = "abcdefghijklmnopqrstuvxzyw._@=0123456789#ABCDEFGHIJKLMNOPQRSTUVXZYW";
    $num_permitidas = strlen($permitidas);
    $array_permitidas = str_split($permitidas);
    $num_usuario = strlen($usuario);
    $array_usuario = str_split($usuario);
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
            echo "<script> location.href='../../index.php'</script>";
            exit;
        } else if ($cont_usuario == $num_usuario) {
        }
    }

    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "Senha não informada!";
    $cont_senha = 0;
    $num_senha = strlen($senha);
    $array_senha = str_split($senha);
    for ($i = 0; $i < $num_senha; $i++) {
        $diferente = 0;
        for ($p = 0; $p < $num_permitidas; $p++) {
            if ($array_senha[$i] == $array_permitidas[$p]) {
                $cont_senha++;
                $p = $num_permitidas;
            } else {
                $diferente++;
            }
        }
        if ($diferente == $num_permitidas) {
            echo "<script> alert('Inserido Caracter Inválido! Tente Novamente');</script>";
            sleep(0.3);
            echo "<script> location.href='../../index.php'</script>";
            exit;
        } else if ($cont_senha == $num_senha) {
        }
    }


    $senhamd = md5($senha);
    $sql = "SELECT * FROM tb_usuarios WHERE login = '$usuario' and senha = '$senhamd' and situacao = 'A'";
    $query = $conecta->query($sql);
    $linhas = $query->num_rows;
    if ($linhas == 0) {
        echo "<script> alert('Usuário ou senha não existe!');</script>";
        include_once 'logout.php';
    } else {
        $sql2 = "SELECT * FROM tb_usuarios WHERE login = '$usuario'";
        $query = $conecta->query($sql2);
        while ($colunas = $query->fetch_assoc()) {
            $login = $colunas['login'];
            $matricula = $colunas['matricula'];
            $nome = $colunas['nome'];
            $acesso = $colunas['permissao'];
            $log = $colunas['log'];
            $id_user = $colunas['id'];
            $email = $colunas['email'];
            $id_unidade_user = $colunas['id_unidade'];
        }

        session_start();
        $_SESSION['login_sip'] = $login;
        $_SESSION['matricula_sip'] = $matricula;
        $_SESSION['usuario_sip'] = $nome;
        $_SESSION['acesso_sip'] = $acesso;
        $_SESSION['id_user_sip'] = $id_user;
        $_SESSION['id_unidade_user_sip'] = $id_unidade_user;
        $_SESSION['user_email_sip'] = $email;
        $_SESSION['versao_sip'] = "SIP - Sistema de Controle de Patrimonio V1.0";


        date_default_timezone_set('America/Sao_Paulo');
        $data_log = date('Y-m-d');
        $hora_log = date('H:i:s');
        $sql_log = "INSERT INTO log (id_usuario, `data`, hora, codigo, operacao) VALUES ('$id_user', '$data_log', '$hora_log', '01', 'Conectou-se ao SIP')";
        //$conecta->query($sql_log);


        if ($log == "S") {
            if ($acesso == 1) {
                header('Location: ../admin/tela-admin.php');
            } else if ($acesso == 2) {
                header('Location: ../comum/tela-comum.php');
            } else {
                include_once 'logout.php';
            }
            $_SESSION['red_senha'] = "";
        } else {
            echo "<script> alert('Olá, seja bem vindo ao SIP. Sua senha ainda é a padrão! Você precisa altera-la!');</script>";
            $_SESSION['red_senha'] = "Seap=2018";
            if ($acesso == 2){
                echo "<script> location.href='../comum/alterar-senha.php'</script>";
            }elseif ($acesso == 1){
                echo "<script> location.href='../admin/alterar-senha.php'</script>";
            }
        }



    }



?>