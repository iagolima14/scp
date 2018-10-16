<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <div class="row container scrolling">
        <div class="col s12">

            <div class="col s10">
                <h5 class="light">Lista de Setores</h5>
                <hr>
            </div>
            <div class="col s2">
                <input type="button" value="VOLTAR" class="btn blue mover_btn_baixo" onclick="location.href='tela-comum.php'">
            </div>

            <table class="striped">
                <thead>
                <tr>
                    <th style="width: 30%; text-transform: uppercase;">Nome do Setor</th>
                    <th style="width: 19%; text-transform: uppercase;">Quantidade de Itens</th>
                    <th style="width: 20%; text-transform: uppercase;">Responsável</th>
                    <th style="width: 15%; text-transform: uppercase;">Telefone</th>
                    <th style="width: 13%; text-transform: uppercase;">Lista de Itens</th>

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