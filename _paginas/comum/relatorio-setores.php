<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>
    <div class="row container">
        <div class="col s12">
            <h5 class="light">Itens do Setor</h5>
            <hr>
            <div id="impressao" style="width: 75%">
                <link rel="stylesheet" href="../../_materialize/css/materialize.min.css">
                <link rel="stylesheet" href="../../_css/comum.css">
                <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
                <table class="striped" >
                    <thead>
                        <tr>
                            <th colspan="3"><p class="center-align">SECRETARIA DE ADMINISTRAÇÃO PENITENCIÁRIA E RESSOCIALIZAÇÃO</p><p class="center-align">COORDENAÇÃO DE MATERIAL E PATRIMÔNIO - COMAP</p></th>
                            <th colspan="1" class="center-align"><img src="../../_imagens/brasao-bahia.jpg" style="width: 50%"></th>
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
                    <tr>
                        <td colspan="4"><p class="center-align font_tabela_cab">Obs.: Cabe aos funcionários deste setor a responsabilidade dos bens móveis citado acima.</p></td>
                    </tr>
            </table>
                <div class="col s4">
                    <p>Data de conferência: _____/______/__________</p>
                </div>
                <div class="col s4">
                    <p style="text-decoration: overline; margin-top: 50px;">Responsável pelo Patrimônio da Unidade</p>
                </div>
                <div class="col s4">
                    <p style="text-decoration: overline; margin-top: 50px;">Responsável pela Conferência/SETOR</p>
                </div>
        </div>
            <!--BOTÕES-->
            <div class="input-field col s12">
                <input type="button" value="Imprimir" class="btn green" onclick="imprimir('impressao')"/>
                <input type="button" value="Voltar" class="btn blue" onclick="location.href='consultar-setor.php'"/>
            </div>
    </div>
    </div>

    <?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>