<?php

/*$variavelJS = filter_input(INPUT_GET, 'select_unidades', FILTER_SANITIZE_SPECIAL_CHARS);
if($variavelJS == "todas"){
    $querySelect = $link->query("select * from tb_unidades");
}
else{
    $querySelect = $link->query("select * from tb_unidades where regiao = '$variavelJS'");
}*/

$querySelect = $link->query("select m.id as id_mov, u.id, m.id_unidade, m.analisado, u.nome, m.data, m.id_setor_antigo, m.id_novo_setor, m.usuario_responsavel, m.id_patrimonio from tb_movimentacoes as m INNER JOIN tb_unidades as u ON m.id_unidade = u.id where m.analisado is NULL");

while ($registros = $querySelect->fetch_assoc())
{
    $id = $registros['id_mov'];
    $nome_unidade = $registros['nome'];
    $data_movimentacao = $registros['data'];

    $id_setor_origem = $registros['id_setor_antigo'];
    $querySelect2 = $link->query("select * from tb_setores where id = '$id_setor_origem'");
    $row2 = $querySelect2->fetch_assoc();
    $nome_setor_origem = $row2['nome'];

    $id_setor_destino = $registros['id_novo_setor'];
    $querySelect3 = $link->query("select * from tb_setores where id = '$id_setor_destino'");
    $row3 = $querySelect3->fetch_assoc();
    $nome_setor_destino = $row3['nome'];

    $id_user_responsavel = $registros['usuario_responsavel'];
    $querySelect4 = $link->query("select * from tb_usuarios where id = '$id_user_responsavel'");
    $row4 = $querySelect4->fetch_assoc();
    $nome_responsavel = $row4['nome'];
    $login_responsavel = $row4['login'];

    $id_patrimonio = $registros['id_patrimonio'];
    $querySelect5 = $link->query("select * from tb_patrimonio as p INNER JOIN tb_itens as i ON p.id_item = i.id where p.id = '$id_patrimonio'");
    $row5 = $querySelect5->fetch_assoc();
    $nome_item = $row5['nome_item'];
    $patrimonio_item = $row5['num_patrimonio'];


    echo "<tr id='destaque' class='altera_fonte_corpo'>";
    echo "<td>$id</td>
              <td>$nome_unidade</td>
              <td>$data_movimentacao</td>
              <td>$nome_setor_origem</td>
              <td>$nome_setor_destino</td>
              <td>$patrimonio_item</td>
              <td>$nome_item</td>";


//    echo "<td><a href='../../banco_de_dados/admin/update-movimentacoes-setores.php?id=$id'><i class='material-icons'>check_circle</i></a></td></tr>";
}

?>