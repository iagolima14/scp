<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <div class="col s10">
                <h5 class="light">Consultar Grupos e Subgrupos</h5>
                <hr>
            </div>
            <div class="col s2">
                <input type="button" value="VOLTAR" class="btn blue mover_btn_baixo" onclick="location.href='tela-admin.php'">
            </div>
            <table id="tab_grupo" class="striped">
                <thead>
                <tr>
                    <th style="width: 20%; text-transform: uppercase;">ID</th>
                    <th style="width: 40%; text-transform: uppercase;">Nome do Grupo/Subgrupo</th>
                    <th style="width: 30%; text-transform: uppercase;">Cod do Grupo/Subgrupo</th>
                    <th style="width: 10%; text-transform: uppercase;">Editar</th>
                </tr>
                </thead>
                <tbody>
                <div id="teste">

                </div>
                <?php include_once '../../banco_de_dados/admin/read-grupos.php' ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

<?php include_once("../../_includes/geral/footer.inc.php"); ?>