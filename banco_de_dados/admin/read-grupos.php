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

    echo "<li>
            <div class='collapsible-header testeabc3'>";
                echo "<div class='col s1'>$i</div>";
                echo "<div class='col s5 testeabc'>$nome_grupo</div>";
                echo "<div class='col s4 testeabc'>$cod_grupo</div>";
                echo "<div class='col s2 testeabc2'><a href='editar-grupos.php?id=$id'><i class='material-icons'>edit</i></a></div>";
        echo "</div>";


    $querySelect2 = $link->query("select * from tb_subgrupo where id_grupo='$id'");
    while ($registros2 = $querySelect2->fetch_assoc()) {
        $j++;
        $id_subgrupo = $registros2['id'];
        $nome_subgrupo = $registros2['nome_subgrupo'];
        $cod_subgrupo = $registros2['cod_subgrupo'];

        echo "<div class='collapsible-body'>";
        echo "<span>";
            echo "<div class='col s2'>$i-$j</div>";
            echo "<div class='col s6 '>$nome_subgrupo</div>";
            echo "<div class='col s3 '>$cod_subgrupo</div>";
            echo "<div class='col s1 '><a href='editar-subgrupos.php?id_subgrupo=$id_subgrupo'><i class='material-icons' style='color:red;'>edit</i></a></div>";
            echo "</span></div>";
    }
    echo "</li>";
}
?>