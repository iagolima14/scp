<?php include_once ("_includes/header.inc.php"); ?>
<?php include_once ("_includes/menu.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Consultas</h5><hr>

            <table class="striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                <?php include 'banco_de_dados/read.php' ?>
                </tbody>
            </table>
        </div>
    </div>


<?php include_once ("_includes/footer.inc.php"); ?>

