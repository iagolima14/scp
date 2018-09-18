<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <!--FORMULÁRIO DE CADASTRO DE SETOR-->
    <div class="row container">
        <p>&nbsp;</p>

        <form id="ent" accept-charset="utf-8" action="alterar-senha.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/casa1.png" alt="[imagem]" width="200"></legend>
                <h4 class="light center">Alterar Senha</h4>

                <div class="center-align m6 l6 s6 row container" id="div_alterar_senha">
                    <!--CAMPO SENHA ATUAL-->
                    <div class="input-field col s12">
                        <p>Senha Atual<i class="material-icons prefix">vpn_key</i>
                            <input type="password" name="tatual" id="catual" maxlength="40" required autofocus
                                   value="<?php echo $_SESSION['red_senha'] ?>"></p>
                        <!--<label for="catual">Senha Atual</label>-->
                    </div>

                    <!--CAMPO NOVA SENHA-->
                    <div class="input-field col s12">
                        <p>Nova Senha<i class="material-icons prefix">vpn_key</i>
                            <input type="password" name="tnova" id="cnova" maxlength="40" required autofocus></p>
                        <!--<label for="cnova">Nova Senha</label>-->
                    </div>

                    <!--CAMPO REPETIÇÃO DA SENHA-->
                    <div class="input-field col s12">
                        <p>Repita a Nova Senha<i class="material-icons prefix">vpn_key</i>
                            <input type="password" name="tnova2" id="cnova2" maxlength="40" required autofocus></p>
                        <!--<label for="cnova2">Repita a Nova Senha</label>-->
                    </div>

                    <!--<input type="submit" class="botaos2" name="alterar" value="Alterar">-->

                    <!--BOTÕES-->
                    <div class="input-field col s12">
                        <input type="submit" value="Alterar" class="btn blue" name="alterar">
                        <input type="reset" value="limpar" class="btn red">
                    </div>
                </div>

        </form>

        <div id="div_inform_senha" class="center-align m6 l6 s6 row container">
            <p id="center1">CARACTERES PERMITIDOS </p>
            <p id="center2">abcdefghijklmnopqrstuvxzyw._@=0123456789#</p>
            <p id="center2">ABCDEFGHIJKLMNOPQRSTUVXZYW</p>
        </div>
    </div>
    </div>
<?php
if(isset($_REQUEST['alterar'])){
    $senha_atual = $_POST["tatual"];
    $permitidas = "abcdefghijklmnopqrstuvxzyw._@=0123456789#ABCDEFGHIJKLMNOPQRSTUVXZYW";
    $num_permitidas = strlen($permitidas);
    $array_permitidas = str_split($permitidas);

    $nova_senha1 = $_POST["tnova"];
    $cont_senha1 = 0;
    $num_senha1 = strlen($nova_senha1);
    $array_senha1 = str_split($nova_senha1);
    for($i=0; $i<$num_senha1; $i++){
        $diferente = 0;
        for($p=0; $p<$num_permitidas; $p++){
            if($array_senha1[$i] == $array_permitidas[$p]){
                $cont_senha1++;
                $p = $num_permitidas;
            }
            else{
                $diferente++;
            }
        }
        if($diferente == $num_permitidas){
            echo "<script> alert('Inserido Caracter Inválido! Tente Novamente');</script>";
            sleep(0.3);
            echo "<script>location.href='alterar-senha.php'</script>";
            exit;
        }
        else if($cont_senha1 == $num_senha1){
        }
    }

    $nova_senha2 = $_POST["tnova2"];
    $cont_senha2 = 0;
    $num_senha2 = strlen($nova_senha2);
    $array_senha2 = str_split($nova_senha2);
    for($i=0; $i<$num_senha2; $i++){
        $diferente = 0;
        for($p=0; $p<$num_permitidas; $p++){
            if($array_senha2[$i] == $array_permitidas[$p]){
                $cont_senha2++;
                $p = $num_permitidas;
            }
            else{
                $diferente++;
            }
        }
        if($diferente == $num_permitidas){
            echo "<script> alert('Inserido Caracter Inválido! Tente Novamente');</script>";
            sleep(0.3);
            echo "<script>location.href='alterar-senha.php'</script>";
            exit;
        }
        else if($cont_senha2 == $num_senha2){
        }
    }

    if($nova_senha1 != $nova_senha2)
    {
        echo "<script> alert('Senhas Diferentes! Digite Novamente...')</script>";
        echo "<script>location.href='alterar-senha.php'</script>";
    }
    else
    {
        $senha_atual_md5 = md5($senha_atual);
        $sql1 = "SELECT * FROM tb_usuarios WHERE id = '$id_user' and senha = '$senha_atual_md5'";
        $linha1 = $link->query($sql1);
        $num1 = $linha1->num_rows;
        if($num1==0){
            echo "<script> alert('Senha atual não Confere! Tente Novamente...')</script>";
            echo "<script>location.href='alterar-senha.php'</script>";
        }
        else
        {
            $nova_senha2_md5 = md5($nova_senha2);
            $sql = "UPDATE tb_usuarios SET senha = '$nova_senha2_md5', log = 'S' WHERE id = '$id_user' ";
            $link->query($sql);
            date_default_timezone_set('America/Sao_Paulo');
            $data_log = date('Y-m-d');
            $hora_log = date('H:i:s');
            //$sql_log = "INSERT INTO log (id_usuario, `data`, hora, codigo, operacao) VALUES ('$id_user', '$data_log', '$hora_log', '03', 'Alterou a Senha')";
            //$link->query($sql_log);

            $_SESSION['red_senha'] = "";
            echo "<script> alert('Senha Alterada com Sucesso!')</script>";
            echo "<script>location.href='tela-comum.php'</script>";

        }
    }
}
?>

    <!--Arquivos JQUERY que fazem comparação de senha funcionar-->
    <script src="../../_jquery/validar1.js"></script>
    <script src="../../_jquery/validar2.js"></script>
    <script src="../../_jquery/validar3.js"></script>
    <script>
        // COMPARANDO (SENHA e CONFIRMAÇÃO) C/ JQUERY
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $( "#ent" ).validate({
            rules: {
                cnova: "required",
                tnova2: {
                    equalTo: "#cnova"
                }
            },
            submitHandler: function (ent) {  //faz o botão (ENVIAR) SUBMIT funcionar
                ent.submit();
            }
        });
    </script>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>