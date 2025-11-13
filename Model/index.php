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

        $query = "INSERT INTO cliente(nome, data_nascimento, Telefone, Email, Senha, Cpf) VALUES (?, ?, ?, ?, ?, ?)";
        $result = $this->db->prepare($query);
        $result->execute([$nome, $dt_nasc, $telefone, $email,$senhaHash, $cpf]);
    }

    public function ExcluirCliente($idCliente){
        $query = "DELETE FROM cliente WHERE id_cliente = ?";
        $result = $this->db->prepare($query);
        $result->execute([$idCliente]);
    }

    public function ListarClientes(){
        $query = "SELECT * FROM clientes";
        $result = $this->db->prepare($query);
        $result->execute();
        $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AtualizarCliente($id,$nome, $dt_nasc, $telefone, $email, $cpf){
        $query = "UPDATE cliente SET nome = ?, data_nascimento = ?, telefone = ?, email = ?, cpf = ?
        WHERE id_cliente = ?
        ";
        $result = $this->db->prepare($query);
        $result->execute([$nome, $dt_nasc, $telefone, $email, $cpf, $id]);
    }
    
    public function AtualizarSenha($id, $senhaNova){
        $query = "UPDATE cliente SET senha = ? WHERE id_cliente = ?";
        $result = $this->db->prepare($query);
        
        $senhaHash = password_hash($senhaNova, PASSWORD_BCRYPT);

        $result->execute([$senhaHash, $id]);
    }
}

// $teste = new ClienteModel("Teste", "2023-05-15", "982747570", "rodolfo@dssdf",
//  "geladeiratsunami", "890274", null);
// $DAO = new ClienteDAO();
// $DAO->AtualizarCliente(2, "Atualizado", "2008-09-30", "47593749", "atualizado@gmail.com",
//     "58408698"
// );
// $DAO->ExcluirCliente(1);
// $DAO->InsertCliente($teste);
// var_dump($teste);
