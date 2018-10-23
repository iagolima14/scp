<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <!--FORMULÁRIO DE CADASTRO-->
    <div class="row container">
        <p>&nbsp;</p>
        <form action="../../banco_de_dados/admin/create-itens.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="120"></legend>
                <h5 class="light center">Cadastro de Itens</h5>

                <?php
//                if (isset($_SESSION['msg'])){
//                    echo $_SESSION['msg'];
//                    session_unset(); //LIMPA A SESSÃO
//                }
//                ?>

                <!--CAMPO DESCRIÇÃO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">add</i>
                    <input type="text" name="descricao" list="lista_itens" id="descricao" required>
                    <label for="descricao">Nome do Item</label>
                </div>
                <datalist id="lista_itens">
                    <?php
                        $itens = $link->query('SELECT * FROM tb_itens ORDER BY nome_item');
                        while($resultados = $itens->fetch_assoc()){
                            $nome_item = $resultados['nome_item'];
                            echo "<option value='$nome_item'>$nome_item</option>";
                        }
                    ?>
                </datalist>
                <!--CAMPO CÓDIGO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">select_all</i>
                    <input type="text" name="codigo" id="codigo" maxlength="12">
                    <label for="codigo">Código SIAP</label>
                </div>

                <!--CAMPO SELECT GRUPO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">dehaze</i>
                    <select id="grupo" name="grupo" required>
                        <option></option>
                        <?php
                            $grupo = $link->query('SELECT * FROM tb_grupo ORDER BY nome_grupo');
                            while($resultados = $grupo->fetch_assoc()){
                                $id_grupo = $resultados['id'];
                                $nome_grupo = $resultados['nome_grupo'];
                                $cod_grupo = $resultados['cod_grupo'];
                                echo "<option value='$id_grupo # $cod_grupo'>$nome_grupo - $cod_grupo</option>";
                            }
                        ?>
                    </select>
                    <label for="grupo">GRUPO</label>
                </div>

                <!--CAMPO SELECT SUBGRUPO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">short_text</i>
                    <select id="subgrupo" name="subgrupo" required>
                        <option></option>
                        <?php
                        $subgrupo = $link->query("SELECT * FROM tb_subgrupo ORDER BY nome_subgrupo");
                        while($resultados2 = $subgrupo->fetch_assoc()){
                            $id_subgrupo = $resultados2['id'];
                            $nome_subgrupo = $resultados2['nome_subgrupo'];
                            $cod_subgrupo = $resultados2['cod_subgrupo'];
                            echo "<option value='$id_subgrupo # $cod_subgrupo'>$nome_subgrupo - $cod_subgrupo</option>";
                        }
                        ?>
                    </select>
                    <label for="subgrupo">SUBGRUPO</label>
                </div>
                <!--BOTÕES-->
                <div class="input-field col s12">
                    <input type="submit" value="cadastrar" class="btn green">
                    <input type="reset" value="limpar" class="btn red">
                    <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="location.href='tela-admin.php'">
                </div>

            </fieldset>
        </form>
    </div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>