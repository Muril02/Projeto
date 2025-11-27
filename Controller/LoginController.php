<?php

require_once "ConexaoBanco.php";
require_once "LoginModel.php";

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
            header("localhost:8000/index.php");
        }
    }
}