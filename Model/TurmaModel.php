<?php

class Turma{

    private $nome;
    private $capacidade;
    private $descricao;
    private $horario;
    private $idProfessor;

    public function __construct($Nome, $Capacidade, $Descricao, $Horario, $IdProfessor){
        $this->nome = $Nome;
        $this->capacidade = $Capacidade;
        $this->descricao = $Descricao;
        $this->horario = $Horario;
        $this->idProfessor = $IdProfessor;
    }

    public function getNome(){
        return $this->nome;
    }
    public function getCapacidade(){
      return  $this->capacidade;
    }
    public function getDescricao(){
       return $this->descricao;
    }
    public function getHorario(){
       return $this->horario;
    }
    public function getIdProfessor(){
       return $this->idProfessor;
    }
}