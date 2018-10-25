<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <!-- Note that "m8 l9" was added -->
    <div class="row container">
        <div class="col s12">
            <h5 class="light">LANÇAMENTO DE ITENS</h5>
            <hr>
            <div class="col s8 offset-s2">
                <form action="../../banco_de_dados/admin/create-add-itens.php" method="post" class="col s12">
                    <fieldset class="formulario" style="padding: 15px">
                        <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="80"></legend>
                        <h5 class="light center">LANÇAMENTO Nº <?php echo $_SESSION['ultimo_id']?></h5>

                        <!--CAMPO DESCRIÇÃO-->
                        <div class="input-field col s9">
                            <i class="material-icons prefix">add</i>
                            <input type="text" name="descricao" list="lista_itens" id="descricao" required>
                            <label for="descricao">Nome do Item</label>
                        </div>
                        <datalist id="lista_itens">
                            <?php
                            $itens = $link->query('SELECT * FROM tb_itens ORDER BY nome_item');
                            while($resultados = $itens->fetch_assoc()){
                                $id_item = $resultados['id'];
                                $nome_item = $resultados['nome_item'];
                                echo "<option value='$id_item # $nome_item'>$nome_item</option>";
                            }
                            ?>
                        </datalist>
                        <!--CAMPO QUANTIDADE-->
                        <div class="input-field col s3">
                            <i class="material-icons prefix">select_all</i>
                            <input type="text" name="quantidade" id="quantidade">
                            <label for="quantidade">Quantidade</label>
                        </div>

                        <!--CAMPO VALOR-->
                        <div class="input-field col s6">
                            <i class="material-icons prefix">select_all</i>
                            <input type="text" name="valor" id="valor" maxlength="12">
                            <label for="valor">Valor</label>
                        </div>


                        <!--BOTÕES-->
                        <div class="input-field col s7 offset-s5">
                            <input type="submit" value="inserir" class="btn green">
                            <input type="button" value="verificar" name="VERIFICAR" class="btn grey" onclick="location.href='verifica-itens-lancados.php'">
                            <input type="reset" value="limpar" class="btn red" onclick="">
                            <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="decisao_voltar()">

                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>