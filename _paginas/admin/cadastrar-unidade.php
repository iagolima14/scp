<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>

        <form action="../../banco_de_dados/admin/create-unidades.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/casa1.png" alt="[imagem]" width="200"></legend>
                <h5 class="light center">Cadastro de Unidades</h5>

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
                    <label for="nome">Nome da Unidade</label>
                </div>

                <!--CAMPO CIDADE DA UNIDADE-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">location_on</i>
                    <input type="text" name="cidade" id="cidade" maxlength="50" required>
                    <label for="cidade">Cidade da Unidade</label>
                </div>

                <!--CAMPO TELEFONE DA UNIDADE-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">call</i>
                    <input type="number" name="telefone" id="telefone" maxlength="50" required>
                    <label for="telefone">Telefone da Unidade</label>
                </div>


                <div class="input-field col s12">
                    <i class="material-icons prefix">location_city</i>
                    <select name="regiao">
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
                    <input type="submit" value="cadastrar" class="btn green">
                    <input type="reset" value="limpar" class="btn red">
                    <input type="button" value="Voltar" class="btn blue" onclick="location.href='tela-admin.php'">
                </div>

            </fieldset>
        </form>
    </div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>