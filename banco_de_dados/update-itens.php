<?php include_once ("conexao.php"); ?>

<?php
$id = $_SESSION['id'];

$descricao     = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$codigo     = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$quantidade     = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$data     = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_NUMBER_INT);
$valor     = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_INT);

$queryUpdate = $link->query("update tb_itens set descricao='$descricao',codigo='$codigo',quantidade='$quantidade',data='$data',valor='$valor' where id='$id'");
$affected_rows = mysqli_affected_rows($link);

if ($affected_rows > 0){
    header("Location:../consultar-item.php");
}

?>