<?php 
require_once "ConexaoBanco.php";
class LoginModel{

    private $db;

    public function __construct(){
        $this->db = ConexaoBanco::getConexao();
    }

    public function ListarClienteEmail($email, $senhaRecebida){
        $query = "SELECT * FROM cliente WHERE email = ?";
        $result = $this->db->prepare($query);
        $result->execute([$email]);
        $user = $result->fetch(PDO::FETCH_ASSOC);
      
        // 1. Verifica se o usuário existe E se a senha confere.
        // Se ambos forem verdadeiros, o login é um sucesso.
        if($user && password_verify($senhaRecebida, $user["Senha"])){
            // Login SUCCESS
            $_SESSION['IdUsuario'] = $user["Id_cliente"];
            return true;
        }
        
        // 2. Se o código chegou aqui, o login falhou por qualquer motivo
        // (email não encontrado OU senha incorreta).
        // Define uma mensagem de erro genérica por segurança.
        $_SESSION['Error'] = "Email ou senha incorretos. Por favor, tente novamente.";
        return false;
    }
}