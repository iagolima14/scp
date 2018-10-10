<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="cadastrar-usuario.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/avatar1.png" alt="[imagem]" width="100"></legend>
                <h5 class="light center">Cadastro de Usuários</h5>

                <?php
//                if (isset($_SESSION['msg'])){
//                    echo $_SESSION['msg'];
//                    session_unset(); //LIMPA A SESSÃO
//                }
                ?>

                <!--CAMPO NOME-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" maxlength="40" required autofocus>
                    <label for="nome">Nome do Usuário</label>
                </div>

                <!--CAMPO MATRICULA-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">filter_9_plus</i>
                    <input type="text" name="matricula" id="matricula" maxlength="50" required>
                    <label for="matricula">Matrícula do Usuário</label>
                </div>

                <!--CAMPO E-MAIL-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="email" name="email" id="email" maxlength="40" required>
                    <label for="email">E-MAIL do Usuário</label>
                </div>

                <!--CAMPO LOGIN-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">contacts</i>
                    <input type="text" name="login" id="login" maxlength="30" required>
                    <label for="login">Login do Usuário</label>
                </div>

                <!--CAMPO TELEFONE-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input type="tel" name="tel" id="tel" maxlength="20" required>
                    <label for="tel">Telefone do Usuário</label>
                </div>


                <!--CAMPO UNIDADE DO USUÁRIO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">location_city</i>
                    <select class="aa" id="sel_unidades" name="sel_unidades">
                        <option></option>
                        <?php
                        $querySelect = $link->query("select * from tb_unidades");
                        while ($registros = $querySelect->fetch_assoc()) {
                            $nome = $registros['nome'];
                            $id_unidade_selecionada = $registros['id'];
                            echo "<option value='$id_unidade_selecionada'>$nome - $id_unidade_selecionada</option>";
                        }
                        ?>
                    </select>
                    <label for="tel">Unidade do Usuário</label>
                </div>

                <fieldset id="permis" class="formulario" style="padding: 15px">
                    <legend>Permissão</legend>
                    <form action="#" id="permis">
                        <p><label id="lbl">
                                <input name="group1" type="radio" value="2" checked />
                                <span>Comum</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input name="group1" type="radio" value="1" />
                                <span>Administrador</span>
                            </label>
                        </p>
                </fieldset>

                <!--BOTÕES-->
                <div class="input-field col s12">
                    <input type="submit" value="cadastrar" name="salvar" class="btn green">
                    <input type="reset" value="limpar" class="btn red">
                    <input type="button" value="Voltar" class="btn blue" onclick="location.href='tela-admin.php'">
                </div>

            </fieldset>
        </form>
    </div>

<?php
if(isset($_REQUEST['salvar'])) {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "ERRO";
    $matricula = isset($_POST["matricula"]) ? $_POST["matricula"] : "";
    if ($nome == "ERRO") {
        echo "<script> alert('Erro ao registrar o nome do Usuário. Tente novamente!');</script>";
        echo "<script> locatin.href='cadastrar-usuario.php'</script>";
    }
    else {
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
        $id_unidade = isset($_POST["sel_unidades"]) ? $_POST["sel_unidades"] : "";

        $sql2 = "SELECT * FROM tb_usuarios WHERE login = '$login'";
        $linha2 = $link->query($sql2);
        $num2 = $linha2->num_rows;
        if ($num2 > 0) {
            echo "<script> alert('Login Já Cadastrado! Tente Novamente...')</script>";
            echo "<script>location.href='cadastrar-usuario.php'</script>";
        } else {
            $senha = "Seap=2018";
            $senha_criptografada = md5($senha);
            $sql3 = "INSERT INTO tb_usuarios (login, senha, matricula, nome, permissao, situacao, telefone, email, id_unidade) VALUES ('$login', '$senha_criptografada', '$matricula', '$nome' ,'$permissao', 'A', '$telefone', '$email','$id_unidade')";
            $link->query($sql3);
            date_default_timezone_set('America/Sao_Paulo');
            $data_log = date('Y-m-d');
            $hora_log = date('H:i:s');
            $sql_log = "INSERT INTO log (id_usuario, `data`, hora, codigo, operacao) VALUES ('$id_user', '$data_log', '$hora_log', '04', 'Cadastrou o Usuário $nome')";
            $link->query($sql_log);
            echo "<script> alert('Usuário Cadastrado com Sucesso!')</script>";
            echo "<script>location.href='cadastrar-usuario.php'</script>";
        }
    }
}
?>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>