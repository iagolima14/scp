<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

<div class="row container teste">
    <div class="col s12">
        <div class="col s10">
            <h5 class="light">Movimentações de Itens nas Unidades</h5>
            <hr>
        </div>
        <div class="col s2">
            <input type="button" value="VOLTAR" class="btn blue mover_btn_baixo" onclick="location.href='tela-admin.php'">
        </div>
        <!--<form>
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
        </form>-->
        <table class="striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>UNIDADE</th>
                <th>DATA</th>
                <th>SETOR ORIGEM</th>
                <th>SETOR DESTINO</th>
                <th>PATRIMÔNIO</th>
                <th>ITEM</th>
                <th>ATUALIZAR</th>
            </tr>
            </thead>
            <tbody>
            <?php include_once '../../banco_de_dados/admin/read-movimentacoes.php' ?>
            </tbody>
        </table>
    </div>
</div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>

