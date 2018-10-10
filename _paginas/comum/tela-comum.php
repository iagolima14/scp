<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php"); ?>
<?php include_once ("../../_includes/comum/menu_comum.inc.php"); ?>

    <!-- Note that "m8 l9" was added -->
    <div class="">

        <br><br><br><br>
        <div class="row">
            <div class="container teste"
            ">
            <!--INDEX (LINHA 0) COLUNA 0 | ... -->
            <div class="col s3 m3 l3">

            </div>
            <!--INDEX (LINHA 1) COLUNA 1 | CRIAR/EDITAR SETORES-->
            <!-- ******************************************* -->
            <!-- data-tooltip defines the tooltip text -->

            <div class="col s3 m3 l3 toolt">
                <!-- BTN com ação LINK e informativo -->
                <a href="../../_paginas/comum/cadastrar-setor.php" class="btn-large tooltipped no-padding btn_inicial"
                   data-position="top" data-tooltip="Criar Setores">
                    <p class="texto_icone">Criar Setores</p>
                    <i class="material-icons" style="font-size: 50px;">playlist_add</i>
                </a>
            </div>

            <!--INDEX (LINHA 1) COLUNA 2 | MOVIMENTAÇÃO DE ITENS-->
            <div class="col s3 m3 l3">
                <!-- BTN com ação LINK e informativo -->
                <a href="../comum/movimentacao-itens.php" class="btn-large tooltipped no-padding btn_inicial"
                   data-position="top" data-tooltip="Movimentação de Itens">
                    <p class="texto_icone">Movimentação de Itens</p>
                    <i class="material-icons" style="font-size: 40px;">shopping_cart</i>
                </a>
            </div>


            <!--INDEX (LINHA 1) COLUNA 3 | DISTRIBUIÇÃO DE ITENS-->
            <div class="col s3 m3 l3">
                <!-- BTN com ação LINK e informativo -->
                <a href="../comum/distribuição-itens.php?filtro=1" class="btn-large tooltipped no-padding btn_inicial" data-position="top"
                   data-tooltip="Distribuição de Itens Por Setor">
                    <p class="texto_icone">Distribuição de Itens por Setor</p>
                    <i class="material-icons" style="font-size: 50px;">add_shopping_cart</i>
                </a>
            </div>

            <!--INDEX (LINHA 0) COLUNA 0 | CADASTRAR USER-->
            <div class="col s3 m3 l3">

            </div>

            <!--INDEX (LINHA 2) COLUNA 2 | CONSULTAR SETOR-->
            <div class="col s3 m3 l3">
                <br><br><br><br>
                <!-- BTN com ação LINK e informativo -->
                <a href="consultar-setor.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top"
                   data-tooltip="Colsultar/Editar Setor">
                    <p class="texto_icone">Consultar e Editar Setor</p>
                    <i class="material-icons" style="font-size: 50px;">location_city</i>
                </a>
            </div>

            <!--INDEX (LINHA 2) COLUNA 1 | SOLICITAR BAIXA DE MATERIAIS-->
            <div class="col s3 m3 l3">
                <br><br><br><br>
                <!-- BTN com ação LINK e informativo -->
                <a href="baixas-solicitadas.php" class="btn-large tooltipped no-padding btn_inicial"
                   data-position="top" data-tooltip="Solicitar Baixa">
                    <p class="texto_icone">Solicitar Baixa de Materiais</p>
                    <i class="material-icons" style="font-size: 50px;">assignment_turned_in</i>
                </a>
            </div>

            <!--INDEX (LINHA 2) COLUNA 3 | RELATÓRIOS-->
            <div class="col s3 m3 l3">
                <br><br><br><br>
                <!-- BTN com ação LINK e informativo -->
                <a href="relatorios.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top"
                   data-tooltip="Relatórios">
                    <p class="texto_icone">Relatórios</p>
                    <i class="material-icons" style="font-size: 50px;">format_list_bulleted</i>
                </a>
            </div>
        </div>
    </div>

    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>