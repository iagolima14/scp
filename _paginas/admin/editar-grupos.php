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

$querySelect = $link->query("select * from tb_grupo where id='$id'");

while ($registros = $querySelect->fetch_assoc()){
    $id_do_grupo = $registros['id'];
    $nome_grupo = $registros['nome_grupo'];
    $cod_grupo = $registros['cod_grupo'];
}
?>

    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="../../banco_de_dados/admin/update-grupos.php" method="post" class="col s12">
            <input type="hidden" value="<?php echo $id_do_grupo ?>" name="id_grupo"/>
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="100"></legend>
                <h5 class="light center">Alteração</h5>

                <!--CAMPO NOME DO GRUPO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">group_add</i>
                    <input type="text" name="nome_grupo" id="nome_grupo" value="<?php echo $nome_grupo ?>" maxlength="40" required autofocus>
                    <label for="nome_grupo">Nome do Grupo</label>
                </div>

                <!--CAMPO CODIGO DO GRUPO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">select_all</i>
                    <input type="number" name="cod_grupo" id="cod_grupo" value="<?php echo $cod_grupo ?>" maxlength="50" required readonly>
                    <label for="cod_grupo">Código do Grupo</label>
                </div>
                <input type="hidden" value="<?php echo $id?>" name="id_grupo"/>

                <!--BOTÕES-->
                <div class="input-field col s12">
                    <input type="submit" value="Alterar" class="btn green">
                    <!-- <a href="consultar-usuario.php" class="btn red">Cancelar</a>-->
                    <!-- <input type="reset" value="limpar" class="btn red">-->
                    <input type="button" value="Voltar" class="btn blue" onclick="location.href='consultar-grupos.php'">
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>