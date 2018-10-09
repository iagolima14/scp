<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="../../banco_de_dados/admin/create-itens.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="120"></legend>
                <h5 class="light center">Cadastro de Itens</h5>

                <?php
//                if (isset($_SESSION['msg'])){
//                    echo $_SESSION['msg'];
//                    session_unset(); //LIMPA A SESSÃO
//                }
//                ?>

                <!--CAMPO DESCRIÇÃO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">add</i>
                    <input type="text" name="descricao" id="descricao" maxlength="80" required autofocus>
                    <label for="descricao">Descrição do Item</label>
                </div>

                <!--CAMPO CÓDIGO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">select_all</i>
                    <input type="text" name="codigo" id="codigo" maxlength="20" required>
                    <label for="codigo">Código do Item</label>
                </div>

                <!--CAMPO QUANTIDADE-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">add_shopping_cart</i>
                    <input type="number" name="quantidade" id="quantidade" maxlength="20" required>
                    <label for="quantidade">Quantidade</label>
                </div>

                <!--CAMPO DATA DA AQUISIÇÃO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">date_range</i>
                    <input type="date" name="data" id="data" maxlength="20" required>
                    <label for="data">Data da Aquisição</label>
                </div>

                <!--CAMPO VALOR-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">monetization_on</i>
                    <input type="text" name="valor" id="valor" maxlength="20" required>
                    <label for="valor">Valor do Item</label>
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