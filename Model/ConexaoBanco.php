<?php

class ConexaoBanco
{

    private static $db = null;

    public static function getConexao()
    {
        if(self::$db == null){
            $dsn = "mysql:host=localhost;dbname=tech_fit;charset=utf8mb4";
            $user = "root";
            $password = "Murilo1235@";
           
            try{
                self::$db = new PDO(
                    $dsn,
                    $user,
                    $password
                );
                self::$db->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }catch(PDOException $e){
                die("Erro ao conectar" . $e->getMessage() . phpInfo());
            }
        }
        return self::$db;
    }
}
