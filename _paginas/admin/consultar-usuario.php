<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>


<div class="row container">
    <div class="col s12">
        <h5 class="light">Consultar Usuários</h5>
        <hr>
        <form>
            <div class="col s10 center">
                <select id="select_unidades" name="select_unidades">
                    <option class='font_select' ></option>
                    <option class='font_select' value="todas">TODOS USUÁRIOS</option>
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
            </div>
            <div class="col s2 center">
                <input type="submit" value="OK" class="btn blue">
            </div>
        </form>
        <table class="striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>E-MAIL</th>
                <th>Login</th>
                <th>Telefone</th>
                <th>Unidade</th>
                <th>Permissão</th>
            <!--<th>Situação</th>-->
                <th>Editar</th>
                <th>A/I</th>
            </tr>
            </thead>
            <tbody>
            <div id="teste">

            </div>
            <?php include_once '../../banco_de_dados/admin/read-usuarios.php' ?>
            </tbody>
        </table>
    </div>
</div>
</div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>

