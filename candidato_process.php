<?php 

require_once("globals.php");
require_once("db.php");
require_once("models/Candidato.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");
require_once("dao/CandidatoDAO.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);
$candidatoDao = new CandidatoDAO($conn, $BASE_URL);


$type = filter_input(INPUT_POST, "type");

$userData = $userDao->verifyToken();

if($type === "create") {

    $nome = filter_input(INPUT_POST, "nome");
    $cpf = filter_input(INPUT_POST, "cpf");
    $telefone = filter_input(INPUT_POST, "telefone");
    $endereco = filter_input(INPUT_POST, "endereco");
    $numero = filter_input(INPUT_POST, "numero");
    $CEP = filter_input(INPUT_POST, "CEP");
    $estado = filter_input(INPUT_POST, "estado");
    $cidade = filter_input(INPUT_POST, "cidade");
    $email = filter_input(INPUT_POST, "email");
    $curso = filter_input(INPUT_POST, "curso");
    $experiencia = filter_input(INPUT_POST, "experiencia");
    
    $candidato = new Candidato(); 

    if(!empty($nome) && !empty($cpf) && !empty($email)) {

        $candidato->nome = $nome;
        $candidato->cpf = $cpf;
        $candidato->telefone = $telefone;
        $candidato->endereco = $endereco;
        $candidato->numero = $numero;
        $candidato->CEP = $CEP;
        $candidato->estado = $estado;
        $candidato->cidade = $cidade;
        $candidato->email = $email;
        $candidato->curso = $curso;
        $candidato->experiencia = $experiencia;

        $candidatoDao->create($candidato);

    } else {

        $message->setMessage("Falta informações!", "error", "index.php");
    }

} else if($type === "update") { 

    $nome = filter_input(INPUT_POST, "nome");
    $cpf = filter_input(INPUT_POST, "cpf");
    $telefone = filter_input(INPUT_POST, "telefone");
    $endereco = filter_input(INPUT_POST, "endereco");
    $numero = filter_input(INPUT_POST, "numero");
    $CEP = filter_input(INPUT_POST, "CEP");
    $estado = filter_input(INPUT_POST, "estado");
    $cidade = filter_input(INPUT_POST, "cidade");
    $email = filter_input(INPUT_POST, "email");
    $curso = filter_input(INPUT_POST, "curso");
    $experiencia = filter_input(INPUT_POST, "experiencia");
    $id = filter_input(INPUT_POST, "id");
    
    $candidatoData = $candidatoDao->findById($id);
    
    if($candidatoData) {

        if(!empty($nome) && !empty($cpf) && !empty($email)) {
    
            $candidatoData->nome = $nome;
            $candidatoData->cpf = $cpf;
            $candidatoData->telefone = $telefone;
            $candidatoData->endereco = $endereco;
            $candidatoData->numero = $numero;
            $candidatoData->CEP = $CEP;
            $candidatoData->estado = $estado;
            $candidatoData->cidade = $cidade;
            $candidatoData->email = $email;
            $candidatoData->curso = $curso;
            $candidatoData->experiencia = $experiencia;
    
            $candidatoDao->update($candidatoData);
    
        } else {
    
            $message->setMessage("Falta informações!", "error", "index.php");
        }
        
    }

} else {

    $message->setMessage("Informações inválidas!", "error", "index.php");

} 
