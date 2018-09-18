<?php include_once 'banco_de_dados/conexao.php'; ?>
<?php include_once ("_includes/header.inc.php"); ?>
<?php include_once ("_includes/menu.inc.php"); ?>

<div class="row container">
    <div class="col s12">
        <h5 class="light">Consultar Unidades</h5>
        <hr>
        <form>
            <div class="col s10">
                <select id="select_unidades" name="select_unidades" onchange="select()">
                    <option></option>
                    <option value="todas">TODAS</option>
                    <option value="Capital">CAPITAL</option>
                    <option value="Interior">INTERIOR</option>
                </select>
            </div>
            <div class="col s2 center-align">
                <input type="submit" value="Consultar" class="btn blue waves-light waves-effect">
            </div>
        </form>
        <table class="striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Cidade</th>
                <th>Região</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            <?php include_once 'banco_de_dados/read-unidades.php' ?>
            </tbody>
        </table>
    </div>
</div>


<?php include_once ("_includes/footer.inc.php"); ?>

