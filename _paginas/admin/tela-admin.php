<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

        <!-- Note that "m8 l9" was added -->
        <div class="" >

            <br><br><br><br>
            <div class="row">
                <div class="container teste" ">
                    <!--INDEX (LINHA 0) COLUNA 0 | ... -->
                    <div class="col s3 m3 l3">

                    </div>
                    <!--INDEX (LINHA 1) COLUNA 1 | BAIXAS SOLICITADAS-->
                    <!-- ******************************************* -->
                    <!-- data-tooltip defines the tooltip text -->

                    <div class="col s3 m3 l3 toolt">
                        <!-- BTN com ação LINK e informativo -->
                        <a href="../../baixas-solicitadas.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Baixas Solicitadas">
                            <p class="texto_icone">Baixas Solicitadas</p>
                            <i class="material-icons" style="font-size: 50px;">playlist_add</i>
                        </a>
                    </div>

                    <!--INDEX (LINHA 1) COLUNA 2 | DISTRIBUIÇÃO DE ITENS-->
                    <div class="col s3 m3 l3">
                        <!-- BTN com ação LINK e informativo -->
                        <a href="../../distribuição-itens.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Distribuição de Itens">
                            <p class="texto_icone">Distribuição de Itens</p>
                            <i class="material-icons" style="font-size: 40px;">shopping_cart</i>
                        </a>
                    </div>
                    <!--INDEX (LINHA 1) COLUNA 3 | RELATÓRIOS-->
                    <div class="col s3 m3 l3">
                        <!-- BTN com ação LINK e informativo -->
                        <a href="relatorios.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Relatórios">
                            <p class="texto_icone">Relatórios</p>
                            <i class="material-icons" style="font-size: 50px;">format_list_bulleted</i>
                        </a>
                    </div>

                    <!--INDEX (LINHA 0) COLUNA 0 | CADASTRAR USER-->
                    <div class="col s3 m3 l3">

                    </div>
                    <!--INDEX (LINHA 2) COLUNA 1 | CONSULTAR USER-->
                    <div class="col s3 m3 l3">
                        <br><br><br><br>
                        <!-- BTN com ação LINK e informativo -->
                        <a href="carrega_arquivo_unidades.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Carregar Arquivo Unidades">
                            <p class="texto_icone">Carregar Arquivo Unidades</p>
                            <i class="material-icons" style="font-size: 50px;">account_box</i>
                        </a>
                    </div>
                    <!--INDEX (LINHA 2) COLUNA 2 | CONSULTAR UNIDADE-->
                    <div class="col s3 m3 l3">
                        <br><br><br><br>
                        <!-- BTN com ação LINK e informativo -->
                        <a href="carrega_arquivo.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Carregar Arquivo">
                            <p class="texto_icone">Carregar Arquivo</p>
                            <i class="material-icons" style="font-size: 50px;">location_city</i>
                        </a>
                    </div>
                    <!--INDEX (LINHA 2) COLUNA 3 | CONSULTAR ITEM-->
                    <div class="col s3 m3 l3">
                        <br><br><br><br>
                        <!-- BTN com ação LINK e informativo -->
                        <a href="consultar-item.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Consultar Item">
                            <p class="texto_icone">Consultar Item</p>
                            <i class="material-icons" style="font-size: 50px;">add_shopping_cart</i>
                        </a>
                    </div>
                </div>
            </div>

        </div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>