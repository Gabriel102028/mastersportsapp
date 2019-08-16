<?php

   require_once '..//conexao/conecta.php';

   $nome = $_POST['nome'] ?? '';
   $categoria = $_POST['categoria'] ?? '';
   $marca = $_POST['marca'] ?? '';
   $preco = $_POST['preco'] ?? '';
   $descricao = $_POST['descricao'] ?? '';
   $imagem = $_FILES['imagem'] ?? null;

   
    $tipo = explode('/',$imagem['type'])[1]; // Obtem o tipo do arquivo
    $img = md5(time()) . ".$tipo"; // Cria um novo nome para evitar sobreescrever arquvios com nomes iguais
    $novo = '../img/' . $img; // Caminho completo
    move_uploaded_file($imagem['tmp_name'], $novo);   


   $sqlProduto = "INSERT INTO produtos_tb VALUES (0, '$nome', '', '$preco', '$descricao', '$img', '$marca', '$categoria')";

   $resultado = mysqli_query($conexao, $sqlProduto);

   if ($resultado) {

     print 'Sucesso';
   }else {
     print 'erro:' . $sqlProduto;
   }
