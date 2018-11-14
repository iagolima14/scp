<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <div class="row container">
        <div class="col s10">
            <h5 class="light">Relatório Total de Itens Por Unidade</h5>
            <hr>
        </div>

        <!--BOTÃO VOLTAR-->
        <div class="col s2">
            <input type="button" value="VOLTAR" class="btn blue mover_btn_baixo" onclick="location.href='../../_paginas/admin/relatorios.php'">
            <a href="#" class="btn green"><i class="material-icons" onclick="imprimir('impressao')">print</i></a>
        </div>


        <!--CAMPO PARA SELECIONAR UNIDADE DA BUSCA PARA GERAR O RELATÓRIO-->
        <form>
            <div class="input-field col s10">
                <select id="sel_unidades" name="sel_unidades">
                    <option></option>
                    <?php
                    $vetor_regiao = array("RMSP", "IP", "RMSC", "IC", "CEAPA");
                    $vetor_regiao_extenso = array("CAPITAL E RMS GESTÃO PLENA", "INTERIOR GESTÃO PLENA", "CAPITAL E RMS COGESTÃO", "INTERIOR COGESTÃO", "CEAPA");
                    for ($i = 0; $i < 5; $i++) {
                        echo "<optgroup label='$vetor_regiao_extenso[$i]'>";
                        $querySelect = $link->query("select * from tb_unidades WHERE regiao = '$vetor_regiao[$i]'");
                        while ($registros = $querySelect->fetch_assoc()) {
                            $nome = $registros['nome'];
                            $id_unidade_selecionada = $registros['id'];
                            if ($id_unidade_selecionada == $id_unidade) {
                                echo "<option selected value='$id_unidade_selecionada' style='padding: 0; line-height: 0.1;'>$nome</option>";
                            } else {
                                echo "<option value='$id_unidade_selecionada' style='padding: 0; line-height: 0.1;'>$nome</option>";
                            }

                        }
                        echo "</optgroup>";
                    }
                    ?>
                </select>
                <label for="tel">Selecione a Unidade Desejada</label>
            </div>
            <div class="col s2 center-align">
                <input type="submit" value="BUSCAR" class="btn blue">
            </div>
        </form>

        <!--DIV QUE DELIMITA A IMPRESSÃO COM ID QUE SERÁ USADO NA FUNÇÃO JAVASCRIPT - TB É CHAMADO NO BOTÃO ACIMA-->
        <div id="impressao">
            <!--IMPORTAR AS LNHAS DE CSS DO CABEÇALHO, POIS A IMPRESSÃO TEM Q PEGAR AS CONFIG DE ESTILO-->
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
                </tr>
                </thead>
                <tbody>
                <?php include_once '../../_relatorios/_admin/read-relatorio-por-unidade.php' ?>
                </tbody>
            </table>

        </div>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>