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
    }
}

if(isset($_POST['acao'])){
    $controller = new LoginController();
    $acao = $_POST['acao'];
    
    if($acao == 'entrar'){
        $controller->Logar();
    }
}