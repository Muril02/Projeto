<?php 
require_once "ConexaoBanco.php";
session_start();
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

        if($user){
            $senhaBanco = $user["Senha"];
            
            if(password_verify($senhaRecebida,$senhaBanco)){

                $_SESSION['IdUsuario'] = $user["Id_cliente"];
                return true;
            }
        }
        $_SESSION["erro"] = "Falha no login";
        return false;
    }

}