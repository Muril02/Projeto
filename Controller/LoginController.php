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
        // The ListarClienteEmail method will set $_SESSION['Error'] if login fails.
        $LoginSucesso = $LoginModel->ListarClienteEmail($email, $senha);

        if($LoginSucesso){
             // MUDANÇA AQUI: Define a mensagem de sucesso e redireciona para o próprio Login.php
             // O Login.php agora tem um meta refresh para redirecionar para /index.php após 3s
             $_SESSION['Success'] = "Login realizado com sucesso! Bem-vindo(a).";
             header("Location: /Login.php"); 
             exit;
        }else{
           // The error message is already set in LoginModel.php
           header("Location: /Login.php"); 
           exit;
        }
    }
    
    public function Sair(){
       session_unset();
       // Add a message for successful logout
       $_SESSION['Success'] = "Você desconectou com sucesso.";
       header("Location: /Login.php");
       exit();
    }

    public function ExcluirConta(){
       session_unset();
       // Add a message for successful logout
       $_SESSION['Excluido'] = "Você excluiu sua conta com sucesso.";
       header("Location: /Login.php");
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