<?php
    session_start();
    $utf8 = header("Content-Type: text/html; charset=utf-8"); //RESOLVE PROBLEMA DE ENVIO E RECEBIMENTO DE CARACTER COM ACENTO NO BANCO DE DADOS
    $link = new mysqli('localhost','root','','db_sip');
    $link->set_charset('utf8');
?>
