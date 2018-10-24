<?php include_once ("../conexao.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>

<?php
    //VARIÁVEIS PARA MANTER O FILTRO CONFORME SELECIONADO ANTERIORMENTE
    $ordenar = filter_input(INPUT_POST, 'select_ordenacao', FILTER_SANITIZE_SPECIAL_CHARS);
    $desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
    $cod = filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_SPECIAL_CHARS);
    $cod_siscop = filter_input(INPUT_POST, 'cod_siscop', FILTER_SANITIZE_SPECIAL_CHARS);
    $sit = filter_input(INPUT_POST, 'select_situacao', FILTER_SANITIZE_SPECIAL_CHARS);
    //FIM DAS VARIÁVEIS DO FILTRO


    $id_item_selecionado = filter_input(INPUT_POST, 'id_item_selecionado', FILTER_SANITIZE_NUMBER_INT);
    $nome_item     = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $codigo     = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
    $codigo_siscop     = filter_input(INPUT_POST, 'codigo_siscop', FILTER_SANITIZE_NUMBER_INT);
    $info_grupo     = filter_input(INPUT_POST, 'grupo', FILTER_SANITIZE_SPECIAL_CHARS);
    $info_subgrupo     = filter_input(INPUT_POST, 'subgrupo', FILTER_SANITIZE_SPECIAL_CHARS);

    $valores_grupo = explode(" # ", $info_grupo);
    $id_grupo = $valores_grupo[0];
    $cod_grupo = $valores_grupo[1];
    $cod_grupo_antigo = substr($codigo_siscop, 0, 2);

    $valores_subgrupo = explode(" # ", $info_subgrupo);
    $id_subgrupo = $valores_subgrupo[0];
    $cod_subgrupo = $valores_subgrupo[1];
    $cod_subgrupo_antigo = substr($codigo_siscop, 2, 2);

    if($cod_grupo == $cod_grupo_antigo && $cod_subgrupo == $cod_subgrupo_antigo){
        $queryUpdate = $link->query("update tb_itens set nome_item = '$nome_item', codigo = '$codigo' where id = '$id_item_selecionado'");
        $affected_rows = mysqli_affected_rows($link);
        if ($affected_rows > 0){
            echo "<script>alert('Item editado com sucesso! O código SISCOP não foi alterado.')</script>";
            echo "<script>location.href='../../_paginas/admin/consultar-item.php?select_ordenacao=$ordenar&desc=$desc&cod=$cod&select_situacao=$sit&cod_siscop=$cod_siscop'</script>";
        }
        else{
            echo "<script>alert('Item não editado!')</script>";
            echo "<script>location.href='../../_paginas/admin/consultar-item.php?select_ordenacao=$ordenar&desc=$desc&cod=$cod&select_situacao=$sit&cod_siscop=$cod_siscop'</script>";
        }
    }
    else{
        $busca_codigo = $cod_grupo.$cod_subgrupo;
        $querySelect3 = $link->query("select max(codigo_siscop) from tb_itens where codigo_siscop LIKE '$busca_codigo%'");
        $valormaximobanco = mysqli_fetch_row($querySelect3);
        $maior_valor_do_banco = $valormaximobanco[0];
        $codigo_do_banco = $maior_valor_do_banco;
        $codigo_bruto = substr($codigo_do_banco, 4);
        $parcial = (int) $codigo_bruto + 1;
        $parcial = str_pad($parcial, 4, "0", STR_PAD_LEFT);
        $novo_codigo_siscop = $busca_codigo.$parcial;

        $queryUpdate = $link->query("update tb_itens set nome_item = '$nome_item', codigo = '$codigo', codigo_siscop = '$novo_codigo_siscop', grupo = '$id_grupo', subgrupo = '$id_subgrupo' where id='$id_item_selecionado'");
        $affected_rows = mysqli_affected_rows($link);
        if ($affected_rows > 0){
            date_default_timezone_set('America/Sao_Paulo');
            $dataLocal = date('Y/m/d H:i:s', time());
            $queryInsert = $link->query("INSERT INTO tb_code_control (id_item, diaehora, cod_antigo, cod_novo, id_user) VALUES ('$id_item_selecionado', '$dataLocal', '$codigo_siscop', '$novo_codigo_siscop', '$id_user')");
            $affected_rows2 = mysqli_affected_rows($link);
            if ($affected_rows > 0) {
                echo "<script>alert('Item editado com sucesso! O Código SISCOP para o item foi alterado de: $codigo_siscop  para $novo_codigo_siscop.')</script>";
                echo "<script>location.href='../../_paginas/admin/consultar-item.php?select_ordenacao=$ordenar&desc=$desc&cod=$cod&select_situacao=$sit&cod_siscop=$cod_siscop'</script>";
            }
        }
        else{
            echo "<script>alert('Item não editado!')</script>";
            echo "<script>location.href='../../_paginas/admin/consultar-item.php?select_ordenacao=$ordenar&desc=$desc&cod=$cod&select_situacao=$sit&cod_siscop=$cod_siscop'</script>";
        }

    }



?>