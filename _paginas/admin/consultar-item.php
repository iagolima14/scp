<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>


<div class="row container">
    <div class="col s12">
        <div class="col s10">
            <h5 class="light">Consultar Itens</h5>
            <hr>
        </div>
        <div class="col s2">
            <input type="button" value="VOLTAR" class="btn blue mover_btn_baixo" onclick="location.href='tela-admin.php'">
        </div>

        <form>
            <div class="col s3">
                <p>&nbsp;</p>
                <input type="text" placeholder="Nome do Item" name="desc">

            </div>
            <div class="col s2">
                <p>&nbsp;</p>
                <input type="text" placeholder="Código SIAP" name="cod">

            </div>
            <div class="col s2">
                <p>&nbsp;</p>
                <input type="text" placeholder="Código SISCOP" name="cod_siscop">

            </div>
            <div class="col s2">
                <p>Ordenar Por:</p>
                <select id="select_ordenacao" name="select_ordenacao">
                    <option value="nome_item">NOME DO ITEM</option>
                    <option value="codigo">CÓDIGO SIAP</option>
                    <option value="codigo_siscop">CÓDIGO SISCOP</option>
                    <option value="situacao">SITUAÇÃO</option>

                </select>
            </div>
            <div class="col s2">
                <p>Situação:</p>
                <select id="select_situacao" name="select_situacao">
                    <option></option>
                    <option value="A">ATIVO</option>
                    <option value="I">INATIVO</option>

                </select>
            </div>
            <div class="col s1 center">
                <p>&nbsp;</p>
                <input type="submit" value="OK" class="btn gree">
            </div>
        </form>

        <table class="striped">
            <thead>
            <tr class="altera_fonte_cab">
                <th style="text-transform: uppercase; width: 5%">ITEM</th>
                <th style="text-transform: uppercase; width: 28%">NOME DO ITEM</th>
                <th style="text-transform: uppercase; width: 13%">CÓDIGO SIAP</th>
                <th style="text-transform: uppercase; width: 13%">CÓDIGO SISCOP</th>
                <th style="text-transform: uppercase; width: 13%">QUANTIDADE</th>
                <th style="text-transform: uppercase; width: 13%">DISPONIVEL</th>
                <th style="text-transform: uppercase; width: 6%">Editar</th>
                <th style="text-transform: uppercase; width: 5%">A/I</th>
            </tr>
            </thead>
            <tbody>
            <?php include_once '../../banco_de_dados/admin/read-setores.php' ?>
            </tbody>
        </table>
    </div>
</div>


<?php include_once ("../../_includes/geral/footer.inc.php"); ?>

