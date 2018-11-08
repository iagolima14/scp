<?php
    $ultimo_id = $_SESSION['ultimo_id'];
    $querySelect = $link->query("select it.nome_item, il.id_item, il.id_lancamento, il.quantidade, il.valor, il.id as id_lancamento from tb_itens_lancamento as il INNER JOIN tb_itens as it ON il.id_item = it.id where il.id_lancamento = '$ultimo_id'");
    $i = 0;
    while ($registros = $querySelect->fetch_assoc())
    {
        $i++;
        $id_lancamento = $registros['id_lancamento'];
        $nome_item = $registros['nome_item'];
        $quantidade= $registros['quantidade'];
        $valor = $registros['valor'];

    echo "<tr id='destaque'>";
    echo "<td>$i</td>
          <td>$nome_item</td>
          <td>$quantidade</td>
          <td>$valor</td>
          <td><a href='../../banco_de_dados/admin/exclui-item-lancado.php?id_lancamento=$id_lancamento'><i class='material-icons' style='color:red'>delete_forever</i></a></td>";


    /*echo "<td><a href='editar-diretor.php?nome_diretor=$nome_user_diretor&id_user_diretor=$id_usuario_diretor&id_unidade_selecionada=$id&opc_anterior=$variavelJS'><i class='material-icons'>sync</i></a></td><td>$telefone</td>";
    echo "<td><a href='editar-unidade.php?id=$id&opc_anterior=$variavelJS'><i class='material-icons'>edit</i></a></td></tr>";*/
    }
    $querySelect2 = $link->query("Select lan.num_doc, lan.data_aquisicao, lan.id, ori.nome_origem FROM tb_lancamentos as lan INNER JOIN tb_tipo_origens as ori ON lan.id_origem = ori.id WHERE lan.id='$ultimo_id'");
    while ($registros2 = $querySelect2->fetch_assoc()){
        $num_doc = $registros2['num_doc'];
        $data_aquisicao = $registros2['data_aquisicao'];
        $origem = $registros2['nome_origem'];
        echo "<tr id='destaque'>";
        echo "<td colspan='2'>NUMERO DO DOCUMENTO: $num_doc</td>
          <td colspan='2'>DATA DE AQUISIÇÃO: $data_aquisicao</td>
          <td colspan='2'>ORIGEM: $origem</td></tr>
          ";
    }


?>