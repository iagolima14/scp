<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

<div class="row">
    <div class="container">
        <div class="col s12 m12 l12 center">
            <h1>ARQUIVOS UNIDADES</h1>
            <br>
            <br>
            <br>
            <br>
            <br>
            <form method="POST" action="arquivo_unidades.php" enctype="multipart/form-data">
                <select id="select_unidades" name="id_unidade">
                    <option></option>
                    <optgroup label="Salvador e RM - PLENA">
                        <?php
                            $querySelect = $link->query("select * from tb_unidades where regiao = 'RMSP'");
                            while ($registros = $querySelect->fetch_assoc()) {
                                $id = $registros['id'];
                                $nome = $registros['nome'];
                                echo "<option value = '$id'>$nome</option>";
                            }
                        ?>
                    </optgroup>
                    <optgroup label="Interior - PLENA">
                        <?php
                        $querySelect = $link->query("select * from tb_unidades where regiao = 'IP'");
                        while ($registros = $querySelect->fetch_assoc()) {
                            $id = $registros['id'];
                            $nome = $registros['nome'];
                            echo "<option value = '$id'>$nome</option>";
                            }
                        ?>
                    </optgroup>
                    <optgroup label="Salvador e RM - Cogestão">
                        <?php
                        $querySelect = $link->query("select * from tb_unidades where regiao = 'RMSC'");
                        while ($registros = $querySelect->fetch_assoc()) {
                            $id = $registros['id'];
                            $nome = $registros['nome'];
                            echo "<option value = '$id'>$nome</option>";
                        }
                        ?>
                    </optgroup>
                    <optgroup label="Interior - Cogestão">
                        <?php
                        $querySelect = $link->query("select * from tb_unidades where regiao = 'IC'");
                        while ($registros = $querySelect->fetch_assoc()){
                            $id = $registros['id'];
                            $nome = $registros['nome'];
                            echo "<option value = '$id'>$nome</option>";
                        }
                        ?>
                    </optgroup>
                    <optgroup label="CEAPA">
                        <?php
                        $querySelect = $link->query("select * from tb_unidades where regiao = 'CEAPA'");
                        while ($registros = $querySelect->fetch_assoc()){
                            $id = $registros['id'];
                            $nome = $registros['nome'];
                            echo "<option value = '$id'>$nome</option>";
                        }
                        ?>
                    </optgroup>
                </select>
                <input type="file" name="arquivo" class="">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>