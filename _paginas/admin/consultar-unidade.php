<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

<div class="row container teste">
    <div class="col s12">
        <h5 class="light">Consultar Unidades</h5>
        <hr>
        <form>
            <div class="col s10">
                <select id="select_unidades" name="select_unidades" onchange="select()">
                    <option></option>
                    <option value="todas">TODAS</option>
                    <option value="RMSP">CAPITAL E RMS GESTÃO PLENA</option>
                    <option value="IP">INTERIOR GESTÃO PLENA</option>
                    <option value="RMSC">CAPITAL E RMS COGESTÃO</option>
                    <option value="IC">INTERIOR COGESTÃO</option>
                    <option value="CEAPA">CEAPA</option>
                </select>
            </div>
            <div class="col s2 center-align">
                <input type="submit" value="OK" class="btn blue">
            </div>
        </form>
        <table class="striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Cidade</th>
                <th>Região</th>
                <th>Diretor</th>
                <th>Alterar Dir.</th>
                <th>Telefone</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            <?php include_once '../../banco_de_dados/admin/read-unidades.php' ?>
            </tbody>
        </table>
    </div>
</div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>

