<?php

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
        echo "<td><a href='consultar-item-no-setor.php?id_setor=$id&nome_setor=$nome'><i class='material-icons'>autorenew</i></a></td>";
        echo "</tr>";
    } else {
        echo "<tr id='destaque'>";
        echo "<td>$nome</td><td><a href=''></a></td><td>$responsavel</td><td>$telefone</td>";
        echo "<td><a href='consultar-item-no-setor.php?id_setor=$id&nome_setor=$nome'><i class='material-icons'>autorenew</i></a></td>";
        echo "</tr>";
    }
}
?>