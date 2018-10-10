<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

<div class="row">
    <div class="container">
        <div class="col s12 m12 l12 center">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <form method="POST" action="arquivo.php" enctype="multipart/form-data" onsubmit="return checkSubmit()">
                <input type="file" name="arquivo" class="input-field add_arquivo" required>
                <div class="input-field">
                    <input type="submit" value="enviar" name="Enviar" class="btn green"">
                    <input type="reset" value="limpar" name="limpar" class="btn red"">
                    <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="location.href='tela-admin.php'">
                </div>
            </form>
        </div>
    </div>
</div>

<?php //include_once ("../../_includes/geral/footer.inc.php");
    include_once ("../../_includes/comum/footer_comum.inc.php");
?>

