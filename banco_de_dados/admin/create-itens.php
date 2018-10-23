<?php
include_once '../conexao.php';

$nome_item     = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$codigo     = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$info_grupo     = filter_input(INPUT_POST, 'grupo', FILTER_SANITIZE_SPECIAL_CHARS);
$info_subgrupo     = filter_input(INPUT_POST, 'subgrupo', FILTER_SANITIZE_SPECIAL_CHARS);

$valores_grupo = explode(" # ", $info_grupo);
$id_grupo = $valores_grupo[0];
$cod_grupo = $valores_grupo[1];

$valores_subgrupo = explode(" # ", $info_subgrupo);
$id_subgrupo = $valores_subgrupo[0];
$cod_subgrupo = $valores_subgrupo[1];

//VERIFICANDO SE JÁ EXISTE O NOME DO ITEM
$querySelect = $link->query("select nome_item from tb_itens");
$array_descricoes = [];

while ($descricoes = $querySelect->fetch_assoc()) {
    $descricoes_existentes = $descricoes['nome_item'];
    array_push($array_descricoes, $descricoes_existentes);
}

if (in_array($nome_item,$array_descricoes)){
//    $_SESSION['msg'] = "<p class='center red-text'>".'Já existe um ITEM cadastrado com esse nome'."</p>";
//    header("Location:../../_paginas/admin/cadastrar-item.php");
      echo "<script>alert('Já existe um ITEM cadastrado com esse nome!')</script>";
      echo "<script>location.href='../../_paginas/admin/cadastrar-item.php'</script>";
}


else{
    //VERIFICANDO SE O SUBGRUPO PERTENCE AO GRUPO
    $querySelect2 = $link->query("select * from tb_subgrupo where id = '$id_subgrupo' and id_grupo = '$id_grupo'");
    $num_linhas = $querySelect2->num_rows;
    if($num_linhas == 0){
        echo "<script>alert('Subgrupo não tem relação com o Grupo!')</script>";
        echo "<script>location.href='../../_paginas/admin/cadastrar-item.php'</script>";
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
        $codigo_siscop = $busca_codigo.$parcial;

        $queryInsert = $link->query("insert into tb_itens (id, nome_item, codigo, codigo_siscop, grupo, subgrupo) values (default, '$nome_item','$codigo','$codigo_siscop','$id_grupo','$id_subgrupo') ");
        $affected_row = mysqli_affected_rows($link);
        if ($affected_row > 0){
            echo "<script>alert('Cadastro efetuado com sucesso!')</script>";
            echo "<script>location.href='../../_paginas/admin/cadastrar-item.php'</script>";
        }
    }

}

?>