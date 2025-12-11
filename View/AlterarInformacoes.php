<?php

require_once "../Controller/ClienteController.php";

$Nome = $Cpf = $Email = $Telefone = $Dt_nasc = $Id_cliente = null;
$feedback_message = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Define as variáveis a partir dos dados POST (seja 'alterar' ou 'update')
    $Nome = $_POST["Nome"] ?? null; 
    $Cpf = $_POST["CPF"] ?? null; 
    $Email = $_POST["Email"] ?? null; 
    $Telefone = $_POST["Telefone"] ?? null; 
    $Dt_nasc = $_POST["Dt_nasc"] ?? null; 
    $Id_cliente = $_POST["Id_cliente"] ?? null; 
    $acao = $_POST['acao'] ?? null;

    // =======================================================
    // CORREÇÃO: Converte a data de YYYY-MM-DD para DD/MM/YYYY
    // se for o formato do banco de dados (enviado pelo Perfil.php)
    // =======================================================
    if ($Dt_nasc && strpos($Dt_nasc, '-') !== false) {
        $date_obj = DateTime::createFromFormat('Y-m-d', $Dt_nasc);
        if ($date_obj) {
            $Dt_nasc = $date_obj->format('d/m/Y');
        }
    }
    // =======================================================

    if ($acao == "update") {
        
        $controller = new ClienteController();
        $success = $controller->Alterar($Nome, $Cpf, $Email, $Telefone, $Dt_nasc, $Id_cliente);
        
        // O método Alterar() agora faz o redirecionamento.
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
    <link rel="stylesheet" href="CSS/AlterarInformacoes.css"> 
    
</head>
<body>
    <div class="split-screen-container">

        <div class="right-section">
            <div class="form-wrapper">
                <h2 class="form-title">Alterar informações</h2>

                <form action="AlterarInformacoes.php" method="post">
                    <input type="hidden" name="acao" value="update">
                    <input type="hidden" name="Id_cliente" value="<?php echo htmlspecialchars($Id_cliente ?? '') ?>"> 
                    
                    <p id="feedback-message" class="message" style="display:<?php echo $feedback_message ? 'block' : 'none'; ?>; text-align: center; margin-bottom: 20px;">
                        <?php echo htmlspecialchars($feedback_message ?? '') ?>
                    </p>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="CPF" value="<?php echo htmlspecialchars($Cpf ?? '') ?>" placeholder="Digite seu documento" required>
                    </div>

                    <div class="form-group">
                        <label for="nome">Nome completo</label>
                        <input type="text" id="nome" name="Nome" value="<?php echo htmlspecialchars($Nome ?? '') ?>" placeholder="Digite seu nome completo" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="Email" value="<?php echo htmlspecialchars($Email ?? '') ?>" placeholder="Ex: techFit@.com" required>
                    </div>

                    <div class="form-group phone-group">
                        <label for="telefone">DDD + Celular</label>
                        <div class="phone-input-wrapper">
                            <input type="tel" id="telefone" name="Telefone" value="<?php echo htmlspecialchars($Telefone ?? '') ?>" placeholder="(19) 12345-6789" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="data_nascimento">Data de nascimento</label>
                        <input onfocus="MudarTipo()" type="text" id="data_nascimento" name="Dt_nasc" value="<?php echo htmlspecialchars($Dt_nasc ?? '') ?>" placeholder="__/__/____" required>
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
    
    <script>
    
    function MudarTipo(){            
            const data = document.getElementById("data_nascimento");
           
            if(data.onfocus){
                data.type = "date"
            }else{
                if(data.value == ""){
                    data.type = "text";
                }
            }
        }

    </script>

</body>
</html>