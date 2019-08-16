<?php

  require_once '../conexao/conecta.php';

  // $categoria = $_GET['id_categoria'] ?? 0;


    $sql = "SELECT * FROM marca";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
      $mar = [];

      while ($marcas = mysqli_fetch_assoc($resultado)) {

        $marcas['nome_marca'] = utf8_encode($marcas['nome_marca']);
        $mar[] = $marcas;
      }

      $json = json_encode($mar);
      print $json;
      exit;
    }
