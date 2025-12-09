<?php
// Start the session to access $_SESSION variables
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Variables to hold the message content and type
$feedback_message = '';
$message_class = '';

// Check for a success message
if (isset($_SESSION['Success'])) {
    $feedback_message = $_SESSION['Success'];
    $message_class = 'success-message';
    // Não limpa o $_SESSION['Success'] aqui, faremos isso no <head>
} 
// Check for an error message
elseif (isset($_SESSION['Error'])) {
    $feedback_message = $_SESSION['Error'];
    $message_class = 'error-message';
    unset($_SESSION['Error']); // Clear the message after displaying it
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Faça seu Cadastro - TECHFIT</title>
    
    <?php if (isset($_SESSION['Success'])): ?>
    <meta http-equiv="refresh" content="3;url=/index.php">
    <?php 
    // Limpa a mensagem de sucesso *após* definir a tag meta, para que ela não persista.
    unset($_SESSION['Success']); 
    endif; ?>
    
    <link rel="stylesheet" href="CSS/Login.css">
    <link rel="stylesheet" href="Login.css"> 

</head>
<body>
    <div class="split-screen-container">
        
        <div class="left-section">
            <h1 class="techfit-logo-text">TECH<span class="techfit-logo-fit">FIT</span></h1>
        </div>

        <div class="right-section">
            <div class="form-wrapper">
                <h2 class="form-title">Faça seu login</h2>

                <form action="../Controller/LoginController.php" method="post">
                    <input type="hidden" name="acao" value="entrar">
                    <div class="input-group">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="senha" name="senha" placeholder="Senha" required>
                    </div>

                    <p id="feedback-message" class="message <?php echo $message_class; ?>">
                        <?php echo $feedback_message; ?>
                    </p>

                    <button type="submit" class="btn btn-primary">ENTRAR</button>
                </form>

                <div class="form-links">
                    <a href="Cadastro.php">Não tenho uma conta</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>