<?php
    $ordenar = filter_input(INPUT_GET, 'select_ordenacao', FILTER_SANITIZE_SPECIAL_CHARS);
    $desc = filter_input(INPUT_GET, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
    $cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_SPECIAL_CHARS);
    $sit = filter_input(INPUT_GET, 'select_situacao', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($desc == null && $cod == null && $ordenar == null){

    }
    else{

        if ($desc == null && $cod == null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens order by $ordenar");
        }
        else if ($desc == null && $cod == null && $sit != null){
            $querySelect = $link->query("select * from tb_itens WHERE situacao = '$sit' order by $ordenar");
        }
        else if ($desc == null && $cod != null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE codigo like '%$cod%' order by $ordenar");
        }
        else if($desc == null && $cod != null && $sit != null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE codigo like '%$cod%' and situacao = '$sit' order by $ordenar");
        }
        else if($desc != null && $cod == null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens descricao like '%$desc%' order by $ordenar");
        }
        else if($desc != null && $cod == null && $sit != null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE descricao like '%$desc%' and situacao = '$sit' order by $ordenar");
        }
        else if($desc != null && $cod != null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE descricao like '%$desc%' and codigo like '%$cod%' order by $ordenar");
        }
        else if($desc != null && $cod != null && $sit != null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE descricao like '%$desc%' and codigo like '%$cod%' and situacao = '$sit' order by $ordenar");
        }

        while ($registros = $querySelect->fetch_assoc())
        {
            $id = $registros['id'];
            $descricao = $registros['descricao'];
            $codigo = $registros['codigo'];
            $quantidade = $registros['quantidade'];
            $situacao = $registros['situacao'];
            $data = $registros['data'];
            $valor = $registros['valor'];
            $dataformatada = substr($data,-2)."/".substr($data,-5,2)."/".substr($data,0,-6);

            if($situacao == "I"){
                echo "<tr id='destaque' style='background-color: rgba(237,15,70,0.23)'>";
                echo "<td>$descricao</td><td>$codigo</td><td>$quantidade</td><td>$dataformatada</td><td>$valor</td>";
                echo "<td><a href='editar-item.php?id=$id'><i class='material-icons'>edit</i></a></td>";
                echo "<td><a href='banco_de_dados/modifica_situacao_itens.php?id=$id&sit_item=$situacao&select_ordenacao=$ordenar&desc=$desc&cod=$cod&select_situacao=$sit'><i class='material-icons' style='color: red;'>do_not_disturb_on</i></a></td>";
                echo "</tr>";
            }
            else{
                echo "<tr id='destaque'>";
                echo "<td>$descricao</td><td>$codigo</td><td>$quantidade</td><td>$dataformatada</td><td>$valor</td>";
                echo "<td><a href='editar-item.php?id=$id'><i class='material-icons'>edit</i></a></td>";
                echo "<td><a href='banco_de_dados/modifica_situacao_itens.php?id=$id&sit_item=$situacao&select_ordenacao=$ordenar&desc=$desc&cod=$cod&select_situacao=$sit'><i class='material-icons' style='color: green;'>lens</i></a></td>";
                echo "</tr>";
            }

        }
    }


?>