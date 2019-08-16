<?php

//conecta com o banco de dados
require_once '../conexao/conecta.php';

$username = $_POST['username'] ?? '';
$senha = $_POST['senha'] ?? '';

$sql = "SELECT * FROM usuarios_tb WHERE username ='$username' AND senha='$senha'";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
  $usuario = mysqli_fetch_assoc($resultado);

  unset($usuario['senha']);

  $json = json_encode($usuario);
  print $json;
  exit;

}else{
  print 'erro' . mysqli_error($conexao);
  exit;
}

 ?>
