<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Alterar Diretor</h5><hr>
        </div>
    </div>

<?php
    $opc_anterior = filter_input(INPUT_GET, 'opc_anterior', FILTER_SANITIZE_SPECIAL_CHARS);
    $nomeDiretor = filter_input(INPUT_GET, 'nome_diretor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if($nomeDiretor == "Sem registro!"){
        $nomeDiretor = "Sem diretor cadastrado!";
    }
    $idDiretor = filter_input(INPUT_GET, 'id_user_diretor', FILTER_SANITIZE_NUMBER_INT);
    if($idDiretor == ""){
        $login = "Sem diretor cadastrado!";
    }
    else{
        $querySelect = $link->query("select * from tb_usuarios where id = '$idDiretor'");
        while ($registros = $querySelect->fetch_assoc()) {
            $id = $registros['id'];
            $nome = $registros['nome'];
            $login = $registros['login'];
            $matricula = $registros['matricula'];
            $telefone = $registros['telefone'];
            $email = $registros['email'];
            $id_unidade = $registros['id_unidade'];
            $permissao = $registros['permissao'];
            if ($permissao == 1) {
                $perm = "Administrador";
            } else {
                $perm = "Comum";
            }
        }
    }

    $id_unidade_selecionada = filter_input(INPUT_GET, 'id_unidade_selecionada', FILTER_SANITIZE_NUMBER_INT);



?>

    <!--FORMULÁRIO DE ALTERAÇÃO DO DIRETOR-->
    <div class="row container">
        <form action="../../banco_de_dados/admin/update-diretor.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="../../_imagens/avatar1.png" alt="[imagem]" width="100"></legend>
                <h5 class="light center">Alteração</h5>

                <!--CAMPO NOME DO DIRETOR ATUAL-->
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" readonly value="<?php echo $nomeDiretor?>" maxlength="40" required autofocus aria-readonly="true">
                    <label for="nome">Nome do Diretor Atual</label>
                </div>

                <!--CAMPO LOGIN DO DIRETOR ATUAL-->
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" readonly value="<?php echo $login ?>" maxlength="40" required autofocus aria-readonly="true">
                    <label for="nome">Login do Diretor Atual</label>
                </div>

                <!--CAMPO UNIDADE DO USUÁRIO-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">sync</i>
                    <select class="aa" id="sel_diretor" name="sel_diretor">
                        <option></option>
                        <?php
                        $querySelect = $link->query("select * from tb_usuarios where id_unidade = '$id_unidade_selecionada'");
                        while ($registros = $querySelect->fetch_assoc()) {
                            $id2 = $registros['id'];
                            $nome = $registros['nome'];
                            echo "<option value='$id2'>$nome - $id2</option>";
                        }
                        ?>
                    </select>
                    <label for="tel">Novo Diretor</label>
                </div>
                <input type="hidden" name="id_unidade_selecionada" value="<?php echo $id_unidade_selecionada ?>"/>
                <input type="hidden" name="opcao_anterior" value="<?php echo $opc_anterior ?>"/>
                <!--BOTÕES-->
                <div class="input-field col s12">
                    <input type="submit" value="alterar" class="btn green">
                    <input type="button" value="Voltar" class="btn blue" onclick="location.href='consultar-unidade.php?select_unidades=<?php echo $opc_anterior?>'">
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>