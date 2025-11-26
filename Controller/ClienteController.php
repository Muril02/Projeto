<?php 

require_once "../Model/ClienteDAO.php";
require_once "../Model/ClienteModel.php";

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
        $DAO->InsertCliente($cliente);
    }


}