<?php

class Candidato
{

    public $id;
    public $nome;
    public $cpf;
    public $telefone;
    public $endereco;
    public $numero;
    public $CEP;
    public $estado;
    public $cidade;
    public $email;
    public $curso;
    public $experiencia;
}

interface CandidatoDAOInterface
{

    public function buildCandidato($data);
    public function findAll();
    public function findById($id);
    public function findByName($nome);
    public function create(Candidato $candidato);
    public function update(Candidato $candidato);  
    public function destroy($id); 
    
    
   
}
