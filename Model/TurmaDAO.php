<?php


require_once "TurmaModel.php";
require_once "ConexaoBanco.php";
class TurmaDAO{

    private $db;
    public function __construct(){
        $this->db = ConexaoBanco::getConexao();
    }

    public function InsertTurma(Turma $turma){
        
        $nome = $turma->getNome();
        $capacidade = $turma->getCapacidade();
        $descricao = $turma->getDescricao(); 
        $horario = $turma->getHorario();
        $idProf = $turma->getIdProfessor();
 

        $query = "INSERT INTO Turmas(nome, capacidade, descricao, horario, idProfessor) VALUES (?, ?, ?, ?, ?)";
        $result = $this->db->prepare($query);
        $result->execute([$nome, $capacidade, $descricao, $horario,$idProf]);
    }

    public function ExcluirTurma($idTurma){
        $query = "DELETE FROM turma WHERE id_turma = ?";
        $result = $this->db->prepare($query);
        $result->execute([$idTurma]);
    }

    public function ListarTurma(){
        $query = "SELECT * FROM turma";
        $result = $this->db->prepare($query);
        $result->execute();
        $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AtualizarTurma($id,$nome, $capacidade, $descricao, $horario, $idProf){
        $query = "UPDATE turma SET nome = ?, capacidade = ?, descricao = ?, horario = ?, idProfessor = ?
        WHERE id_turma = ?
        ";
        $result = $this->db->prepare($query);
        $result->execute([$nome, $capacidade, $descricao, $horario, $id, $id]);
    }
    
    public function AtualizarProfessor($id, $idProfNovo){
        $query = "UPDATE turma SET idProfessor = ? WHERE id_turma = ?";
        $result = $this->db->prepare($query);
        
        $result->execute([$idProfNovo, $id]);
    }
}
