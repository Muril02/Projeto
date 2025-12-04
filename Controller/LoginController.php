<?php
if (session_status() === PHP_SESSION_NONE) {
    // Session is not active, so start it
    session_start();
}

require_once "../Model/ConexaoBanco.php";
require_once "../Model/LoginModel.php";

class LoginController{

    public function Logar(){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $LoginModel = new LoginModel();
        $LoginSucesso = $LoginModel->ListarClienteEmail($email, $senha);

        if($LoginSucesso){
             header("Location: /index.php");
             exit;
        }else{
           header("Location: /Login.php");
           exit;
        }
    }
    
    public function Sair(){
       session_unset();
       header("Location: ../Login.php");
       exit();
    }
}

if(isset($_POST['acao'])){
    switch($_POST['acao']){
        case 'entrar':
            $controller = new LoginController();
            $controller->Logar();
            break;
        case 'sair':
            $controller = new LoginController();
            $controller->Sair();
            break;
    }
}


