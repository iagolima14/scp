<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>


<div class="row container">
    <div class="col s12">
        <div class="col s10">
            <h5 class="light">Consultar Itens</h5>
            <hr>
        </div>
        <div class="col s2">
            <input type="button" value="VOLTAR" class="btn blue mover_btn_baixo" onclick="location.href='tela-admin.php'">
        </div>

        <form>
            <div class="col s3">
                <p>&nbsp;</p>
                <input type="text" placeholder="Descrição" name="desc">

            </div>
            <div class="col s3">
                <p>&nbsp;</p>
                <input type="text" placeholder="Código" name="cod">

            </div>
            <div class="col s3">
                <p>Ordenar Por:</p>
                <select id="select_ordenacao" name="select_ordenacao">
                    <option value="codigo">CÓDIGO</option>
                    <option value="nome_item">DESCRIÇÃO</option>
                    <option value="quantidade">QUANTIDADE</option>
                    <option value="data">DATA</option>
                    <option value="valor">VALOR</option>
                    <option value="situacao">SITUAÇÃO</option>

                </select>
            </div>
            <div class="col s2">
                <p>Situação:</p>
                <select id="select_situacao" name="select_situacao">
                    <option></option>
                    <option value="A">ATIVO</option>
                    <option value="I">INATIVO</option>

                </select>
            </div>
            <div class="col s1 center">
                <p>&nbsp;</p>
                <input type="submit" value="OK" class="btn gree">
            </div>
        </form>

        <table class="striped">
            <thead>
            <tr class="altera_fonte_cab">
                <th style="text-transform: uppercase; width: 5%">Item</th>
                <th style="text-transform: uppercase; width: 28%">Descrição</th>
                <th style="text-transform: uppercase; width: 10%">Patrimônio</th>
                <th style="text-transform: uppercase; width: 10%">QTD TOTAL</th>
                <th style="text-transform: uppercase; width: 10%">DISPONIVEL</th>
                <th style="text-transform: uppercase; width: 15%">Data da Aquisição</th>
                <th style="text-transform: uppercase; width: 10%">Valor</th>
                <th style="text-transform: uppercase; width: 6%">Editar</th>
                <th style="text-transform: uppercase; width: 5%">A/I</th>
            </tr>
            </thead>
            <tbody>
            <?php include_once '../../banco_de_dados/admin/read-itens.php' ?>
            </tbody>
        </table>
    </div>
</div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>

