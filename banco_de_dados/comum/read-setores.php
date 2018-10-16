<?php
include_once '../../banco_de_dados/conexao.php';
include_once ("../../_includes/comum/controle_acesso_comum.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$querySelect = $link->query("select * from tb_setores where id_unidade = '$id_unidade_user'");

while ($registros = $querySelect->fetch_assoc()){
    $id = $registros['id'];
    $nome = $registros['nome'];
    $telefone = $registros['telefone'];
    $responsavel = $registros['responsavel'];
    $situacao = $registros['situacao'];

    $querySoma = $link->query("select * from tb_patrimonio where id_setor = '$id'");
    $num_linhas = $querySoma->num_rows;

    if ($situacao == "I") {
        echo "<tr id='destaque' style='background-color: rgba(174,35,38,0.44)' onclick='chama_pagina($id)'>";
        echo "<td>$nome</td><td class='espaco_qnt_linha'><a href=''>$num_linhas</a></td><td>$responsavel</td><td>$telefone</td>";
        echo "<td><a href='editar-setor.php?id=$id'><i class='material-icons'>edit</i></a></td>";
        echo "<td><a href='../../banco_de_dados/comum/modifica_situacao_setor.php?id=$id&sit_setor=$situacao'><i class='material-icons' style='color:red'>do_not_disturb_on</i></a></td>";
        echo "</tr>";
    }
    else{
        echo "<tr id='destaque' onclick='chama_pagina($id)'>";
        echo "<td>$nome</td><td class='espaco_qnt_linha'><a href=''>$num_linhas</a></td><td>$responsavel</td><td>$telefone</td>";
        echo "<td><a href='editar-setor.php?id=$id'><i class='material-icons'>edit</i></a></td>";
        echo "<td><a href='../../banco_de_dados/comum/modifica_situacao_setor.php?id=$id&sit_setor=$situacao'><i class='material-icons' style='color:green'>lens</i></a></td>";
        echo "</tr>";
    }



}


?>