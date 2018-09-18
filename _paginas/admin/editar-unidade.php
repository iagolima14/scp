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
$querySelect = $link->query("select * from tb_unidades where id='$id'");

while ($registros = $querySelect->fetch_assoc()){
    $nome = $registros['nome'];
    $cidade = $registros['cidade'];
    $regiao = $registros['regiao'];
    $telefone = $registros['telefone'];
}
?>

    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="../../banco_de_dados/admin/update-unidades.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/casa1.png" alt="[imagem]" width="200"></legend>
                <h5 class="light center">Alteração</h5>

                <!--CAMPO NOME-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" maxlength="40" required autofocus>
                    <label for="nome">Nome da Unidade</label>
                </div>

                <!--CAMPO CIDADE DA UNIDADE-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">location_on</i>
                    <input type="text" name="cidade" id="cidade" value="<?php echo $cidade ?>" maxlength="50" required>
                    <label for="cidade">Cidade da Unidade</label>
                </div>

                <!--CAMPO TELEFONE DA UNIDADE-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">call</i>
                    <input type="number" name="telefone" id="telefone" value="<?php echo $telefone ?>" maxlength="50" required>
                    <label for="telefone">Telefone da Unidade</label>
                </div>


                <div class="input-field col s12">
                    <i class="material-icons prefix">location_city</i>
                    <select name="regiao" value="<?php echo $regiao ?>">
                        <option value="" disabled selected></option>
                        <option value="RMSP">CAPITAL E RMS GESTÃO PLENA</option>
                        <option value="IP">INTERIOR GESTÃO PLENA</option>
                        <option value="RMSC">CAPITAL E RMS COGESTÃO</option>
                        <option value="IC">INTERIOR COGESTÃO</option>
                        <option value="CEAPA">CEAPA</option>
                    </select>
                    <label>REGIÃO DA UNIDADE</label>
                </div>

                <!--BOTÕES-->
                <div class="input-field col s12">
                    <input type="submit" value="alterar" class="btn blue">
                    <a href="consultar-unidade.php" class="btn red">Cancelar</a>
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>