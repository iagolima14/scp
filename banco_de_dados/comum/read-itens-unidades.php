<?php
include_once '../../banco_de_dados/conexao.php';
include_once ("../../_includes/comum/controle_acesso_comum.php");

$filtro = filter_input(INPUT_GET, 'filtro', FILTER_SANITIZE_NUMBER_INT);

if ($filtro == 2){
    $querySelect = $link->query("select * from tb_patrimonio where id_unidade = '$id_unidade_user' and id_setor is not null ORDER BY id_setor");
}else{
   $querySelect = $link->query("select * from tb_patrimonio where id_unidade = '$id_unidade_user' and id_setor is null");
}


$i = 0;
while ($registros = $querySelect->fetch_assoc()){
    $i++;
    $id = $registros['id'];
    $num_patrimonio = $registros['num_patrimonio'];
    $id_item = $registros['id_item'];
    $descricao = $registros['descricao'];
    $id_setor = $registros['id_setor'];
    $sit_fisica = $registros['sit_fisica'];
    $data_aquisicao = $registros['data_aquisicao'];
    $valor_aquisicao = $registros['valor_aquisicao'];
    $obs = $registros['obs'];

    $querySelect2 = $link->query("select * from tb_itens where id='$id_item'");
    while ($registros2 = $querySelect2->fetch_assoc()){
        $nome_item = $registros2['nome_item'];
    }

    echo "<tr id='destaque' class='font_tabela_corpo'>";
    if ($id_setor == null){
        echo "<td>$i</td><td>$num_patrimonio</td><td>$nome_item</td><td>$descricao</td><td><a href='../../_paginas/comum/inserir-setor-patrimonio.php?id_item=$id_item&id_patrimonio=$id'><i class='material-icons'>playlist_add</i></a></td>";
    }
    else{
        $querySelect1 = $link->query("select * from tb_setores where id = '$id_setor'");
        while ($registros1 = $querySelect1 ->fetch_assoc()){
            $nome_setor = $registros1['nome'];
        }
        echo "<td>$i</td><td>$num_patrimonio</td><td>$nome_item</td><td>$descricao</td><td>$nome_setor</td>";
    }


    echo "</tr>";

}


?>