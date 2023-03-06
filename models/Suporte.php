<?php

class Suporte {

    public $id;
    public $nome;    
    public $email;
    public $mensagem;
    
}

interface SuporteDAOInterface {

    public function buildSuporte($data);
    public function findAll();    
    public function create(Suporte $suporte);      
        
    
   
}
