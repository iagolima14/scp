<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Solicitar Baixa de Item</h5>
            <hr>
            <div class="col s12 centralizar_div">
                <form method="get">
                    <div class="input-field col s6 offset-s1">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="nome" id="nome" maxlength="40" required autofocus>
                        <label for="nome">Patrimônio do Item</label>
                    </div>
                    <div class="col s1">
                        <input type="submit" value="buscar" onclick="mostra_div('secreta')" class="btn green alinhar_botao"/>
                    </div>
                    <div class="col s1">
                        <input type="reset" value="limpar" class="btn red alinhar_botao"/>
                    </div>
                </form>
            </div>
            <div id="secreta" class="col s10 center offset-s1">

            </div>



        </div>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>