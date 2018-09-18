<?php
include_once 'conexao.php';
$variavelJS = filter_input(INPUT_GET, 'select_unidades', FILTER_SANITIZE_SPECIAL_CHARS);
if($variavelJS == "todas"){
    $querySelect = $link->query("select * from tb_unidades");
}
else{
    $querySelect = $link->query("select * from tb_unidades where regiao = '$variavelJS'");
}


while ($registros = $querySelect->fetch_assoc()){
    $id = $registros['id'];
    $nome = $registros['nome'];
    $cidade = $registros['cidade'];
    $regiao = $registros['regiao'];

    echo "<tr id='destaque'>";
    echo "<td>$nome</td><td>$cidade</td><td>$regiao</td>";
    echo "<td><a href='editar-unidade.php?id=$id'><i class='material-icons'>edit</i></a></td>";
    //echo "<td><a href='banco_de_dados/delete-unidades.php?id=$id'><i class='material-icons'>delete</i></a></td>";
    echo "</tr>";
}


?>