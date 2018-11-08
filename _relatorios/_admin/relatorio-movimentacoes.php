<?php include_once("../../banco_de_dados/conexao.php"); ?>
<?php include_once("../../_includes/geral/header.inc.php"); ?>
<?php include_once("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once("../../_includes/admin/menu_admin.inc.php"); ?>

    <div class="row container">
        <div class="col s10">
            <h5 class="light">Relatório de Movimentações</h5>
            <hr>
        </div>

        <!--BOTÃO VOLTAR e BOTÃO IMPRIMIR-->
        <div class="col s2">
            <input type="button" value="VOLTAR" class="btn blue mover_btn_baixo" onclick="location.href='../../_paginas/admin/relatorios.php'">
            <a href="#" class="btn green"><i class="material-icons" onclick="imprimir('impressao')">print</i></a>
        </div>

        <!--DIV QUE DELIMITA A IMPRESSÃO COM ID QUE SERÁ USADO NA FUNÇÃO JAVASCRIPT - TB É CHAMADO NO BOTÃO ACIMA-->
        <div id="impressao">
            <!--IMPORTAR AS LINHAS DE CSS DO CABEÇALHO, POIS A IMPRESSÃO TEM Q PEGAR AS CONFIG DE ESTILO-->
            <link rel="stylesheet" href="../../_materialize/css/materialize.min.css">
            <link rel="stylesheet" href="../../_css/admin.css">
            <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

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
<!--                        <th>ATUALIZAR</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php include_once '../../_relatorios/_admin/read-relatorio-movimentacoes.php' ?>
                </tbody>
            </table>

        </div>
    </div>

<?php include_once("../../_includes/geral/footer.inc.php"); ?>