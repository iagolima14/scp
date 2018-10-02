<?php
include_once '../../banco_de_dados/conexao.php';
include_once ("../../_includes/comum/controle_acesso_comum.php");

$querySelect = $link->query("select * from tb_patrimonio where id_unidade = '$id_unidade_user'");
$i = 0;
while ($registros = $querySelect->fetch_assoc()){
    $i++;
    $id = $registros['id'];
    $num_patrimonio = $registros['num_patrimonio'];
    $id_item = $registros['id_item'];
    $descricao = $registros['descricao'];
    $id_setor = $registros['id_setor'];
    $sit_fisica = $registros['sit_fisica'];
    $data_aquisicao = $registros['data_aquisicao'];
    $valor_aquisicao = $registros['valor_aquisicao'];
    $obs = $registros['obs'];

    echo "<tr id='destaque'>";
    echo "<td>$i</td><td>$num_patrimonio</td><td><a href=''>$id_item</a></td><td>$descricao</td><td>$id_setor</td><td>$sit_fisica</td><td>$data_aquisicao</td><td>$valor_aquisicao</td><td>$obs</td><td>Baixa</td>";
    echo "</tr>";

}


?>