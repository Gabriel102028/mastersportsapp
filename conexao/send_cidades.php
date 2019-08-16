<?php

    require_once '../conexao/conecta.php';

    $estado_cod = $_GET['estado_cod'] ?? 0;

    if($estado_cod){

        $sql = "SELECT * FROM tb_cidade WHERE estado_cod=$estado_cod";

        $resultado = mysqli_query($conexao, $sql);

        if($resultado){
            $cidades = [];


            while($cidade = mysqli_fetch_assoc($resultado)){

                $cidade['nome'] = utf8_encode($cidade['nome']);
                $cidades[] = $cidade;
            }

            print json_encode($cidades);
        }else{
            print 'erro';
        }
    }
