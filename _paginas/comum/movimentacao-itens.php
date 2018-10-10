<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <div class="row container scrolling">
        <div class="col s12">
            <h5 class="light">Movimentação de Itens</h5>
            <hr>

            <!--DADOS DE (MOVIMENTAÇÃO DO ITEM)-->
            <form>
                <div class="col s10 center">
                    <select id="select_unidades" name="select_unidades">
                        <option></option>
                        <option value="todas">TODOS AS UNIDADES</option>
                        <?php
                        $querySelect = $link->query("select * from tb_unidades");
                        while ($registros = $querySelect->fetch_assoc()) {
                            $nome = $registros['nome'];
                            $id_unidade_selecionada = $registros['id'];
                            echo "<option value='$id_unidade_selecionada'>$nome</option>";
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
                    <th>Nome do Setor</th>
                    <th>Quantidade de Itens</th>
                    <th>Responsável</th>
                    <th>Telefone</th>
                    <th>Editar</th>
                    <th>A/I</th>
                </tr>
                </thead>
                <tbody>
                <div id="teste">

                </div>
                <?php include_once '../../banco_de_dados/admin/read-setores.php' ?>
                </tbody>
            </table>
        </div>

        </div>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>