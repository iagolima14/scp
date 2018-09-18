<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Edição de Registros</h5><hr>
        </div>
    </div>

<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$_SESSION['id'] = $id;
$querySelect = $link->query("select * from tb_setores where id='$id'");

while ($registros = $querySelect->fetch_assoc()){
    $nome = $registros['nome'];
    $responsavel = $registros['responsavel'];
    $telefone = $registros['telefone'];
}
?>

    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="../../banco_de_dados/comum/update-setores.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/casa1.png" alt="[imagem]" width="150"></legend>
                <h5 class="light center">Alteração</h5>

                <!--CAMPO NOME-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" maxlength="40" required autofocus>
                    <label for="nome">Nome do Setor</label>
                </div>

                <!--CAMPO RESPONSAVEL-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">people</i>
                    <input type="text" name="responsavel" id="responsavel" value="<?php echo $responsavel ?>" maxlength="50" required>
                    <label for="responsavel">Responsável</label>
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
                    <a href="consultar-setor.php" class="btn red">Cancelar</a>
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>