<?php
    $user_login = $_SESSION['login_sip'];
    $user_code = $_SESSION['matricula_sip'];
    $user_name = $_SESSION['usuario_sip'];
    $acesso = $_SESSION['acesso_sip'];
    $id_user = $_SESSION['id_user_sip'];
    $system_version = $_SESSION['versao_sip'];
    $user_email = $_SESSION['user_email_sip'];
    $id_unidade_user = $_SESSION['id_unidade_user_sip'];
    if($acesso!= 2)
    {
        echo "<script> alert('Você não tem permissão!');</script>";
        sleep(0.3);
        session_destroy();
        echo "<script> location.href='index.php'</script>";
        exit;
    }
?>