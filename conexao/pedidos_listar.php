<?php

require_once '../conexao/conecta.php';

$id = $_GET['id'] ?? '';

$sql = "SELECT * FROM pedidos_tb WHERE codigo_usuario=$id";

//executa a query no banco
$resultado = mysqli_query($conexao, $sql);

  //montar o array em pedidos
  if ($resultado) {
    $pedidos =  []; //array de pedidos vazia

    //percorrendo as linhas do resultado da query
    //para cada linha tenho um pedido na variavel $pedido
    while ($pedido = mysqli_fetch_assoc($resultado)) {

      //adiciona o pedido do array
      $pedidos [] = $pedido;
  }

  //converte o array para json
  $json = json_encode($pedidos);

  //enviando o json para o cliente
  print $json;
  exit;

}else {

  print 'erro:' . mysqli_error($conexao);
  exit;
}
