<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Informações do Diretor</h5>
            <hr>

            <?php
                $id_diretor = filter_input(INPUT_GET, 'nome_user_diretor', FILTER_SANITIZE_NUMBER_INT);

                $querySelect = $link->query("select * from tb_usuarios where id = '$id_diretor'");

                while ($registros = $querySelect->fetch_assoc()) {
                    $id = $registros['id'];
                    $nome = $registros['nome'];
                    $cidade = $registros['cidade'];
                    $regiao = $registros['regiao'];
                    $telefone = $registros['telefone'];
                    $id_usuario_diretor = $registros['diretor'];
                }
                echo "$id";
                echo "$nome";
                echo "$cidade";
            ?>

        </div>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>