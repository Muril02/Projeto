<?php


require_once "ClienteModel.php";
require_once "ConexaoBanco.php";
class ClienteDAO{

    private $db;
    public function __construct(){
        $this->db = ConexaoBanco::getConexao();
    }

    public function InsertCliente(ClienteModel $cliente){
        
        $nome = $cliente->getNome();
        $dt_nasc = $cliente->getDt_nasc();
        $telefone = $cliente->getTelefone();
        $email = $cliente->getEmail();
        $senha = $cliente->getSenha();
        $cpf = $cliente->getCpf();

        $senhaHash = password_hash($senha, PASSWORD_BCRYPT); 

        $query = "INSERT INTO cliente(nome, data_nascimento, telefone, email, senha, cpf) VALUES (?, ?, ?, ?, ?, ?)";
        $result = $this->db->prepare($query);
        return $result->execute([$nome, $dt_nasc, $telefone, $email,$senhaHash, $cpf]);
    }

    public function ExcluirCliente($idCliente){
        $query = "DELETE FROM cliente WHERE id_cliente = ?";
        $result = $this->db->prepare($query);
        $result->execute([$idCliente]);
        return true;
    }

    public function ListarClientes(){
        $query = "SELECT * FROM cliente";
        $result = $this->db->prepare($query);
        $result->execute();
       return $result->fetchAll(PDO::FETCH_ASSOC);
    }

     public function ListarClientesId($id){
        $query = "SELECT * FROM cliente WHERE id_cliente = ?";
        $result = $this->db->prepare($query);
        $result->execute([$id]);
       return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function AtualizarCliente($id,$nome, $dt_nasc, $telefone, $email, $cpf){
        $query = "UPDATE cliente SET nome = ?, data_nascimento = ?, telefone = ?, email = ?, cpf = ?
        WHERE id_cliente = ?
        ";
        $result = $this->db->prepare($query);
        $result->execute([$nome, $dt_nasc, $telefone, $email, $cpf, $id]);
        return $result->rowCount() > 0;
    }
    
    public function AtualizarSenha($id, $senhaNova){
        $query = "UPDATE cliente SET senha = ? WHERE id_cliente = ?";
        $result = $this->db->prepare($query);
        
        $senhaHash = password_hash($senhaNova, PASSWORD_BCRYPT);

        $result->execute([$senhaHash, $id]);
        return $result->rowCount() > 0;
    }
}