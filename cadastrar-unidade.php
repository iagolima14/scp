<?php include_once 'banco_de_dados/conexao.php'; ?>
<?php include_once ("_includes/header.inc.php"); ?>
<?php include_once ("_includes/menu.inc.php"); ?>

    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>

        <form action="banco_de_dados/create-unidades.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="_imagens/casa1.png" alt="[imagem]" width="200"></legend>
                <h5 class="light center">Cadastro de Unidades</h5>

                <?php
                if (isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    $_SESSION['msg'] = null;
                }
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
                    <label for="email">Cidade da Unidade</label>
                </div>


                <div class="input-field col s12">
                    <i class="material-icons prefix">location_city</i>
                    <select name="regiao">
                        <option value="" disabled selected></option>
                        <option value="capital">CAPITAL</option>
                        <option value="interior">INTERIOR</option>
                    </select>
                    <label>REGIÃO DA UNIDADE</label>
                </div>

                <!--BOTÕES-->
                <div class="input-field col s12">
                    <input type="submit" value="cadastrar" class="btn blue">
                    <input type="reset" value="limpar" class="btn red">
                </div>

            </fieldset>
        </form>
    </div>


<?php include ("_includes/footer.inc.php"); ?>