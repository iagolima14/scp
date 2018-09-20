<?php
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
    $telefone = $registros['telefone'];
    $id_usuario_diretor = $registros['diretor'];


    $buscaNomeDiretor = $link->query("select * from tb_usuarios where id = '$id_usuario_diretor'");
    while ($registros = $buscaNomeDiretor->fetch_assoc()){
        $nome_user_diretor = $registros['nome'];
    }


    if ($regiao == "RMSP"){
        $regiao_nome = "CAPITAL E RMS GESTÃO PLENA";
    }elseif ($regiao == "IP"){
        $regiao_nome = "INTERIOR GESTÃO PLENA";
    }elseif ($regiao == "RMSC"){
        $regiao_nome = "CAPITAL E RMS COGESTÃO";
    }elseif ($regiao == "IC"){
        $regiao_nome = "INTERIOR COGESTÃO";
    }elseif ($regiao == "CEAPA"){
        $regiao_nome = "CEAPA";
    }else{
        $regiao_nome = "";
        echo "<script>alert('Erro 125')</script>";
    }

    echo "<tr id='destaque'>";
    echo "<td>$nome</td>
        <td>$cidade</td>
        <td>$regiao_nome</td>
        <td><a href=\"informacao-diretor.php?id_user_diretor=$id_usuario_diretor&nome_unidade=$nome&opc_anterior=$variavelJS\">$nome_user_diretor</a></td>
        <td><a href='editar-diretor.php?nome_diretor=$nome_user_diretor&id_user_diretor=$id_usuario_diretor'><i class='material-icons'>sync</i></a></td><td>$telefone</td>";

    echo "<td><a href='editar-unidade.php?id=$id'><i class='material-icons'>edit</i></a></td>";
    //echo "<td><a href='banco_de_dados/delete-unidades.php?id=$id'><i class='material-icons'>delete</i></a></td>";
    echo "</tr>";
}


?>