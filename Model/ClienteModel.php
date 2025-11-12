<?php
class ClienteModel{

    private $nome;
    private $dt_nasc;
    private $telefone;
    private $email;
    private $senha;
    private $cpf;
    private $idplano;

    public function __construct($Nome, $Dt_nasc, $Telefone, $Email, $Senha, $Cpf, $idPlano){
        $this->nome = $Nome;
        $this->dt_nasc = $Dt_nasc;
        $this->telefone = $Telefone;
        $this->email = $Email;
        $this->senha = $Senha;
        $this->cpf = $Cpf;
        $this->idplano = $idPlano;
    }

    public function getNome(){
       return $this->nome;
    }
    public function getDt_nasc(){
      return  $this->dt_nasc;
    }
    
    public function getTelefone(){
      return  $this->telefone;
    }
    public function getEmail(){
      return  $this->email;
    }
    public function getSenha(){
       return $this->senha;
    }
    public function getCpf(){
       return $this->cpf;
    }
    public function getPlano(){
       return $this->idplano;
    }
}