<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    //$nome = $_POST['nome'];
    $email = $_POST['email'];

    $count = 0;

    $dadosJson = file_get_contents('jogadores.json');
    $dados = json_decode($dadosJson);
    $nome = "";


    foreach ($dados as $value) {
        if($value->email == $email){
            $count = 1;
            $nome = $value->nome;
        }
    }
    
    if($count != 0){
        echo json_encode([
            'status'=>'ok',
            'nome'=> $nome
            
        ]);
        
    }else{
        echo json_encode(['status'=>'error']);

    }

?>