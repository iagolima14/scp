<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Relatórios</h5>
            <hr>
        </div>
        <div id="linha" class="col s9 offset-s3 espaco_linha">

            <!--INDEX (LINHA 1) COLUNA 1 | CADASTRAR NOVO ITEM-->
            <div class="col s3 toolt">
                <!-- BTN com ação LINK e informativo -->
                <a href="../../_relatorios/_admin/relatorio-estoque-total.php" class="btn-large tooltipped no-padding btn_inicial_relatorios" data-position="top"
                   data-tooltip="Estoque Total de Itens">
                    <p class="texto_icone1">Relatório</p>
                    <i class="material-icons" style="font-size: 50px;">print</i>
                    <p class="texto_icone">Estoque Total de Itens</p>
                </a>
            </div>

            <!--INDEX (LINHA 1) COLUNA 2 | LANÇAMENTO DE ITENS-->
            <div class="col s3 toolt">
                <!-- BTN com ação LINK e informativo -->
                <a href="lancar-itens.php" class="btn-large tooltipped no-padding btn_inicial_relatorios" data-position="top" data-tooltip="Por Unidade">
                    <p class="texto_icone1">Relatório</p>
                    <i class="material-icons" style="font-size: 50px;">print</i>
                    <p class="texto_icone">Por Unidade</p>
                </a>
            </div>

            <!--INDEX (LINHA 1) COLUNA 3 | CONSULTAR ITENS -->
            <div class="col s3 toolt">
                <!-- BTN com ação LINK e informativo -->
                <a href="consultar-item.php" class="btn-large tooltipped no-padding btn_inicial_relatorios" data-position="top" data-tooltip="Outros Relatórios">
                    <p class="texto_icone1">Relatório</p>
                    <i class="material-icons" style="font-size: 50px;">print</i>
                    <p class="texto_icone">Outros Relatórios</p>
                </a>
            </div>
        </div>


        </div>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>