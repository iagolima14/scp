<?php
$ordenar = filter_input(INPUT_GET, 'select_ordenacao', FILTER_SANITIZE_SPECIAL_CHARS);
$desc = filter_input(INPUT_GET, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
$cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_SPECIAL_CHARS);
$cod_siscop = filter_input(INPUT_GET, 'cod_siscop', FILTER_SANITIZE_SPECIAL_CHARS);
$sit = filter_input(INPUT_GET, 'select_situacao', FILTER_SANITIZE_SPECIAL_CHARS);
$unidade_selecionada = filter_input(INPUT_GET, 'sel_unidades', FILTER_SANITIZE_SPECIAL_CHARS);

//$querySelect = $link->query("select * from tb_itens");
//
//$i=0;
//while ($registros = $querySelect->fetch_assoc())
//{
//    $i++;
//    $id = $registros['id'];
//    $descricao = $registros['nome_item'];
//    $codigo = $registros['codigo'];
//    $codigo_siscop = $registros['codigo_siscop'];
//    $situacao = $registros['situacao'];
//    $quantidade = $registros['quantidade'];
//    $disponivel = $registros['disponivel'];

//    $querySoma = $link->query("SELECT * FROM tb_patrimonio WHERE id_item = '$id'");
////    $num_linhas = $querySoma->num_rows;


    $querySelect1 = $link->query("select * from tb_patrimonio where  id_unidade = '$unidade_selecionada'");
    $i=0;
    while ($registros1 = $querySelect1->fetch_assoc()){
        $i++;
        $id_patrimonio = $registros1['id'];
        $id_item = $registros1['id_item'];
        $desc_item = $registros1['descricao'];

        $querySelect2 = $link->query("select * from tb_itens where id = '$id_item'");
        while ($registros2 = $querySelect2->fetch_assoc()){
            $id = $registros2['id'];
            $descricao = $registros2['nome_item'];
            $codigo = $registros2['codigo'];
            $codigo_siscop = $registros2['codigo_siscop'];
            $situacao = $registros2['situacao'];
            $quantidade = $registros2['quantidade'];
            $disponivel = $registros2['disponivel'];



//    echo "<tr id='destaque' class='altera_fonte_corpo'>";
//    echo "<td>$i</td>
//              <td>$descricao</td>
//              <td>$codigo</td>
//              <td>$codigo_siscop</td>
//              <td>$quantidade</td>";
//    echo "</tr>";

    echo "<tr id='destaque' class='altera_fonte_corpo'>";
    echo "<td>$i</td>
              <td>$descricao</td>
              <td>$codigo</td>
              <td>$codigo_siscop</td>
              <td>$quantidade</td>";
    echo "</tr>";

    }

}



?>