<?php

require_once("models/User.php");
require_once("models/Message.php");

class CandidatoDAO implements CandidatoDAOInterface
{

  private $conn;
  private $url;
  private $message;

  public function __construct(PDO $conn, $url)
  {
    $this->conn = $conn;
    $this->url = $url;
    $this->message = new Message($url);
  }

  public function buildCandidato($data)
  {

    $candidato = new Candidato();

    $candidato->id = $data["id"];
    $candidato->nome = $data["nome"];
    $candidato->cpf = $data["cpf"];
    $candidato->telefone = $data["telefone"];
    $candidato->endereco = $data["endereco"];
    $candidato->numero = $data["numero"];
    $candidato->CEP = $data["CEP"];
    $candidato->estado = $data["estado"];
    $candidato->cidade = $data["cidade"];
    $candidato->email = $data["email"];
    $candidato->curso = $data["curso"];
    $candidato->experiencia = $data["experiencia"];

    return $candidato;
  }
  public function findAll()
  {

    $candidatos = [];

    $stmt = $this->conn->prepare("SELECT * FROM candidatos");

    $stmt->execute();

    if ($stmt->rowCount() > 0) {

      $candidatosArray = $stmt->fetchAll();

      foreach ($candidatosArray as $candidato) {
        $candidatos[] = $this->buildCandidato($candidato);
      }
    }

    return $candidatos;
  }
  public function findById($id)
  {
  }
  public function findByName($nome)
  {

    $candidatos = [];

    $stmt = $this->conn->prepare("SELECT * FROM candidatos
                                    WHERE nome LIKE :nome");

    $stmt->bindValue(":nome", '%' . $nome . '%');

    $stmt->execute();

    if ($stmt->rowCount() > 0) {

      $candidatosArray = $stmt->fetchAll();

      foreach ($candidatosArray as $candidato) {
        $candidatos[] = $this->buildCandidato($candidato);
      }
    }

    return $candidatos;
  }
  public function create(Candidato $candidato)
  {

    $stmt = $this->conn->prepare("INSERT INTO candidatos(
            nome, cpf, telefone, endereco, numero, CEP, estado, cidade, email, curso, experiencia
            ) VALUES (
            :nome, :cpf, :telefone, :endereco, :numero, :CEP, :estado, :cidade, :email, :curso, :experiencia)");

    $stmt->bindParam(":nome", $candidato->nome);
    $stmt->bindParam(":cpf", $candidato->cpf);
    $stmt->bindParam(":telefone", $candidato->telefone);
    $stmt->bindParam(":endereco", $candidato->endereco);
    $stmt->bindParam(":numero", $candidato->numero);
    $stmt->bindParam(":CEP", $candidato->CEP);
    $stmt->bindParam(":estado", $candidato->estado);
    $stmt->bindParam(":cidade", $candidato->cidade);
    $stmt->bindParam(":email", $candidato->email);
    $stmt->bindParam(":curso", $candidato->curso);
    $stmt->bindParam(":experiencia", $candidato->experiencia);


    $stmt->execute();

    $this->message->setMessage("Curriculo adicionado com sucesso!", "success", "index.php");
  }
  public function update(Candidato $candidato)
  {
  }
  public function destroy($id)
  {
  }
}
