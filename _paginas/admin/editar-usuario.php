<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Edição de Registros</h5><hr>
        </div>
    </div>

<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$_SESSION['id'] = $id;
$querySelect = $link->query("select * from tb_usuarios where id='$id'");

while ($registros = $querySelect->fetch_assoc()){
    $nome = $registros['nome'];
    $matricula = $registros['matricula'];
    $email = $registros['email'];
    $login = $registros['login'];
    $telefone = $registros['telefone'];
    $permissao = $registros['permissao'];
    $situacao = $registros['situacao'];
    $log = $registros['log'];
}
?>

    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="../../banco_de_dados/admin/update-usuarios.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/avatar1.png" alt="[imagem]" width="100"></legend>
                <h5 class="light center">Alteração</h5>

                <!--CAMPO NOME-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" maxlength="40" required autofocus>
                    <label for="nome">Nome do Usuário</label>
                </div>

                <!--CAMPO MATRICULA-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">filter_9_plus</i>
                    <input type="text" name="matricula" id="matricula" value="<?php echo $matricula ?>" maxlength="50" required>
                    <label for="matricula">Matrícula do Usuário</label>
                </div>

                <!--CAMPO E-MAIL-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="email" name="email" id="email" value="<?php echo $email ?>" maxlength="40" required>
                    <label for="email">E-MAIL do Usuário</label>
                </div>

                <!--CAMPO LOGIN-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">contacts</i>
                    <input type="text" name="login" id="login" value="<?php echo $login ?>" maxlength="30" required>
                    <label for="login">Login do Usuário</label>
                </div>

                <!--CAMPO TELEFONE-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone ?>" maxlength="20" required>
                    <label for="telefone">Telefone do Usuário</label>
                </div>

                <!--BOTÕES-->
                <div class="input-field col s12">
                    <input type="submit" value="alterar" class="btn blue">
                    <a href="consultar-usuario.php" class="btn red">Cancelar</a>
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>