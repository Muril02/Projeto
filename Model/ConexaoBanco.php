<?php


class ConexaoBanco
{

    private $db;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=tech_fit;charset=utf8mb4";
        $user = "root";
        $password = "Murilo1235@";
       
        try{
            $this->db = new PDO(
                $dsn,
                $user,
                $password
            );
        }catch(PDOException $e){
            die("Erro ao conectar" . $e->getMessage());
        }
    }

    public function getDb(){
        return $this->db;
    }
}
