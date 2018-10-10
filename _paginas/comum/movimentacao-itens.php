<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <div class="row container scrolling">
        <div class="col s12">
            <h5 class="light">Lista de Setores</h5>
            <hr>


            <table class="striped">
                <thead>
                <tr>
                    <th>Nome do Setor</th>
                    <th>Quantidade de Itens</th>
                    <th>Responsável</th>
                    <th>Telefone</th>
                    <th>Lista de Itens</th>

                </tr>
                </thead>
                <tbody>
                <div id="teste">

                </div>
                <?php include_once '../../banco_de_dados/comum/read-movimentacao-itens.php' ?>
                </tbody>
            </table>
        </div>

    </div>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>