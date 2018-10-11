<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

<?php
$id_setor_selecionado = filter_input(INPUT_GET, 'id_setor', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_setor_selecionado = filter_input(INPUT_GET, 'nome_setor', FILTER_SANITIZE_SPECIAL_CHARS);
?>

    <div class="row container teste">
        <div class="col s12">
            <h5 class="light">Itens Disponível no Setor -- <?php echo $nome_setor_selecionado ?></h5>
            <hr>

            <table class="striped">
                <thead>
                <tr class="altera_fonte_cab">
                    <th>Item</th>
                    <th>Nome</th>
                    <th>Cod Item</th>
                    <th>Situação</th>
                    <th>Mover o Item</th>
                </tr>
                </thead>
                <tbody>
                <?php include_once '../../banco_de_dados/comum/read_exib_itens_setor.php' ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>