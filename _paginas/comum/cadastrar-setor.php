<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <!--FORMULÁRIO DE CADASTRO DE SETOR-->
    <div class="row container">
        <p>&nbsp;</p>

        <form action="../../banco_de_dados/comum/create-setor.php" method="post" class="col s12" onsubmit="return checkSubmit()">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/casa1.png" alt="[imagem]" width="200"></legend>
                <h5 class="light center">Cadastro de Setores</h5>

                <?php
                //                if (isset($_SESSION['msg'])){
                //                    echo $_SESSION['msg'];
                //                    session_unset(); //LIMPA A SESSÃO
                //                }
                ?>

                <!--CAMPO NOME DO SETOR-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" maxlength="40" required autofocus>
                    <label for="nome">Nome do Setor</label>
                </div>

                <!--CAMPO RESPONSÁVEL PELO SETOR-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">person_add</i>
                    <input type="text" name="responsavel" id="responsavel" maxlength="50" required>
                    <label for="responsavel">Responsável Pelo Setor</label>
                </div>

                <!--CAMPO TELEFONE DO SETOR-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">local_phone</i>
                    <input type="text" name="telefone" id="telefone" maxlength="20">
                    <label for="telefone">Telefone do Setor</label>
                </div>

                <!--BOTÕES-->
                <div class="input-field col s12">
                    <input type="submit" value="cadastrar" class="btn green"/>
                    <input type="reset" value="limpar" class="btn red"/>
                    <input type="button" value="Voltar" class="btn blue" onclick="location.href='tela-comum.php'"/>
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>