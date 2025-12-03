<?php 

require_once "../Model/ClienteDAO.php";
require_once "../Model/ClienteModel.php";
require_once "../Controller/LoginController.php";

class ClienteController{

    public function InserirCliente($nome, $dt_nasc, $telefone, $email, $senha, $cpf){
        $cliente = new ClienteModel(
            $nome,
            $dt_nasc,
            $telefone,
            $email,
            $senha,
            $cpf,
            null
        );

        $DAO = new ClienteDAO();
        if($DAO->InsertCliente($cliente)){
            header("Location: " . $_SERVER['PHP_SELF']);
        }else{
            header("Location: /Login.php");
        }

        
    }

    public function ExcluirConta($id){
        $cliente = new ClienteDAO();
        $login = new LoginController();
        $result = $cliente->ExcluirCliente($id);
        
        
        if($result){
            $login->Sair();
            header("Location: /Login.php");
            exit();
        }
    }

    public function ListarClientePorId($id){
        $cliente = new ClienteDAO();
        return $cliente->ListarClientesId($id);
    }

    public function Alterar($Nome, $Cpf, $Email, $Telefone, $Dt_nasc, $Id){

        $Model = new ClienteDAO();
        $result = $Model->AtualizarCliente($Id,
         $Nome,
          $Dt_nasc,
           $Telefone,
           $Email,
           $Cpf
         );
         
         if($result){
            header("Location: /Perfil.php");
            exit();
         }else{
            header("Location: /AlterarInformacoes");
            exit();
         }
    }

    public function AlterarSenha($Id, $SenhaNova){


        $Model = new ClienteDAO();
        $result = $Model->AtualizarSenha($Id,
         $SenhaNova
         );
         
         if($result){
            header("Location: /Perfil.php");
            exit();
         }else{
            header("Location: /AlterarInformacoes");
            exit();
         }
    }

}

if(isset($_POST['acao'])){

    $acao = $_POST['acao'];
    $id = $_POST['Id_cliente'];
    switch($acao){
        case "excluir":
            $controller = new ClienteController();
            $controller->ExcluirConta($id);
            break;
}
}
