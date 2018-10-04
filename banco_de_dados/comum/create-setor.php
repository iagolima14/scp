<?php
    include_once '../../banco_de_dados/conexao.php';
    include_once ("../../_includes/comum/controle_acesso_comum.php");

    $nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $responsavel     = filter_input(INPUT_POST, 'responsavel', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone     = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);


    //VERIFICANDO SE JÁ EXISTE O NOME DO SETOR OU NÃO
    $querySelect = $link->query("select nome from tb_setores WHERE id_unidade = '$id_unidade_user'");
    $control = 0;
    while ($nomes = $querySelect->fetch_assoc()) {
        $nomes_existentes = $nomes['nome'];
        if (strtoupper($nomes_existentes) == strtoupper($nome)){
            $control++;
            break;
        }
    }

    if($control == 0){
        $queryInsert = $link->query("insert into tb_setores (id, nome, id_unidade, responsavel, telefone) values (default, '$nome','$id_unidade_user','$responsavel','$telefone') ");
        $affected_row = mysqli_affected_rows($link);

        if ($affected_row > 0){
            echo "<script>alert('Cadastro efetuado com sucesso!')</script>";
            echo "<script>location.href='../../_paginas/comum/cadastrar-setor.php'</script>";
        }
    }
    else{
        echo "<script>alert('Setor Já Cadastrado. Tente Novamente!')</script>";
        echo "<script>location.href='../../_paginas/comum/cadastrar-setor.php'</script>";
    }

?>