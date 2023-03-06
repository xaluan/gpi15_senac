<?php 

require_once("globals.php");
require_once("db.php");
require_once("models/Suporte.php");
require_once("models/Message.php");
require_once("dao/SuporteDAO.php");

$message = new Message($BASE_URL);
$suporteDao = new SuporteDAO($conn, $BASE_URL);


$type = filter_input(INPUT_POST, "type");


if($type === "create") {

    $nome = filter_input(INPUT_POST, "nome");    
    $email = filter_input(INPUT_POST, "email");    
    $mensagem = filter_input(INPUT_POST, "mensagem");
    
    $suporte = new Suporte(); 

    if(!empty($email)) {

        $suporte->nome = $nome;        
        $suporte->email = $email;        
        $suporte->mensagem = $mensagem;

        $suporteDao->create($suporte);

    } else {

        $message->setMessage("Falta informações!", "error", "index.php");
    }

} else {

    $message->setMessage("Informações inválidas!", "error", "index.php");

}
