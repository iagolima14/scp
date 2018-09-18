<?php
    session_start();
    $utf8 = header("Content-Type: text/html; charset=utf-8"); //RESOLVE PROBLEMA DE ENVIO E RECEBIMENTO DE CARACTER COM ACENTO NO BANCO DE DADOS
    //$link = new mysqli('localhost','root','','db_sip');
    $link = new mysqli('br782.hostgator.com.br:3306','marmo643_iago','Seap=2018','marmo643_scp');
    $link->set_charset('utf8');
?>
