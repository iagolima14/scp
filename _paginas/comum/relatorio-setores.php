<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>
<?php $nome_setor = filter_input(INPUT_GET, 'nome_setor', FILTER_SANITIZE_SPECIAL_CHARS);?>
    <div class="row container">
        <div class="col s12">
            <h5 class="light">Itens do Setor</h5>
            <hr>
            <div id="impressao" style="width: 80%">
                <link rel="stylesheet" href="../../_materialize/css/materialize.min.css">
                <link rel="stylesheet" href="../../_css/comum.css">
                <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
                <table class="striped" >
                    <thead>
                        <tr>
                            <th colspan="1" class="center-align"><img src="../../_imagens/brasao-bahia.jpg" style="width: 85%"></th>
                            <th colspan="3"><br><p class="center-align tam_fonte">SECRETARIA DE ADMINISTRAÇÃO PENITENCIÁRIA E RESSOCIALIZAÇÃO</p>
                                            <p class="center-align tam_fonte">DIRETORIA GERAL - DG   /   DIRETORIA ADMINISTRATIVA - DA</p>
                                            <p class="center-align tam_fonte">COMAP</p></th>

                        </tr>
                        <tr>
                            <th colspan="4" class="center-align"><u><?php echo $nome_setor?></u></th>
                        </tr>
                        <tr class="font_tabela_cab">
                            <th style="width: 10%">ITEM</th>
                            <th style="width: 30%">NOME</th>
                            <th style="width: 20%">Nº DE PATRIMÔNIO</th>
                            <th style="width: 15%">SIT. FÍSICA</th>
                        </tr>

                </thead>
                <tbody>
                <?php include_once '../../banco_de_dados/comum/read-itens-setores.php' ?>
                </tbody>

                <tfoot>
                    <tr><th colspan="4"><br></th></tr>
                    <tr>
                        <th colspan="2" style="padding: 5px;">
                            <p class="font_tabela_cab2">Data de conferência: _____/______/__________</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2" style="padding: 5px;">
                            <p class="font_tabela_cab2" style="text-decoration: overline; margin-top: 50px;">Responsável pelo Patrimônio da Unidade</p>
                        </th>
                        <th colspan="2" style="padding: 5px;">
                            <p class="font_tabela_cab2" style="text-decoration: overline; margin-top: 50px;">Responsável pela Conferência/SETOR</p>
                        </th>
                    </tr>
                    <tr><th colspan="4"><br></th></tr>
                    <tr>
                        <th colspan="4" style="padding: 5px;">
                            <p class="center-align font_tabela_cab2" style="margin: 3px;">Obs.: Cabe aos funcionários deste setor a responsabilidade dos bens móveis citado acima.</p>
                            <p class="center-align font_tabela_cab2" style="margin: 3px;">SISCOP - Sistema de Controle de Patrimônio SEAP/BA</p>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
            <!--BOTÕES-->
            <div class="input-field col s12">
                <input type="button" value="Imprimir" class="btn green" onclick="imprimir('impressao')"/>
                <input type="button" value="Voltar" class="btn blue" onclick="location.href='consultar-setor.php'"/>
            </div>
    </div>
    </div>

    <?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>