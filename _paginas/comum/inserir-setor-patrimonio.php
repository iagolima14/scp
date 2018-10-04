<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

<?php
$id_item = filter_input(INPUT_GET, 'id_item', FILTER_SANITIZE_NUMBER_INT);
$id_patrimonio = filter_input(INPUT_GET, 'id_patrimonio', FILTER_SANITIZE_NUMBER_INT);

$querySelect = $link->query("select * from tb_patrimonio where id = '$id_patrimonio'");
while ($registros = $querySelect->fetch_assoc()){
    $num_patrimonio = $registros['num_patrimonio'];
    $desc_item = $registros['descricao'];
}

$querySelect1 = $link->query("select * from tb_itens where id = '$id_item'");
while ($registros1 = $querySelect1->fetch_assoc()){
    $nome_item = $registros1['nome_item'];
}

?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Vincular Item a um Setor</h5>
            <hr>
            <p> </p>

            <form method="post" action="../../banco_de_dados/comum/update-setor-patrimonio.php" class="col s12">
                <fieldset>
                    <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="120"></legend>


                    <fieldset>
                        <legend><h5 class="light center espaco_extra">Informações do item Selecionado</h5></legend>

                        <!--NÚMERO DO PATRIMONIO DO ITEM-->
                        <div class="input-field col s6">
                            <i class="material-icons prefix">check</i>
                            <input type="number" name="patrimonio" id="patrimonio" value="<?php echo $num_patrimonio ?>"
                                   maxlength="40" required autofocus readonly>
                            <label for="patrimonio">Patrimônio do Item</label>
                        </div>

                        <!--NOME DO ITEM-->
                        <div class="input-field col s6">
                            <i class="material-icons prefix">check</i>
                            <input type="text" name="nome" id="nome" value="<?php echo $nome_item ?>" maxlength="40"
                                   required autofocus readonly>
                            <label for="nome">Nome do Item</label>
                        </div>

                        <!--DESCRIÇÃO DO ITEM-->
                        <div class="input-field col s12">
                            <i class="material-icons prefix">check</i>
                            <input type="text" name="desc-item" id="desc-item" value="<?php echo $desc_item ?>"
                                   maxlength="40" required autofocus readonly>
                            <label for="desc-item">Descrição do Item</label>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend><h5 class="light center red-text espaco_extra">Selecione o setor</h5></legend>

                        <!--SELECT AUTOMATIZADO COM SETORES PARA USUÁRIO SELECIONAR E VINCULAR NA DISTRIB. DO ITEM-->
                        <div class="input-field col s12">
                            <i class="material-icons prefix">add</i>
                            <select name="sel_setor">
                                <?php
                                $querySelect2 = $link->query("select nome, id from tb_setores where id_unidade = '$id_unidade_user'");

                                echo "<option selected> </option>";
                                while ($registros2 = $querySelect2->fetch_assoc()) {
                                    $nome = $registros2['nome'];
                                    $id_setor = $registros2['id'];

                                    echo "<option value='$id_setor'>$nome</option>";
                                }
                                ?>
                            </select>
                            <input type="hidden" name="id_patrimonio" value="<?php echo $id_patrimonio ?>">

                            <label for="sel_setor"></label>
                        </div>
                    </fieldset>


                    <!--BOTÕES-->
                    <div class="input-field col s12">
                        <input type="submit" value="Enviar" class="btn blue">
                        <input type="button" value="Voltar" class="btn red" onclick="location.href='distribuição-itens.php'"/>
                    </div>


                </fieldset>
            </form>

        </div>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>