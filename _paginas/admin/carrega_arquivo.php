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
            <form method="POST" action="arquivo.php" enctype="multipart/form-data">
                <input type="file" name="arquivo" class="">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>

