<?php

  require_once '../conexao/conecta.php';

  if(isset($_GET['cod_pedido'])){
    $id = $_GET['cod_pedido'] ?? '';

    // // Obtem dados do pedido
    // $resultado = mysqli_query($conexao, "SELECT * FROM pedidos_tb WHERE id_pedido=$id");
    // if($resultado){
    //     $pedido = mysqli_fetch_object($resultado);
    // }else{
    //     $pedido = null;
    // }
    // Obtem produtos do pedido
    // $resultado = mysqli_query($conexao, "SELECT produtos_tb.*, produtos_pedidos.qtd_produto FROM produtos_pedidos INNER JOIN produtos_tb ON produtos_tb.codigo_produto = produtos_pedidos.cod_produto WHERE produtos_pedidos.cod_pedido =$id");
    //$resultado2 = mysqli_query($conexao, "SELECT * FROM produtos_tb INNER JOIN marca ON produtos_tb.id_marca = marca.id_marca INNER JOIN categoria ON produtos_tb.id_categoria = categoria.id_categoria");
   
    $resultado = mysqli_query($conexao, "SELECT produtos_tb.*, produtos_pedidos.qtd_produto, marca.nome_marca, categoria.nome_categoria FROM produtos_pedidos INNER JOIN produtos_tb ON produtos_tb.codigo_produto = produtos_pedidos.cod_produto INNER JOIN marca ON produtos_tb.id_marca = marca.id_marca INNER JOIN categoria ON produtos_tb.id_categoria = categoria.id_categoria WHERE produtos_pedidos.cod_pedido =$id");

    if($resultado){
      $produtos = [];

      while ($produto = mysqli_fetch_assoc($resultado)) {

        $produto['valor_formatado'] = 'R$' . number_format($produto['valor_prod'],2,',','.');

        $produtos [] = $produto;
      }

      $json = json_encode($produtos);

      print $json;
      exit;
  }
}