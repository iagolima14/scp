<?php session_start() ?>
<?php include ("_includes/header.inc.php"); ?>

<?php include_once ("_includes/menu.inc.php"); ?>

    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="banco_de_dados/create.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="_imagens/avatar1.png" alt="[imagem]" width="100"></legend>
                <h5 class="light center">Cadastro de Clientes</h5>

                <?php
                if (isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    session_unset(); //LIMPA A SESSÃO
                }
                ?>

                <!--CAMPO NOME-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" maxlength="40" required autofocus>
                    <label for="nome">Nome do Cliente</label>
                </div>

                <!--CAMPO EMAIL-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="email" name="email" id="email" maxlength="50" required>
                    <label for="email">E-mail do Cliente</label>
                </div>

                <!--CAMPO EMAIL-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input type="tel" name="telefone" id="telefone" maxlength="15" required>
                    <label for="telefone">Telefone do Cliente</label>
                </div>

                <!--BOTÕES-->
                <div class="input-field col s12">
                    <input type="submit" value="cadastrar" class="btn blue">
                    <input type="reset" value="limpar" class="btn red">
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once ("_includes/footer.inc.php"); ?>