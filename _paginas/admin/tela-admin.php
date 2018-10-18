<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

        <!-- Note that "m8 l9" was added -->
            <br><br><br><br>
            <div class="row">
                <div class="container teste">
                    <div id="linha" class="col s9 offset-s3 espaco_linha">

                        <!--INDEX (LINHA 1) COLUNA 1 | CADASTRAR NOVO ITEM-->
                        <div class="col s4 toolt">
                            <!-- BTN com ação LINK e informativo -->
                            <a href="cadastrar-item.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Cadastrar Novo Item">
                                <p class="texto_icone">Cadastrar Novo Item</p>
                                <i class="material-icons" style="font-size: 50px;">playlist_add</i>
                            </a>
                        </div>

                        <!--INDEX (LINHA 1) COLUNA 2 | DISTRIBUIÇÃO DE ITENS-->
                        <div class="col s4 toolt">
                            <!-- BTN com ação LINK e informativo -->
                            <a href="distribuicao-itens.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Distribuição de Itens Por Unidades">
                                <p class="texto_icone">Distribuição de Itens - Unidade</p>
                                <i class="material-icons" style="font-size: 40px;">shopping_cart</i>
                            </a>
                        </div>
                        <!--INDEX (LINHA 1) COLUNA 3 | CONSULTAR ITENS -->
                        <div class="col s4 toolt">
                            <!-- BTN com ação LINK e informativo -->
                            <a href="consultar-item.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Consultar Itens">
                                <p class="texto_icone">Consultar Itens</p>
                                <i class="material-icons" style="font-size: 50px;">add_shopping_cart</i>
                            </a>
                        </div>
                    </div>

                    <div id="linha" class="col s9 offset-s3 espaco_linha">
                        <!--INDEX (LINHA 2) COLUNA 1 | RELATÓRIOS-->
                        <div class="col s4 toolt">
                            <!-- BTN com ação LINK e informativo -->
                            <a href="relatorios.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Relatórios">
                                <p class="texto_icone">Relatórios</p>
                                <i class="material-icons" style="font-size: 50px;">format_list_bulleted</i>
                            </a>
                        </div>
                        <!--INDEX (LINHA 2) COLUNA 2 | BAIXAS SOLICITADAS-->
                        <div class="col s4 toolt">
                            <!-- BTN com ação LINK e informativo -->
                            <a href="../../_paginas/admin/baixas-solicitadas.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Baixas Solicitadas">
                                <p class="texto_icone">Baixas Solicitadas</p>
                                <i class="material-icons" style="font-size: 50px;">playlist_add</i>
                            </a>
                        </div>
                        <!--INDEX (LINHA 2) COLUNA 3 | CARREGAR ARQUIVOS UNIDADES-->

                        <div class="col s4 toolt">
                            <!-- BTN com ação LINK e informativo -->
                            <a href="carrega_arquivo_unidades.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Carregar Arquivo Unidades">
                                <p class="texto_icone">Carregar Arquivo Unidades</p>
                                <i class="material-icons" style="font-size: 50px;">account_box</i>
                            </a>
                        </div>
                    </div>
                    <div id="linha" class="col s9 offset-s3 espaco_linha">
                        <div class="col s4 toolt">
                            <?php
                                $notificacoes = $link->query("Select * from tb_movimentacoes WHERE analisado is NULL");
                                $num_linhas = $notificacoes->num_rows;
                                if($num_linhas>0){
                                    echo "<a href=\"listar-movimentacoes.php\" class=\"alerta_popup btn-floating pulse btn-large waves-effect waves-light red\"> <b>$num_linhas</b> <i class=\"material-icons\"></i></a>";
                                }
                            ?>
                            <!-- BTN com ação LINK e informativo -->
                                <a href="listar-movimentacoes.php" class="btn-large tooltipped no-padding btn_inicial" data-position="top" data-tooltip="Movimentações nas Unidades">
                                <p class="texto_icone">Movimentações nas Unidades</p>
                                <i class="material-icons" style="font-size: 50px;">repeat</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>