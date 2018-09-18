<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>SCP/SEAP</title>
    <!--<link type="text/css" rel="stylesheet" href="css/theme.css">-->
    <link type="text/css" rel="stylesheet" href="_css/jquery-ui.min.css">
    <link type="text/css" rel="stylesheet" href="_css/login.css">

</head>
<body>
<?php
echo "
      <h1 class='div-align-center'>Sistema Patrimonial Seap</h1>
        <div class='login'>
                <form id='form' name='form' method='post' action='_paginas/geral/verifica_user.php' accept-charset='UTF-8'>                       
                        <div class=\"div-align-center\">
                                <img id=\"logoLogin\" src=\"_imagens/logo_seap.jpg\" alt=\"Logo\">
                        </div>
                        
                        <input aria-readonly='false' id='login' name='login' autocomplete='false' placeholder='Usuário' class='ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all username-input ui-state-hover' type='text'>
                        <input id='senha' name='senha' class='ui-inputfield ui-password ui-widget ui-state-default ui-corner-all password-input' autocomplete='false' placeholder='Senha' type='password'>
                        
                        <div class=\"div-align-center\">
                            <button id='buttonSubmit' name='buttonSubmit' class='ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only' type='submit'><span class='ui-button-text ui-c'>Acessar</span></button>
                        </div>
                </form>
                                           
        </div>
       
    ";
?>
</body>
</html>