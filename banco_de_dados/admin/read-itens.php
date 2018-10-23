<?php
    $ordenar = filter_input(INPUT_GET, 'select_ordenacao', FILTER_SANITIZE_SPECIAL_CHARS);
    $desc = filter_input(INPUT_GET, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
    $cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_SPECIAL_CHARS);
    $cod_siscop = filter_input(INPUT_GET, 'cod_siscop', FILTER_SANITIZE_SPECIAL_CHARS);
    $sit = filter_input(INPUT_GET, 'select_situacao', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($desc == null && $cod == null && $ordenar == null){

    }
    else{

        if ($cod_siscop == null && $desc == null && $cod == null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens order by $ordenar");
        }
        else if ($cod_siscop == null && $desc == null && $cod == null && $sit != null){
            $querySelect = $link->query("select * from tb_itens WHERE situacao = '$sit' order by $ordenar");
        }
        else if ($cod_siscop == null && $desc == null && $cod != null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE codigo like '%$cod%' order by $ordenar");
        }
        else if($cod_siscop == null && $desc == null && $cod != null && $sit != null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE codigo like '%$cod%' and situacao = '$sit' order by $ordenar");
        }
        else if($cod_siscop == null && $desc != null && $cod == null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE nome_item like '%$desc%' order by $ordenar");
        }
        else if($cod_siscop == null && $desc != null && $cod == null && $sit != null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE nome_item like '%$desc%' and situacao = '$sit' order by $ordenar");
        }
        else if($cod_siscop == null && $desc != null && $cod != null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE nome_item like '%$desc%' and codigo like '%$cod%' order by $ordenar");
        }
        else if($cod_siscop == null && $desc != null && $cod != null && $sit != null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE nome_item like '%$desc%' and codigo like '%$cod%' and situacao = '$sit' order by $ordenar");
        }
        else if ($cod_siscop != null && $desc == null && $cod == null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE codigo_siscop like '%$cod_siscop%' order by $ordenar");
        }
        else if ($cod_siscop != null && $desc == null && $cod == null && $sit != null){
            $querySelect = $link->query("select * from tb_itens WHERE situacao = '$sit' and codigo_siscop like '%$cod_siscop%' order by $ordenar");
        }
        else if ($cod_siscop != null && $desc == null && $cod != null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE codigo like '%$cod%' and codigo_siscop like '%$cod_siscop%' order by $ordenar");
        }
        else if($cod_siscop != null && $desc == null && $cod != null && $sit != null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE codigo like '%$cod%' and codigo_siscop like '%$cod_siscop%' and situacao = '$sit' order by $ordenar");
        }
        else if($cod_siscop != null && $desc != null && $cod == null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE nome_item like '%$desc%' and codigo_siscop like '%$cod_siscop%' order by $ordenar");
        }
        else if($cod_siscop != null && $desc != null && $cod == null && $sit != null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE nome_item like '%$desc%' and codigo_siscop like '%$cod_siscop%' and situacao = '$sit' order by $ordenar");
        }
        else if($cod_siscop != null && $desc != null && $cod != null && $sit == null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE nome_item like '%$desc%' and codigo_siscop like '%$cod_siscop%' and codigo like '%$cod%' order by $ordenar");
        }
        else if($cod_siscop != null && $desc != null && $cod != null && $sit != null)
        {
            $querySelect = $link->query("select * from tb_itens WHERE nome_item like '%$desc%' and codigo_siscop like '%$cod_siscop%' and codigo like '%$cod%' and situacao = '$sit' order by $ordenar");
        }
        $i=0;
        while ($registros = $querySelect->fetch_assoc())
        {
            $i++;
            $id = $registros['id'];
            $descricao = $registros['nome_item'];
            $codigo = $registros['codigo'];
            $codigo_siscop = $registros['codigo_siscop'];
            $situacao = $registros['situacao'];

            $querySoma = $link->query("SELECT * FROM tb_patrimonio WHERE id_item = '$id'");
            $num_linhas = $querySoma->num_rows;

            if($situacao == "I"){
                echo "<tr class='altera_fonte_corpo' id='destaque' style='background-color: rgba(237,15,70,0.23)'>";
                echo "<td style='text-indent: 10px'>$i</td>
                      <td>$descricao</td>
                      <td>$codigo</td>
                      <td style='text-indent: 30px'>$codigo_siscop</td>
                      <td style='text-indent: 30px'>0</td>
                      <td style='text-indent: 50px'>0</td>";
                echo "<td><a href='editar-item.php?id=$id'><i class='material-icons'>edit</i></a></td>";
                echo "<td><a href='../../banco_de_dados/admin/modifica_situacao_itens.php?id=$id&sit_item=$situacao&select_ordenacao=$ordenar&desc=$desc&cod=$cod&select_situacao=$sit&cod_siscop=$codigo_siscop'><i class='material-icons' style='color: red;'>do_not_disturb_on</i></a></td>";
                echo "</tr>";
            }
            else{
                echo "<tr id='destaque' class='altera_fonte_corpo'>";
                echo "<td style='text-indent: 10px'>$i</td>
                      <td>$descricao</td>
                      <td>$codigo</td>
                      <td style='text-indent: 30px'>$codigo_siscop</td>
                      <td style='text-indent: 30px'>0</td>
                      <td style='text-indent: 50px'>0</td>";
                echo "<td><a href='editar-item.php?id=$id'><i class='material-icons'>edit</i></a></td>";
                echo "<td><a href='../../banco_de_dados/admin/modifica_situacao_itens.php?id=$id&sit_item=$situacao&select_ordenacao=$ordenar&desc=$desc&cod=$cod&select_situacao=$sit&cod_siscop=$codigo_siscop'><i class='material-icons' style='color: green;'>lens</i></a></td>";
                echo "</tr>";
            }

        }
    }


?>