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
$id_subgrupo = filter_input(INPUT_GET, 'id_subgrupo', FILTER_SANITIZE_NUMBER_INT);

$querySelect = $link->query("select * from tb_subgrupo where id='$id_subgrupo'");
while ($registros = $querySelect->fetch_assoc()){
    $id_do_subgrupo = $registros['id'];
    $nome_subgrupo = $registros['nome_subgrupo'];
    $cod_subgrupo = $registros['cod_subgrupo'];

    $id_pertenc_grupo = $registros['id_grupo'];
}

$querySelect2 = $link->query("select * from tb_grupo where id='$id_pertenc_grupo'");
while ($registros2 = $querySelect2->fetch_assoc()){
    $nome_grupo = $registros2['nome_grupo'];
}

?>

    <!--FORMULÁRIO DE EDIÇÃO DO SUBGRUPO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="../../banco_de_dados/admin/update-subgrupos.php" method="post" class="col s12">
            <input type="hidden" value="<?php echo $id_do_subgrupo ?>" name="id_subgrupo"/>
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="100"></legend>
                <h5 class="light center">Alteração</h5><br><br>

                <!--CAMPO NOME DO GRUPO que o SUBGRUPO pertence-->
                <div class="input-field col s6">
                    <i class="material-icons prefix">group_add</i>
                    <input type="text" name="nome_subgrupo" id="nome_subgrupo" value="<?php echo $nome_grupo ?>" maxlength="40" required autofocus readonly>
                    <label for="nome_subgrupo">Grupo que o Subgrupo pertence</label>
                </div>

                <!--CAMPO CODIGO DO SUBGRUPO-->
                <div class="input-field col s6">
                    <i class="material-icons prefix">select_all</i>
                    <input type="number" name="cod_subgrupo" id="cod_subgrupo" value="<?php echo $cod_subgrupo ?>" maxlength="50" required readonly>
                    <label for="cod_subgrupo">Código do Subgrupo</label>
                </div>

                <fieldset>
                    <legend><h6>Alterar Nome do Subgrupo</h6></legend>
                <!--CAMPO NOME DO SUBGRUPO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">group_add</i>
                    <input type="text" name="nome_subgrupo" id="nome_subgrupo" value="<?php echo $nome_subgrupo ?>" maxlength="40" required autofocus>
                    <label for="nome_subgrupo">Nome do Subgrupo</label>
                </div>
                </fieldset>

                <input type="hidden" value="<?php echo $id_do_subgrupo?>" name="id_grupo"/>

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