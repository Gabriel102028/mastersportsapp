<?php

    require_once '../conexao/conecta.php';

    // Obtem a lista de produtos do POST
    $produtos = $_POST['prod'] ?? '';
    $cod_usuario = $_POST['codigo_usuario'] ??  0;


    // Cadastrando pedido
    $sqlPedido = "INSERT INTO pedidos_tb VALUES (0, $cod_usuario, NOW(), NULL, 'realizado')";

    $resultado = mysqli_query ($conexao, $sqlPedido);

    if(!$resultado){

        print 'erro:' . $sqlPedido;
        exit;
    }

    $novoPedidoID = mysqli_query($conexao, "SELECT LAST_INSERT_ID() ultimo");
    $novoPedidoID = mysqli_fetch_assoc($novoPedidoID);
    $novoPedidoID = $novoPedidoID['ultimo'];

    // Laço de repetição
    foreach ($produtos as $cod_produto => $qut_produto) {
        if($qut_produto){

        $sqlProduto = "INSERT INTO produtos_pedidos VALUES(0, $novoPedidoID, $cod_produto, $qut_produto)";

        $resultado = mysqli_query($conexao, $sqlProduto);

        if(!$resultado){
            print 'erro:' . mysqli_error($conexao);
            exit;

            }
        }
    }

    // se chegou ate aqui deu tudo certo :)
    print 'Sucesso';
