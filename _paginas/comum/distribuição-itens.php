<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Distribuição de Itens</h5>
            <hr>

            <form method='get'>
                <div class="col s11">
                    <select name="filtro" required>
                        <option></option>
                        <option value="2">Itens Distribuídos</option>
                        <option value="1">Não Distribuídos</option>
                    </select>
                </div>

                <div class="col s1">
                    <input type="submit" class="btn blue" value="OK">
                </div>
            </form>


            <table class="striped">
                <thead>
                <tr>
                    <th>ITEM</th>
                    <th>PATRIMONIO</th>
                    <th>NOME DO ITEM</th>
                    <th>DESCRIÇÃO</th>
                    <th>SETOR</th>
                    <th>SITUAÇÃO FÍSICA</th>
                    <th>DATA AQUISIÇÃO</th>
                    <th>VALOR DE AQUISIÇÃO</th>
                    <th>OBS</th>
                    <th>S. BAIXA</th>
                </tr>
                </thead>
                <tbody>
                <div id="teste">

                </div>
                <?php include_once '../../banco_de_dados/comum/read-itens-unidades.php' ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>