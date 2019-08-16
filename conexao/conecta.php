<?php

  if (!isset($_SESSION)) session_start();

  $conexao = mysqli_connect('localhost', 'root', '', 'mastersports');

  if (mysqli_errno($conexao)) {
    die(mysqli_error($conexao));
  }

  header('Access-Control-Allow-Origin: *');
