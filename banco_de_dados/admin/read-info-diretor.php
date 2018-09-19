<?php
$id_diretor = filter_input(INPUT_GET, 'id_user_diretor', FILTER_SANITIZE_NUMBER_INT);
$nome_unidade = filter_input(INPUT_GET, 'nome_unidade', FILTER_SANITIZE_SPECIAL_CHARS);


$querySelect = $link->query("select * from tb_usuarios where id = '$id_diretor'");

while ($registros = $querySelect->fetch_assoc()) {
    $id = $registros['id'];
    $nome = $registros['nome'];
    $matricula = $registros['matricula'];
    $telefone = $registros['telefone'];
    $email = $registros['email'];
    $id_unidade = $registros['id_unidade'];
    $permissao = $registros['permissao'];
    if ($permissao == 1){
        $perm = "Administrador";
    }else{
        $perm = "Comum";
    }

    /*$querySelect2 = $link->query("select * from tb_unidades where id='$id_unidade'");
    while ($registros2 = $querySelect2->fetch_assoc()){
        $nome_unidade = $registros2['nome'];
    }*/
}

?>

<div class="col s12 center-align" id="info_diretor">
    <?php
        echo "<p><i class=\"material-icons\">account_circle</i>&nbsp;Nome -- $nome </p><br>";
        echo "<p><i class=\"material-icons\">filter_1</i>&nbsp;Matrícula -- $matricula </p><br>";
        echo "<p><i class=\"material-icons\">call</i>&nbsp;Telefone -- $telefone </p><br>";
        echo "<p><i class=\"material-icons\">mail</i>&nbsp;E-mail -- $email </p><br>";
        echo "<p><i class=\"material-icons\">lock</i>&nbsp;Permissão -- $perm </p><br>";
        echo "<p><i class=\"material-icons\">location_city</i>&nbsp;Nome de sua Unidade -- $nome_unidade </p><br>";
    ?>
</div>