<?php

    define("SERVIDOR", "localhost");
    define("USUARIO", "root");
    define("SENHA", "");
    define("BANCODEDADOS", "sip");
    $conecta = new mysqli(SERVIDOR, USUARIO, SENHA, BANCODEDADOS); // CONECTA
    mysqli_set_charset($conecta, 'utf8');
    if ($conecta->connect_error)
    {
        trigger_error("ERRO NA CONEXÃO: "  . $conecta->connect_error, E_USER_ERROR);
    }
        $login_sip = $_SESSION['login_sip'];
        $matricula_sip = $_SESSION['matricula_sip'];
        $nome_sip = $_SESSION['usuario_sip'];
        $cpf_sip = $_SESSION['cpf_sip'];
        $acesso = $_SESSION['acesso_sip'];
        $id_user = $_SESSION['id_user_sip'];
        $unidade = $_SESSION['unidade'];
        $banco = $_SESSION['banco'];
?>