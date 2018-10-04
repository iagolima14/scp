<?php
    include_once '../conexao.php';
    include_once ("../../_includes/comum/controle_acesso_comum.php");

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $responsavel = filter_input(INPUT_POST, 'responsavel', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
    $id_setor = filter_input(INPUT_POST, 'id_setor', FILTER_SANITIZE_NUMBER_INT);

    $querySelect = $link->query("select nome from tb_setores WHERE id_unidade = '$id_unidade_user' and id != '$id_setor'");
    $control = 0;
    while ($nomes = $querySelect->fetch_assoc()) {
        $nomes_existentes = $nomes['nome'];
        if (strtoupper($nomes_existentes) == strtoupper($nome)){
            $control++;
            break;
        }
    }

    if($control == 0){
        $queryUpdate = $link->query("update tb_setores set nome='$nome', responsavel='$responsavel', telefone='$telefone' where id='$id_setor'");
        $affected_row = mysqli_affected_rows($link);
        if ($affected_row > 0){
            echo "<script>alert('Alteração efetuada com sucesso!')</script>";
            echo "<script>location.href='../../_paginas/comum/consultar-setor.php'</script>";
        }
        else{
            echo "<script>alert('Alteração não efetuada!')</script>";
            echo "<script>location.href='../../_paginas/comum/consultar-setor.php'</script>";
        }
    }
    else{
        echo "<script>alert('Setor Existente. Tente Novamente!')</script>";
        echo "<script>location.href='../../_paginas/comum/consultar-setor.php'</script>";
    }


?>