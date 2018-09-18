<?php include_once ("banco_de_dados/conexao.php"); ?>
<?php include_once ("_includes/header.inc.php"); ?>
<?php include_once ("_includes/menu.inc.php"); ?>


<div class="row container qqqq">
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
                    <option value="descricao">DESCRIÇÃO</option>
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
                <input type="submit" value="OK" class="btn blue waves-light waves-effect">
            </div>
        </form>

        <table class="striped">
            <thead>
            <tr>
                <th>Descrição</th>
                <th>Cod Item</th>
                <th>Quantidade</th>
                <th>Data da Aquisição</th>
                <th>Valor</th>
                <th>Editar</th>
                <th>A/I</th>
            </tr>
            </thead>
            <tbody>
            <?php include_once 'banco_de_dados/read-itens.php' ?>
            </tbody>
        </table>
    </div>
</div>


<?php include_once ("_includes/footer.inc.php"); ?>

