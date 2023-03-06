<?php

require_once("models/User.php");
require_once("models/Message.php");

class SuporteDAO implements SuporteDAOInterface {

  private $conn;
  private $url;
  private $message;

  public function __construct(PDO $conn, $url) {

    $this->conn = $conn;
    $this->url = $url;
    $this->message = new Message($url);

  }

  public function buildSuporte($data) {

    $suporte = new Suporte();

    $suporte->id = $data["id"];
    $suporte->nome = $data["nome"];    
    $suporte->email = $data["email"];    
    $suporte->mensagem = $data["mensagem"];

    return $suporte;

  }

  public function findAll()  {

    $suportes = [];

    $stmt = $this->conn->prepare("SELECT * FROM suportes");

    $stmt->execute();
    
    return $suportes;

  }

 
  public function create(Suporte $suporte) {

    $stmt = $this->conn->prepare("INSERT INTO suportes(
            nome, email, mensagem
            ) VALUES (
            :nome, :email, :mensagem)");

    $stmt->bindParam(":nome", $suporte->nome);    
    $stmt->bindParam(":email", $suporte->email);    
    $stmt->bindParam(":mensagem", $suporte->mensagem);


    $stmt->execute();

    $this->message->setMessage("Mensagem adicionada com sucesso!", "success", "index.php");

  }
    

}
