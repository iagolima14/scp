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
    $ordenar = filter_input(INPUT_GET, 'select_ordenacao', FILTER_SANITIZE_SPECIAL_CHARS);
    $desc = filter_input(INPUT_GET, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
    $cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_SPECIAL_CHARS);
    $cod_siscop = filter_input(INPUT_GET, 'cod_siscop', FILTER_SANITIZE_SPECIAL_CHARS);
    $sit = filter_input(INPUT_GET, 'select_situacao', FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $querySelect = $link->query("select * from tb_itens where id='$id'");
    while ($registros = $querySelect->fetch_assoc()){
        $descricao = $registros['nome_item'];
        $codigo = $registros['codigo'];
        $codigo_siscop = $registros['codigo_siscop'];
        $id_do_grupo = $registros['grupo'];
        $id_do_subgrupo = $registros['subgrupo'];

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
                    <select id="grupo" name="grupo">
                        <option></option>
                        <?php
                            $grupo = $link->query('SELECT * FROM tb_grupo ORDER BY nome_grupo');
                            while($resultados = $grupo->fetch_assoc()){
                                $id_grupo = $resultados['id'];
                                $nome_grupo = $resultados['nome_grupo'];
                                $cod_grupo = $resultados['cod_grupo'];
                                if($id_grupo == $id_do_grupo){
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
                    <select id="subgrupo" name="subgrupo">
                        <option></option>
                        <?php
                        $subgrupo = $link->query('SELECT * FROM tb_subgrupo ORDER BY nome_subgrupo');
                        while($resultados = $subgrupo->fetch_assoc()){
                            $id_subgrupo = $resultados['id'];
                            $nome_subgrupo = $resultados['nome_subgrupo'];
                            $cod_subgrupo = $resultados['cod_subgrupo'];
                            if($id_subgrupo == $id_do_subgrupo){
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

                <!-- passagem de parâmetro para próxima pagina das variáveis do filtro selecionado anteriormente-->
                <input type="hidden" value="<?php echo $ordenar?>" name="select_ordenacao"/>
                <input type="hidden" value="<?php echo $desc?>" name="desc"/>
                <input type="hidden" value="<?php echo $cod?>" name="cod"/>
                <input type="hidden" value="<?php echo $cod_siscop?>" name="cod_siscop"/>
                <input type="hidden" value="<?php echo $sit?>" name="select_situacao"/>


                <!--BOTÕES-->
                <div class="input-field col offset-s4 s8">
                    <input type="submit" value="alterar" class="btn green">
                    <input type="reset" value="limpar" class="btn red">
                    <?php echo "<input type='button' value='voltar' name='VOLTAR' class='btn blue' onclick='voltar_pag_consulta_item(\"$ordenar\", \"$desc\", \"$cod\", \"$sit\", \"$cod_siscop\")'/>"; ?>
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>