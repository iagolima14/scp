<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>


<div class="row container teste">
    <div class="col s12">
        <h5 class="light">Consultar Itens</h5><hr>
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
                <input type="submit" value="OK" class="btn blue">
            </div>
        </form>

        <table class="striped">
            <thead>
            <tr class="altera_fonte_cab">
                <th>Item</th>
                <th>Descrição</th>
                <th>Cod Item</th>
                <th>QTD TOTAL</th>
                <th>QTD DISPONIVEL</th>
                <th>Data da Aquisição</th>
                <th>Valor</th>
                <th>Editar</th>
                <th>A/I</th>
            </tr>
            </thead>
            <tbody>
            <?php include_once '../../banco_de_dados/admin/read-itens.php' ?>
            </tbody>
        </table>
    </div>
</div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>

