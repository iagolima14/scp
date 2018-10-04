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

    if ($situacao == "I") {
        echo "<tr id='destaque' style='background-color: rgba(174,35,38,0.44)'>";
    }
    else{
        echo "<tr id='destaque'>";
    }

        echo "<td>$nome</td><td><a href=''></a></td><td>$responsavel</td><td>$telefone</td>";
        echo "<td><a href='editar-setor.php?id=$id'><i class='material-icons'>edit</i></a></td>";
        echo "<td><a href='../../banco_de_dados/comum/modifica_situacao_setor.php?id=$id&sit_setor=$situacao'><i class='material-icons' style='color:green'>lens</i></a></td>";
        echo "</tr>";

}


?>