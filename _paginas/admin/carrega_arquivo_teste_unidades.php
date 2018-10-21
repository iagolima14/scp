<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <div class="row">
        <div class="container">
            <div class="col s12 m12 l12 center">
                <h3>TESTE DOS ITENS DA UNIDADE</h3>
                <br>
                <br>
                <br>
                <br>
                <h5 style="text-align: left">Selecione a Unidade:</h5>
                <form method="post" action="arquivo_unidades.php" enctype="multipart/form-data" onsubmit="return checkSubmit()">
                    <select id="select_unidades" name="id_unidade" required>
                        <option></option>
                        <?php
                        $vetor_regiao = array("RMSP", "IP", "RMSC", "IC", "CEAPA");
                        $vetor_regiao_extenso = array("CAPITAL E RMS GESTÃO PLENA", "INTERIOR GESTÃO PLENA", "CAPITAL E RMS COGESTÃO", "INTERIOR COGESTÃO", "CEAPA");
                        for($i=0; $i<5; $i++){
                            echo "<optgroup label='$vetor_regiao_extenso[$i]'>";
                            $querySelect = $link->query("select * from tb_unidades WHERE regiao = '$vetor_regiao[$i]'");
                            while ($registros = $querySelect->fetch_assoc()) {
                                $nome = $registros['nome'];
                                $id_unidade_selecionada = $registros['id'];
                                echo "<option value='$id_unidade_selecionada' style='padding: 0; line-height: 0.1;'>$nome</option>";
                            }
                            echo "</optgroup>";
                        }
                        ?>
                    </select>
                    <br>
                    <input type="file" name="arquivo" class="input-field add_arquivo" required>
                    <input type="hidden" name="origem" value="1"/>
                    <div class="input-field">
                        <br>
                        <br>
                        <br>
                        <br>
                        <input type="submit" value="enviar" name="Enviar" class="btn green"">
                        <input type="reset" value="limpar" name="limpar" class="btn red"">
                        <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="location.href='tela-admin.php'">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once ("../../_includes/comum/footer_comum.inc.php"); ?>