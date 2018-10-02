<?php
include_once '../../banco_de_dados/conexao.php';
include_once ("../../_includes/comum/controle_acesso_comum.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$querySelect = $link->query("select * from tb_setores where id_unidade = '$id_unidade_user'");

while ($registros = $querySelect->fetch_assoc()){
    $id = $registros['id'];
    $nome = $registros['nome'];
    //$quantidade_itens = $registros['quantidade_itens'];
    $telefone = $registros['telefone'];
    $responsavel = $registros['responsavel'];
    $situacao = $registros['situacao'];

    if ($situacao == "I") {
        echo "<tr id='destaque' style='background-color: rgba(174,35,38,0.44)'>";
        echo "<td>$nome</td><td><a href=''></a></td><td>$responsavel</td><td>$telefone</td>";
        echo "<td><a href='editar-setor.php?id=$id'><i class='material-icons'>edit</i></a></td>";
        echo "<td><a href='../../banco_de_dados/admin/modifica_situacao_user.php?id=$id&sit_setor=$situacao&id_anterior=$id'><i class='material-icons' style='color:red'>do_not_disturb_on</i></a></td>";
        echo "</tr>";
    } else {
        echo "<tr id='destaque'>";
        echo "<td>$nome</td><td><a href=''></a></td><td>$responsavel</td><td>$telefone</td>";
        echo "<td><a href='editar-setor.php?id=$id'><i class='material-icons'>edit</i></a></td>";
        echo "<td><a href='../../banco_de_dados/admin/modifica_situacao_user.php?id=$id&sit_setor=$situacao&id_anterior=$id'><i class='material-icons' style='color:green'>lens</i></a></td>";
        echo "</tr>";
    }

}


?>