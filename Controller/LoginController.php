<?php
session_start();
require_once "../Model/ConexaoBanco.php";
require_once "../Model/LoginModel.php";

class LoginController{


    public function Logar(){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $LoginModel = new LoginModel();
        $LoginModel->ListarClienteEmail($email, $senha);

        if(isset($_SESSION["erro"])){

            unset($_SESSION["erro"]);
            echo "Erro ao logar!";

        }else{
            header("Location: /View/index.php");
        }
    }

    public function Sair(){
        unset($_SESSION["IdUsuario"]);
    }
}