<?php
    include '../../banco_de_dados/conexao.php';
    date_default_timezone_set('America/Sao_Paulo');
    $data_log = date('Y-m-d');
    $hora_log = date('H:i:s');
   /* $sql_log = "INSERT INTO log (id_usuario, `data`, hora, codigo, operacao) VALUES ('$id_user', '$data_log', '$hora_log', '02', 'Desconectou-se do SIP')";
    $link->query($sql_log);*/
    sleep(0.3);
    session_destroy();
    echo "<script>location.href='../../index.php'</script>";
    exit;
?>