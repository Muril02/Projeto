<?php 

require_once "../Model/ClienteDAO.php";
require_once "../Model/ClienteModel.php";
require_once "../Controller/LoginController.php";

class ClienteController{

    public function InserirCliente($nome, $dt_nasc, $telefone, $email, $senha, $cpf){
        
        // =======================================================
        // MANTIDO: Conversão da Data de Nascimento
        // =======================================================
        $date_obj = DateTime::createFromFormat('d/m/Y', $dt_nasc);
        
        if ($date_obj) {
            $dt_nasc_mysql = $date_obj->format('Y-m-d');
        } else {
            $dt_nasc_mysql = null; 
        }

        $cliente = new ClienteModel(
            $nome,
            $dt_nasc_mysql, 
            $telefone,
            $email,
            $senha,
            $cpf,
            null
        );

        $DAO = new ClienteDAO();
        
        // MUDANÇA: Retorna o resultado da inserção (true/false)
        return $DAO->InsertCliente($cliente);
    }

    public function ExcluirConta($id){
        $cliente = new ClienteDAO();
        $login = new LoginController();
        $result = $cliente->ExcluirCliente($id);
        
        if($result){
            $login->ExcluirConta();
            exit();
        }
    }

    public function ListarClientePorId($id){
        $cliente = new ClienteDAO();
        return $cliente->ListarClientesId($id);
    }

    public function Alterar($Nome, $Cpf, $Email, $Telefone, $Dt_nasc, $Id){

        // =======================================================
        // MANTIDO: Aplicando a mesma conversão para a função Alterar()
        // =======================================================
        $date_obj = DateTime::createFromFormat('d/m/Y', $Dt_nasc);
        
        if ($date_obj) {
            $dt_nasc_mysql = $date_obj->format('Y-m-d');
        } else {
            $dt_nasc_mysql = null; 
        }
        
        $Model = new ClienteDAO();
        $result = $Model->AtualizarCliente($Id,
         $Nome,
          $dt_nasc_mysql, 
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
        $result = $Model->AtualizarSenha($Id, $SenhaNova);

        if($result){
            header("Location: /Perfil.php");
            exit();
         }else{
            header("Location: /AlterarSenha");
            exit();
         }
    }
}

if(isset($_POST['acao'])){
    switch($_POST['acao']){
        
        case 'excluirConta':
            $controller = new ClienteController();
            $controller->ExcluirConta(
                $_POST["Id_cliente"]
            );
            break;
    }
}