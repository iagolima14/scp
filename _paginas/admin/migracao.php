<?php include_once("../../banco_de_dados/conexao.php"); ?>
<?php include_once("../../_includes/geral/header.inc.php"); ?>
<?php include_once("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once("../../_includes/admin/menu_admin.inc.php"); ?>
<?php
    $i=0;
    $querySelect = $link->query("SELECT * FROM tb_itens");
    while($row = $querySelect->fetch_assoc()){
        $id_item = $row['id'];
        $quantidade = $row['quantidade'];

        $link->query("INSERT INTO tb_itens_lancamento (id_item, id_lancamento, quantidade, adicionado) VALUES ('$id_item', '1', '$quantidade', 'S')");
        $affected_rows = mysqli_affected_rows($link);
        if ($affected_rows > 0){
            $i++;
        }
    }
    echo "FORAM MIGRADOS $i ITENS PARA TABELA";

    ?>