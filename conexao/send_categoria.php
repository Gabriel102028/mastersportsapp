<?php

  require_once '../conexao/conecta.php';

  // $categoria = $_GET['id_categoria'] ?? 0;


    $sql = "SELECT * FROM categoria";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
      $cat = [];

      while ($categorias = mysqli_fetch_assoc($resultado)) {

        $categorias['nome_categoria'] = utf8_encode($categorias['nome_categoria']);
        $cat[] = $categorias;
      }

      $json = json_encode($cat);
      print $json;
      exit;
    }
