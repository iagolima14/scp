<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php"); ?>

<?php
$id_setor_selecionado = filter_input(INPUT_GET, 'id_setor', FILTER_SANITIZE_SPECIAL_CHARS);





$querySelect = $link->query("select p.id, p.id_setor, p.descricao, p.num_patrimonio, p.sit_fisica, i.nome_item from tb_patrimonio as p INNER JOIN tb_itens as i ON p.id_item = i.id where p.id_setor = '$id_setor_selecionado'");
$i = 0;
while ($registros = $querySelect->fetch_assoc()) {
    $i++;
    $id = $registros['id'];
    $nome = $registros['nome_item'];
    $descricao = $registros['descricao'];
    $num_patrimonio = $registros['num_patrimonio'];
    $situacao_fisica = $registros['sit_fisica'];

    if ($situacao_fisica != "BOM" && $situacao_fisica != "REGULAR") {
        echo "<tr id='destaque' style='background-color: rgba(174,35,38,0.44)'>
            <td style='text-indent: 15px;'>$i</td>
            <td>$nome</td>
            <td style='text-indent: 20px;'>$num_patrimonio</td>
            <td style='text-indent: 20px;'>$situacao_fisica</td>
            <td><a href='../../_paginas/comum/mover-item.php?id_patrimonio=$id&id_setor=$id_setor_selecionado'><i class='material-icons mudar_cor_icone'>import_export</i></a></td>
         </tr>
        ";
    } else {
        echo "<tr id='destaque'>
            <td style='text-indent: 15px;'>$i</td>
            <td>$nome</td>
            <td style='text-indent: 20px;'>$num_patrimonio</td>
            <td style='text-indent: 20px;'>$situacao_fisica</td>
            <td><a href='../../_paginas/comum/mover-item.php?id_patrimonio=$id&id_setor=$id_setor_selecionado'><i class='material-icons mudar_cor_icone'>import_export</i></a></td>
         </tr>
         ";
    }
}
?>