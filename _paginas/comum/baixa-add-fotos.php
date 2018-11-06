<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once("../../_includes/comum/header_comum.inc.php"); ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php");?>
<?php include_once("../../_includes/comum/menu_comum.inc.php"); ?>

<?php
$selec_itens = filter_input(INPUT_GET, 'selec_itens', FILTER_SANITIZE_SPECIAL_CHARS);
$id_patrimonio = filter_input(INPUT_POST, 'id_patrimonio', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_item = filter_input(INPUT_POST, 'nome_item', FILTER_SANITIZE_SPECIAL_CHARS);
$patrimonio_item = filter_input(INPUT_POST, 'patrimonio_item', FILTER_SANITIZE_SPECIAL_CHARS);
echo "id - $selec_itens<br>";
echo "id patrimonio - $id_patrimonio<br>";
echo "nome item - $nome_item<br>";
echo "N° patrimonio - $patrimonio_item";

//$querySelect = $link->query("select p.id_item, p.descricao, p.sit_fisica, p.id_unidade, p.num_patrimonio, i.nome_item, p.id as id_tab_patrimonio, i.id from tb_patrimonio as p INNER JOIN tb_itens as i ON p.id_item = i.id WHERE p.id_unidade = '$id_unidade_user' order by p.num_patrimonio");
$querySelect = $link->query("select * from tb_patrimonio");
while($row = $querySelect->fetch_assoc()){
    $patrimonio_item = $row['num_patrimonio'];
    $descricao = $row['descricao'];
    $sit_fisica = $row['sit_fisica'];
    //$id_patrimonio = $row['id_tab_patrimonio'];
    //$nome_item = $row['nome_item'];
//    echo "<option value='$id_patrimonio # $nome_item'>$patrimonio_item - $nome_item</option>";
}

?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Solicitar Baixa de Item</h5>
            <hr>


            <!--FORMULÁRIO DE CADASTRO-->
            <form action="../../banco_de_dados/comum/update-baixas-item.php" method="post" class="col s12">
                <fieldset class="formulario" style="padding: 15px">
                    <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="80"></legend>

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
                            <input type="text" name="patri" id="patri" value="<?php echo $patrimonio_item ?>"
                                   maxlength="50"
                                   required readonly>
                            <label for="patri">Número do Patrimônio</label>
                        </div>

                        <!--CAMPO SITUAÇÃO FISICA-->
                        <div class="input-field col s3">
                            <i class="material-icons prefix">check</i>
                            <input type="text" name="sit" id="sit" value="<?php echo $sit_fisica ?>" maxlength="20"
                                   required
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
                        <legend><h5 class="light center red-text espaco_extra">Informações da Baixa</h5></legend>

                        <!--CAMPO DE ARÉA DE TEXTO PARA ENTRADE DE MOTIVO DA SOLICITAÇÃO DE BAIXA-->
                        <div class="input-field col s12">
                            <form class="col s12">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">add</i>
                                    <textarea id="textarea2" class="materialize-textarea"
                                              data-length="300"></textarea>
                                    <label for="textarea2">Digite Aqui as Causas da Solicitação de Baixa</label>
                                </div>
                            </form>
                        </div>


                        <div class="col s12">

                            <!--IMAGEM 1-->
                            <div class="col s4 center-align">
                                <!--CAMPO PARA ADD FOTOS DO ITEM DANIFICADO PARA SOLICITAR BAIXA -->
                                <div class="input-field col s12">
                                    <form action="#">
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>IMG</span>
                                                <input id="imgInput" type="file" multiple>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text"
                                                       placeholder="Selecione o Arquivos">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--EXIBIÇÃO DA IMAGEM A SER CARREGADA FOTO 1-->
                                <div class="col s4 center-align adorno_img">
                                    <img id="view-img" src="" width="250" style="padding: 8px 0px 0px 2px;">
                                </div>
                            </div>

                            <!--IMAGEM 2-->
                            <div class="col s4 center-align">
                                <!--CAMPO PARA ADD FOTOS DO ITEM DANIFICADO PARA SOLICITAR BAIXA -->
                                <div class="input-field col s12">
                                    <form action="#">
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>IMG</span>
                                                <input id="imgInput1" type="file" multiple>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text"
                                                       placeholder="Selecione o Arquivos">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--EXIBIÇÃO DA IMAGEM A SER CARREGADA FOTO 2-->
                                <div class="col s4 center-align adorno_img">
                                    <img id="view-img1" src="" width="250" style="padding: 8px 0px 0px 2px;">
                                </div>
                            </div>

                            <!--IMAGEM 3-->
                            <div class="col s4 center-align">
                                <!--CAMPO PARA ADD FOTOS DO ITEM DANIFICADO PARA SOLICITAR BAIXA -->
                                <div class="input-field col s12">
                                    <form action="#">
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>IMG</span>
                                                <input id="imgInput2" type="file" multiple>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text"
                                                       placeholder="Selecione o Arquivos">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--EXIBIÇÃO DA IMAGEM A SER CARREGADA FOTO 2-->
                                <div class="col s4 center-align adorno_img">
                                    <img id="view-img2" src="" width="250" style="padding: 8px 0px 0px 2px;">
                                </div>
                            </div>


                        </div>


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


                        <!--BOTÕES-->
                        <div class="input-field col s12">
                            <input type="submit" value="Solicitar" name="salvar" class="btn green">
                            <input type="button" value="Voltar" class="btn blue"
                                   onclick="location.href='solicitar-baixas.php'">
                        </div>

                        <input type="hidden" name="id_setor" value="<?php echo $id_setor_selecionado ?>"/>

                    </fieldset>
                </fieldset>
            </form>

        </div>
    </div>

<?php include_once("../../_includes/comum/footer_comum.inc.php"); ?>