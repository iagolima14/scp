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
    $querySelect = $link->query("select * from tb_itens where id='$id'");
    while ($registros = $querySelect->fetch_assoc()){
        $descricao = $registros['nome_item'];
        $codigo = $registros['codigo'];
        $codigo_siscop = $registros['codigo_siscop'];
        $grupo = $registros['grupo'];
        $subgrupo = $registros['subgrupo'];

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
                    <input type="text" name="descricao" id="descricao" value="<?php echo $descricao ?>" maxlength="100" required autofocus>
                    <label for="descricao">NOME DO ITEM</label>
                </div>

                <!--CAMPO CÓDIGO SIAP DO ITEM-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">select_all</i>
                    <input type="number" name="codigo" id="codigo" value="<?php echo $codigo ?>" maxlength="12" required>
                    <label for="codigo">CÓDIGO SIAP</label>
                </div>

                <!--CAMPO CÓDIGO SISCOP DO ITEM-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">select_all</i>
                    <input type="text" name="codigo_siscop" id="codigo_siscop" value="<?php echo $codigo_siscop ?>" maxlength="9" readonly>
                    <label for="codigo_siscop">CÓDIGO SISCOP</label>
                </div>

                <!--CAMPO GRUPO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">add_shopping_cart</i>
                    <select id="grupo" name="grupo" required>
                        <?php
                            $grupo = $link->query('SELECT * FROM tb_grupo ORDER BY nome_grupo');
                            while($resultados = $grupo->fetch_assoc()){
                                $id_grupo = $resultados['id'];
                                $nome_grupo = $resultados['nome_grupo'];
                                $cod_grupo = $resultados['cod_grupo'];
                                if($id_grupo == $grupo){
                                    echo "<option value='$id_grupo # $cod_grupo' selected>$nome_grupo - $cod_grupo</option>";
                                }
                                else{
                                    echo "<option value='$id_grupo # $cod_grupo'>$nome_grupo - $cod_grupo</option>";
                                }

                            }
                        ?>
                    </select>
                    <label for="quantidade">GRUPO</label>
                </div>

                <!--CAMPO SUBGRUPO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">date_range</i>
                    <select id="subgrupo" name="subgrupo" required>
                        <?php
                        $subgrupo = $link->query('SELECT * FROM tb_subgrupo ORDER BY nome_subgrupo');
                        while($resultados = $subgrupo->fetch_assoc()){
                            $id_subgrupo = $resultados['id'];
                            $nome_subgrupo = $resultados['nome_subgrupo'];
                            $cod_subgrupo = $resultados['cod_subgrupo'];
                            if($id_subgrupo == $subgrupo){
                                echo "<option value='$id_subgrupo # $cod_subgrupo' selected>$nome_subgrupo - $cod_subgrupo</option>";
                            }
                            else{
                                echo "<option value='$id_subgrupo # $cod_subgrupo'>$nome_subgrupo - $cod_subgrupo</option>";
                            }
                        }
                        ?>
                    </select>
                    <label for="data">SUBGRUPO</label>
                </div>
                <input type="hidden" value="<?php echo $id?>" name="id_item_selecionado"/>
                <!--BOTÕES-->
                <div class="input-field col offset-s4 s8">
                    <input type="submit" value="alterar" class="btn green">
                    <input type="reset" value="limpar" class="btn red">
                    <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="location.href='consultar-item.php'">
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>