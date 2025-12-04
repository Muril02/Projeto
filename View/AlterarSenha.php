<?php

require_once "../Controller/ClienteController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    switch ($_POST['acao']) {
        case "alterar":
           $Nome = $_POST["Nome"]; 
           $Cpf = $_POST["CPF"]; 
           $Email = $_POST["Email"]; 
           $Telefone = $_POST["Telefone"]; 
           $Dt_nasc = $_POST["Dt_nasc"]; 
           $Id_cliente = $_POST["Id_cliente"]; 
           break;
           case "update":
            $Nome = $_POST["Nome"]; 
            $Cpf = $_POST["CPF"]; 
            $Email = $_POST["Email"]; 
            $Telefone = $_POST["Telefone"]; 
            $Dt_nasc = $_POST["Dt_nasc"]; 
            $Id_cliente = $_POST["Id_cliente"]; 

               $controller = new ClienteController();
               $controller->Alterar($Nome, $Cpf, $Email, $Telefone, $Dt_nasc, $Id_cliente);
            break;
            case "updateSenha":
                $Id_cliente = $_POST["Id_cliente"]; 
                $Senha = $_POST["Senha"];
                
                $controller = new ClienteController();
                $controller->AlterarSenha($Id_cliente, $Senha);
                break;
            case "alterarSenha":
                $Id_cliente = $_POST["Id_cliente"]; 
                break;
        }

}




?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Faça seu Cadastro - TECHFIT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/Cadastro.css"> 
    
</head>
<body>
    <div class="split-screen-container">

        <div class="right-section">
            <div class="form-wrapper">
                <h2 class="form-title">Alterar senha</h2>

                <form action="AlterarSenha.php" method="post">
                    <input type="hidden" name="acao" value="updateSenha">
                    <input type="hidden" name="Id_cliente" value="<?php echo $Id_cliente?>">
                    <p id="feedback-message" class="message" style="display:none; text-align: center; margin-bottom: 20px;"></p>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="Senha" placeholder="Digite sua senha nova" required>
                    </div>

                    <button type="submit" class="submit-button btn btn-primary">
                        Alterar
                    </button>

                </form>

                <div class="form-links" style="text-align: center; margin-top: 20px;">
                    <a href="Login.php">Já tenho uma conta</a>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>

