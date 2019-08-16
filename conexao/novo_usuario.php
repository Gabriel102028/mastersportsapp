<?php

    require_once '../conexao/conecta.php';

    $nome = $_POST['nome'] ?? '';
    $nomecompleto = $_POST['nomeCompleto'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $estado = $_POST['estado'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $comfirmarsenha = $_POST['comfirmarsenha'] ?? '';

    $sqlcadastro = "INSERT INTO usuarios_tb VALUES (0, '$nome', '$nomecompleto', '$endereco', '$estado', '$cidade', '$senha', 'com')";

    $resultado = mysqli_query($conexao, $sqlcadastro);

    if($resultado){

        print 'Sucesso..';

    }else{

        print 'erro:' . $sqlcadastro;
    }
