<?php include_once ("../conexao.php"); ?>

<?php
$id = $_SESSION['id'];

$nome_item     = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$codigo     = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$quantidade     = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$data     = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
$valor     = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_SPECIAL_CHARS);
$valor_convertido = str_replace(",",".", $valor);

$queryUpdate = $link->query("update tb_itens set nome_item='$nome_item',codigo='$codigo',quantidade='$quantidade', `data`='$data',valor='$valor_convertido' where id='$id'");
$affected_rows = mysqli_affected_rows($link);

if ($affected_rows > 0){
    echo "<script>alert('Item editado com sucesso! $valor')</script>";
    echo "<script>location.href='../../_paginas/admin/consultar-item.php'</script>";
}
else{
    echo "<script>alert('Item não editado! $valor')</script>";
    echo "<script>location.href='../../_paginas/admin/consultar-item.php'</script>";
}

?>