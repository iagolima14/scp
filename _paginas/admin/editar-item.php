<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Edição de Registros</h5><hr>
        </div>
    </div>

<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$_SESSION['id'] = $id;
$querySelect = $link->query("select * from tb_itens where id='$id'");

while ($registros = $querySelect->fetch_assoc()){
    $descricao = $registros['nome_item'];
    $codigo = $registros['codigo'];
    $quantidade = $registros['quantidade'];
    $data = $registros['data'];
    $valor = $registros['valor'];

}
?>

    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="../../banco_de_dados/admin/update-itens.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="120"></legend>
                <h5 class="light center">Alteração</h5>

                <!--CAMPO DESCRIÇÃO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">add</i>
                    <input type="text" name="descricao" id="descricao" value="<?php echo $descricao ?>" maxlength="40" required autofocus>
                    <label for="descricao">Descrição do Item</label>
                </div>

                <!--CAMPO CÓDIGO DO ITEM-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">select_all</i>
                    <input type="number" name="codigo" id="codigo" value="<?php echo $codigo ?>" maxlength="50" required>
                    <label for="codigo">Código do Item</label>
                </div>

                <!--CAMPO QUANTIDADE-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">add_shopping_cart</i>
                    <input type="number" name="quantidade" id="quantidade" value="<?php echo $quantidade ?>" maxlength="15" required>
                    <label for="quantidade">Quantidade</label>
                </div>

                <!--CAMPO DATA DE AQUISIÇÃO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">date_range</i>
                    <input type="date" name="data" id="data" value="<?php echo $data ?>" maxlength="15" required>
                    <label for="data">Data da Aquisição</label>
                </div>

                <!--CAMPO VALOR-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">monetization_on</i>
                    <input type="text" name="valor" id="valor" value="<?php echo $valor ?>" maxlength="12" required>
                    <label for="valor">Valor</label>
                </div>

                <!--BOTÕES-->
                <div class="input-field col s12">
                    <input type="submit" value="alterar" class="btn blue">
                    <a href="consultar-item.php" class="btn red">Cancelar</a>
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>