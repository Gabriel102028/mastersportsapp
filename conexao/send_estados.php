<?php

    require_once '../conexao/conecta.php';

    $resultado = mysqli_query($conexao, "SELECT * FROM tb_estado");

    if($resultado){
        $estados = mysqli_fetch_all ($resultado, MYSQLI_ASSOC);

            $A = [];
            foreach ($estados as $estado) {
                $estado['nome'] = utf8_encode($estado['nome']);
                $A[] = $estado;
            }

            $json = json_encode($A);
            print $json;
            exit;
    }