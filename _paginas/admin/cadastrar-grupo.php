<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <!--FORMULÁRIO DE CADASTRO DO GRUPO-->
    <div class="row container ">
        <p>&nbsp;</p>
        <div class="col offset-s2 s8">
            <form action="../../banco_de_dados/admin/create-grupo.php" method="post" class="col s12">
                <fieldset class="formulario" style="padding: 15px">
                    <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="120"></legend>
                    <h5 class="light center">Cadastrar Grupo</h5>

                    <!--CAMPO NOME DO GRUPO-->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">group_add</i>
                        <input type="text" name="nome_grupo" id="nome_grupo" maxlength="80" required autofocus>
                        <label for="nome_grupo">Nome do Grupo</label>
                    </div>

                    <!--CAMPO CÓDIGO INTERNO GRUPO-->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">select_all</i>
                        <input type="text" name="cod_grupo" id="cod_grupo" maxlength="20" required>
                        <label for="cod_grupo">Código do Grupo</label>
                    </div>

                    <!--BOTÕES-->
                    <div class="input-field col offset-s4 s8">
                        <input type="submit" value="cadastrar" class="btn green">
                        <input type="reset" value="limpar" class="btn red">
                        <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="location.href='tela-admin.php'">
                    </div>

                </fieldset>
            </form>
        </div>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>