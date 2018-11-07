<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <div class="row container">
        <div class="col s10">
            <h5 class="light">Relatório Total de Itens</h5>
            <hr>
        </div>

        <!--BOTÃO VOLTAR-->
        <div class="col s2">
            <input type="button" value="VOLTAR" class="btn blue mover_btn_baixo" onclick="location.href='../../_paginas/admin/tela-admin.php'">
            <a href="#" class="btn green"><i class="material-icons" onclick="imprimir('impressao')">print</i></a>
        </div>
<div id="impressao">
    <link rel="stylesheet" href="../../_materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../_css/admin.css">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
        <table class="striped">
            <thead>
            <tr class="altera_fonte_cab">
                <th style="text-transform: uppercase; width: 5%">ITEM</th>
                <th style="text-transform: uppercase; width: 33%">NOME DO ITEM</th>
                <th style="text-transform: uppercase; width: 16%">CÓDIGO SIAP</th>
                <th style="text-transform: uppercase; width: 16%">CÓDIGO SISCOP</th>
                <th style="text-transform: uppercase; width: 13%">QUANTIDADE</th>
                <th style="text-transform: uppercase; width: 13%">DISPONIVEL</th>
            </tr>
            </thead>
            <tbody>
            <?php include_once '../../_relatorios/_admin/read-relatorio_estoque-total.php' ?>
            </tbody>
        </table>
</div>
    </div>
    </div>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>