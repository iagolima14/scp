<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Consultar Setores</h5>
            <hr>

            <table class="striped">
                <thead>
                <tr>
                    <th style="width: 30%">Nome do Setor</th>
                    <th style="width: 15%">Quantidade de Itens</th>
                    <th style="width: 20%">Responsável</th>
                    <th style="width: 15%">Telefone</th>
                    <th style="width: 10%">Editar</th>
                    <th style="width: 8%">A/I</th>
                </tr>
                </thead>
                <tbody>
                <div id="teste">

                </div>
                <?php include_once '../../banco_de_dados/comum/read-setores.php' ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>