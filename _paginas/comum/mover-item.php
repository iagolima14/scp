<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Movimentar Item</h5><hr>
        </div>
    </div>

<?php
$id_patrimonio = filter_input(INPUT_GET, 'id_patrimonio', FILTER_SANITIZE_NUMBER_INT);
$id_setor_selecionado = filter_input(INPUT_GET, 'id_setor', FILTER_SANITIZE_SPECIAL_CHARS);

$querySelect = $link->query("select * from tb_patrimonio where id = '$id_patrimonio'");

while ($registros = $querySelect->fetch_assoc()){
    $descricao = $registros['descricao'];
    $num_patrimonio = $registros['num_patrimonio'];
    $sit_fisica = $registros['sit_fisica'];
    $id_item = $registros['id_item'];
}

$querySelect1 = $link->query("select * from tb_itens where id = '$id_item'");
while ($registros1 = $querySelect1->fetch_assoc()){
    $nome_item = $registros1['nome_item'];
}
?>



    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="../../banco_de_dados/comum/update-movimentacao-item.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="120"></legend>

                <fieldset>
                    <legend><h5 class="light center espaco_extra">Informações do item Selecionado</h5></legend>

                    <!--CAMPO NOME-->
                    <div class="input-field col s6">
                        <i class="material-icons prefix">assignment</i>
                        <input type="text" name="nome" id="nome" value="<?php echo $nome_item ?>" maxlength="40"
                               required autofocus readonly>
                        <label for="nome">Nome do Item</label>
                    </div>

                    <!--CAMPO NUMERO DO PATRIMONIO-->
                    <div class="input-field col s3">
                        <i class="material-icons prefix">filter_9_plus</i>
                        <input type="text" name="patri" id="patri" value="<?php echo $num_patrimonio ?>" maxlength="50"
                               required readonly>
                        <label for="patri">Númemro de patrimonio</label>
                    </div>

                    <!--CAMPO SITUAÇÃO FISICA-->
                    <div class="input-field col s3">
                        <i class="material-icons prefix">check</i>
                        <input type="text" name="sit" id="sit" value="<?php echo $sit_fisica ?>" maxlength="20" required
                               readonly>
                        <label for="sit">Situação Física</label>
                    </div>

                    <!--CAMPO DESCRIÇÃO-->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">border_color</i>
                        <input type="text" name="desc" id="desc" value="<?php echo $descricao ?>" maxlength="40"
                               required autofocus readonly>
                        <label for="desc">Descrição do Item</label>
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
                    <input type="submit" value="Alterar" name="salvar" class="btn green">
                    <input type="button" value="Voltar" class="btn blue" onclick="location.href='consultar-item-no-setor.php?id_setor=<?php echo $id_setor_selecionado ?>'">
                </div>

                <input type="hidden" name="id_setor" value="<?php echo $id_setor_selecionado ?>"/>
            </fieldset>
        </form>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>