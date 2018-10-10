<?php include_once '../../banco_de_dados/conexao.php'; ?>
<?php include_once ("../../_includes/comum/controle_acesso_comum.php"); ?>

<?php
$id_setor_selecionado = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);





$querySelect = $link->query("select p.id, p.id_setor, p.descricao, p.num_patrimonio, p.sit_fisica, i.nome_item from tb_patrimonio as p INNER JOIN tb_itens as i ON p.id_item = i.id where p.id_setor = '$id_setor_selecionado'");
$i = 0;
while ($registros = $querySelect->fetch_assoc()) {
    $i++;
    $id = $registros['id'];
    $nome = $registros['nome_item'];
    $descricao = $registros['descricao'];
    $num_patrimonio = $registros['num_patrimonio'];
    $situacao_fisica = $registros['sit_fisica'];

    echo"<tr class='font_tabela_corpo'>
            <td style='text-indent: 15px;'>$i</td>
            <td>$nome</td>
            <td style='text-indent: 40px;'>$num_patrimonio</td>
            <td style='text-indent: 20px;'>$situacao_fisica</td>
            <td><a href='../../_paginas/comum/mover-item.php'><i class='material-icons'>autorenew</i></a></td>
         </tr>
        ";
}
?>