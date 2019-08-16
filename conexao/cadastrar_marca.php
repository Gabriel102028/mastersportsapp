<?php

    require_once '../conexao/conecta.php';

    $nome = $_POST['nome'] ?? '';

    $sqlMarca = "INSERT INTO marca VALUES (0, '$nome')";

    $resultado = mysqli_query($conexao, $sqlMarca);

    if($resultado){

        print 'Sucesso';
    }else{

        print 'erro:' . $sqlMarca;
    }
