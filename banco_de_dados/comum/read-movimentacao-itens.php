<?php

$querySelect = $link->query("select * from tb_setores where id_unidade = '$id_unidade_user'");

while ($registros = $querySelect->fetch_assoc()){
    $id = $registros['id'];
    $nome = $registros['nome'];
    //$quantidade_itens = $registros['quantidade_itens'];
    $telefone = $registros['telefone'];
    $responsavel = $registros['responsavel'];
    $situacao = $registros['situacao'];

    $querySoma = $link->query("select * from tb_patrimonio where id_setor = '$id'");
    $num_linhas = $querySoma->num_rows;

    if ($situacao == "I") {
        echo "<tr id='destaque' style='background-color: rgba(174,35,38,0.44)'>";
        echo "<td>$nome</td><td class='espaco_qnt_linha'><a href=''>$num_linhas</a></td><td>$responsavel</td><td>$telefone</td>";
        echo "<td><a href='consultar-item-no-setor.php?id_setor=$id&nome_setor=$nome'><i class='material-icons mudar_cor_icone'>view_list</i></a></td>";
        echo "</tr>";
    } else {
        echo "<tr id='destaque'>";
        echo "<td>$nome</td><td class='espaco_qnt_linha'><a href=''>$num_linhas</a></td><td>$responsavel</td><td>$telefone</td>";
        echo "<td><a href='consultar-item-no-setor.php?id_setor=$id&nome_setor=$nome'><i class='material-icons mudar_cor_icone'>view_list</i></a></td>";
        echo "</tr>";
    }
}
?>