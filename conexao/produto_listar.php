<?php

  require_once '../conexao/conecta.php';

  $sql = "SELECT * FROM produtos_tb INNER JOIN marca ON produtos_tb.id_marca = marca.id_marca INNER JOIN categoria ON produtos_tb.id_categoria = categoria.id_categoria";

  $resultado = mysqli_query($conexao, $sql);


  if($resultado){
    $produtos = [];

    while ($produto = mysqli_fetch_assoc($resultado)) {

      $produto['imagem_prod'] = 'http://localhost/mastersportsapp/img/' . $produto['imagem_prod'];

      $produto['valor_formatado'] = 'R$' . number_format($produto['valor_prod'],2,',','.');

      $produtos [] = $produto;
    }

    $json = json_encode($produtos);

    print $json;
    exit;

  }else {

    print 'erro:' . mysqli_error($conexao);
    exit;
  }
