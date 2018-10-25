<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">ITENS CARREGADOS NO SISTEMA</h5>
            <hr>
            <table class="striped">
                <thead>
                <tr>
                    <th>ITEM</th>
                    <th>NOME</th>
                    <th>QUANTIDADE</th>
                    <th>VALOR</th>
                    <th>EXCLUIR</th>
                    <th>ALTERAR</th>
                </tr>
                </thead>
                <tbody>
                <?php include_once '../../banco_de_dados/admin/read-itens-lancados.php' ?>
                </tbody>
            </table>
        </div>
        <!--BOTÕES-->
        <div class="input-field col s7 offset-s5">
            <input type="submit" value="confirmar" class="btn green">
            <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="location.href='adiciona-itens-na-nota.php'">

        </div>
    </div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>