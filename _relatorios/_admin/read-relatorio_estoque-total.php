<?php
$ordenar = filter_input(INPUT_GET, 'select_ordenacao', FILTER_SANITIZE_SPECIAL_CHARS);
$desc = filter_input(INPUT_GET, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
$cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_SPECIAL_CHARS);
$cod_siscop = filter_input(INPUT_GET, 'cod_siscop', FILTER_SANITIZE_SPECIAL_CHARS);
$sit = filter_input(INPUT_GET, 'select_situacao', FILTER_SANITIZE_SPECIAL_CHARS);

    $querySelect = $link->query("select * from tb_itens");

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
            echo "</tr>";
        }

    }



?>