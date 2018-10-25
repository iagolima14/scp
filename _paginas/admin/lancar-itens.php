<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

<!-- Note that "m8 l9" was added -->
<div class="row container">
    <div class="col s12">
        <h5 class="light">Novos Lançamentos</h5>
        <hr>
        <br>
        <div class="col s8 offset-s2">
            <form action="../../banco_de_dados/admin/create-lancamentos.php" method="post" class="col s12" onsubmit="checkSubmit()">
                <fieldset class="formulario" style="padding: 15px">
                    <legend><img src="../../_imagens/item1.png" alt="[imagem]" width="80"></legend>
                    <h5 class="light center">Informe os dados da Nota Fiscal</h5>
                    <br>
                    <!--CAMPO Nº DA NOTA-->
                    <div class="input-field col s6">
                        <i class="material-icons prefix">select_all</i>
                        <input type="text" name="num_doc" id="num_doc" maxlength="12">
                        <label for="num_doc">Número do Documento</label>
                    </div>


                    <!--CAMPO DATA-->
                    <div class="input-field col s6">
                        <i class="material-icons prefix">select_all</i>
                        <input type="date" name="data_aquisicao" id="data_aquisicao">
                        <label for="data_aquisicao" style="margin-top: -20px;">Data Aquisição</label>
                    </div>


                    <!--CAMPO SELECT GRUPO-->
                    <div class="input-field col s12">
                        <i class="material-icons prefix">dehaze</i>
                        <select id="origem" name="origem" required>
                            <option></option>
                            <?php
                            $grupo = $link->query('SELECT * FROM tb_tipo_origens ORDER BY nome_origem');
                            while($resultados = $grupo->fetch_assoc()){
                                $id_origem = $resultados['id'];
                                $nome_origem = $resultados['nome_origem'];
                                echo "<option value='$id_origem'>$nome_origem</option>";
                            }
                            ?>
                        </select>
                        <label for="origem">Origem</label>
                    </div>
                    <!--BOTÕES-->
                    <div class="input-field col s6 offset-s3">
                        <input type="submit" value="cadastrar" class="btn green">
                        <input type="reset" value="limpar" class="btn red">
                        <input type="button" value="voltar" name="VOLTAR" class="btn blue" onclick="location.href='tela-admin.php'">
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>