<?php
//$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$querySelect = $link->query("select * from tb_grupo");

$i = $j = 0;
while ($registros = $querySelect->fetch_assoc()) {
    $i++;
    $j = 0;
    $id = $registros['id'];
    $nome_grupo = $registros['nome_grupo'];
    $cod_grupo = $registros['cod_grupo'];

    echo "<tr id='destaque' class='tab_grupo'>";
    echo "<td id='td_grupo'>$i</td>
            <td id='td_grupo'><a href=''></a>$nome_grupo</td>
            <td id='td_grupo'>$cod_grupo</td>";
    echo "<td><a href='editar-grupos.php?id=$id'><i class='material-icons'>edit</i></a></td>";
    echo "</tr>";

    $querySelect2 = $link->query("select * from tb_subgrupo where id_grupo='$id'");
    while ($registros2 = $querySelect2->fetch_assoc()) {
        $j++;
        $id_subgrupo = $registros2['id'];
        $nome_subgrupo = $registros2['nome_subgrupo'];
        $cod_subgrupo = $registros2['cod_subgrupo'];

        echo "<tr id='destaque2' class='tab_subgrupo'>";
        echo "<td style='padding: 0px !important;'>$i-$j</td>
                <td style='padding: 0px !important;'><a href=''></a>$nome_subgrupo</td>
                <td style='padding: 0px !important;'>$cod_subgrupo</td>";
        echo "<td><a href='editar-subgrupos.php?id_subgrupo=$id_subgrupo'><i class='material-icons'>edit</i></a></td>";
        echo "</tr>";
    }
}
?>