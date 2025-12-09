<?php
// PHP Header Block (Mantido)
// O session_start() deve estar no topo, mas presumo que está em algum arquivo incluído ou no seu ambiente.
require_once "../Controller/ClienteController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    switch ($_POST['acao']) {
        case "criar":
            $controller = new ClienteController();
            
            // MUDANÇA: Captura o resultado da inserção
            $sucesso = $controller->InserirCliente(
                $_POST['nome'],
                $_POST['dt_nasc'],
                $_POST['telefone'],
                $_POST['email'],
                $_POST['senha'],
                $_POST['cpf']
            );

            // Redireciona para o Login.php se for bem-sucedido (PRG pattern)
            if ($sucesso) {
                // Se for bem-sucedido, redireciona. 
                // Você pode usar uma variável de sessão para mostrar uma mensagem de sucesso no Login.php.
                session_start();
                $_SESSION['Success'] = "Cadastro realizado com sucesso! Faça seu login.";
                header("Location: Login.php");
                exit();
            } else {
                // Opcional: Tratar erro de inserção (ex: e-mail ou CPF duplicado no banco)
                // Você pode definir uma variável de sessão de erro e recarregar a página.
                // session_start();
                // $_SESSION['Error'] = "Erro ao cadastrar. Tente novamente.";
            }

            break;
    }
}

?>

<!DOCTYPE html>