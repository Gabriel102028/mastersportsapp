<?php

    require_once '../conexao/conecta.php';

    $nome = $_POST['nome'] ?? '';

    $sqlCategoria = "INSERT INTO categoria VALUES(0, '$nome')";

    $resultado = mysqli_query($conexao, $sqlCategoria);

    if($resultado){

        print 'Sucesso';
    }else{

        print 'erro:' . $sqlCategoria;
    }