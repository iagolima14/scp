<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <!--FORMULÁRIO DE CADASTRO DO SUBGRUPO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="../../banco_de_dados/admin/create-subgrupo.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="120"></legend>
                <h5 class="light center">Cadastrar Subgrupo</h5>

                <!--CAMPO NOME DO SUBGRUPO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">group_add</i>
                    <input type="text" name="nome_subgrupo" id="nome_subgrupo" maxlength="80" required autofocus>
                    <label for="nome_subgrupo">Nome do Subgrupo</label>
                </div>

                <!--CAMPO CÓDIGO INTERNO SUBGRUPO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">select_all</i>
                    <input type="text" name="cod_subgrupo" id="cod_subgrupo" maxlength="20" required>
                    <label for="cod_subgrupo">Código do Subgrupo</label>
                </div>

                <!--BOTÕES-->
                <div class="input-field col s12">
                    <input type="submit" value="cadastrar" class="btn green">
                    <input type="reset" value="limpar" class="btn red">
                    <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="location.href='tela-admin.php'">
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>