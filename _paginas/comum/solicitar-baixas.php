<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Solicitar Baixa de Item</h5>
            <hr>
            <div class="col s12 centralizar_div">
                <form method="post" action="baixa-add-fotos.php" onsubmit="return checkSubmit()">
                    <div class="input-field col s6 offset-s1">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="nome" id="nome" maxlength="40" required autofocus list="selec_itens"/>
                        <label for="nome">Patrimônio do Item</label>
                    </div>
                    <datalist id="selec_itens" name="selec_itens">
                        <option></option>
                        <?php
                            $querySelect = $link->query("select p.id_item, p.id_unidade, p.num_patrimonio, i.nome_item, p.id as id_tab_patrimonio, i.id from tb_patrimonio as p INNER JOIN tb_itens as i ON p.id_item = i.id WHERE p.id_unidade = '$id_unidade_user' order by p.num_patrimonio");
                            while($row = $querySelect->fetch_assoc()){
                                $nome_item = $row['nome_item'];
                                $patrimonio_item = $row['num_patrimonio'];
                                $id_patrimonio = $row['id_tab_patrimonio'];
                                echo "<option value='$id_patrimonio # $nome_item'>$patrimonio_item - $nome_item</option>";
                            }
                        ?>
                    </datalist>
                    <div class="col s1">
                        <input type="submit" value="buscar" class="btn green alinhar_botao"/>
                    </div>
                    <div class="col s1">
                        <input type="reset" value="limpar" class="btn red alinhar_botao"/>
                    </div>
                    <input type="hidden" name="id_patrimonio" value="<?php echo $id_patrimonio ?>">
                    <input type="hidden" name="nome_item" value="<?php echo $nome_item ?>">
                    <input type="hidden" name="patrimonio_item" value="<?php echo $patrimonio_item ?>">
                </form>
            </div>
        </div>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>