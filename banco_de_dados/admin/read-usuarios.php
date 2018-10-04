<?php
$id_unidade = filter_input(INPUT_GET, 'select_unidades', FILTER_SANITIZE_SPECIAL_CHARS);
if ($id_unidade == "todas") {
    $querySelect = $link->query("select * from tb_usuarios");
} else {
    $querySelect = $link->query("select * from tb_usuarios where id_unidade = '$id_unidade'");
}

while ($registros = $querySelect->fetch_assoc()){
    $id = $registros['id'];
    $nome = $registros['nome'];
    $matricula = $registros['matricula'];
    $email = $registros['email'];
    $login = $registros['login'];
    $telefone = $registros['telefone'];
    $permissao = $registros['permissao'];
    $situacao = $registros['situacao'];
    $log = $registros['log'];
    $id_unidade_user = $registros['id_unidade'];

    if ($situacao == "I") {
        echo "<tr id='destaque' style='background-color: rgba(174,35,38,0.44)'>";
        echo "<td>$nome</td><td>$matricula</td><td>$email</td><td>$login</td><td>$telefone</td><td>$permissao</td><td>$situacao</td>";
        echo "<td><a href='editar-usuario.php?id=$id'><i class='material-icons'>edit</i></a></td>";
        echo "<td><a href='../../banco_de_dados/admin/modifica_situacao_user.php?id=$id&sit=$situacao&id_anterior=$id_unidade'><i class='material-icons' style='color:red'>do_not_disturb_on</i></a></td>";
        echo "</tr>";
    } else {
        echo "<tr id='destaque'>";
        echo "<td>$nome</td><td>$matricula</td><td>$email</td><td>$login</td><td>$telefone</td><td>$permissao</td><td>$situacao</td>";
        echo "<td><a href='editar-usuario.php?id=$id'><i class='material-icons'>edit</i></a></td>";
        echo "<td><a href='../../banco_de_dados/admin/modifica_situacao_user.php?id=$id&sit=$situacao&id_anterior=$id_unidade'><i class='material-icons' style='color:green'>lens</i></a></td>";
        echo "</tr>";
    }

}


?>