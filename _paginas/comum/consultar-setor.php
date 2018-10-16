<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <div class="col s10">
                <h5 class="light">Consultar Setores</h5>
                <hr>
            </div>
            <div class="col s2">
                <input type="button" value="VOLTAR" class="btn blue mover_btn_baixo" onclick="location.href='tela-comum.php'">
            </div>
            <table class="striped">
                <thead>
                <tr>
                    <th style="width: 28%; text-transform: uppercase;">Nome do Setor</th>
                    <th style="width: 18%; text-transform: uppercase;">Quantidade de Itens</th>
                    <th style="width: 20%; text-transform: uppercase;">Responsável</th>
                    <th style="width: 15%; text-transform: uppercase;">Telefone</th>
                    <th style="width: 10%; text-transform: uppercase;">Editar</th>
                    <th style="width: 8%; text-transform: uppercase;">A/I</th>
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