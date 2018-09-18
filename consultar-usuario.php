<?php include_once 'banco_de_dados/conexao.php'; ?>
<?php include_once ("_includes/header.inc.php"); ?>
<?php include_once ("_includes/menu.inc.php"); ?>


<div class="row container">
    <div class="col s12">
        <h5 class="light">Consultar Usuários</h5>
        <hr>
        <form>
            <div class="col s10 center">
                <select id="select_unidades" name="select_unidades">
                    <option></option>
                    <option value="todas">TODOS USUÁRIOS</option>
                    <?php
                    $querySelect = $link->query("select * from tb_unidades");
                    while ($registros = $querySelect->fetch_assoc()) {
                        $nome = $registros['nome'];
                        $id_unidade_selecionada = $registros['id'];
                        echo "<option value='$id_unidade_selecionada'>$nome</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col s2 center">
                <input type="submit" value="Consultar" class="btn blue waves-light waves-effect">
            </div>
        </form>
        <table class="striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>E-MAIL</th>
                <th>Login</th>
                <th>Telefone</th>
                <th>Permissão</th>
                <th>Situação</th>
                <th>Log</th>
                <th>Editar</th>
                <th>A/I</th>
            </tr>
            </thead>
            <tbody>
            <div id="teste">

            </div>
            <?php include_once 'banco_de_dados/read-usuarios.php' ?>
            </tbody>
        </table>
    </div>
</div>
</div>


<?php include_once ("_includes/footer.inc.php"); ?>

