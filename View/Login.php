
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Faça seu Cadastro - TECHFIT</title>
    <link rel="stylesheet" href="Login.css"> 
   <link rel="stylesheet" href="CSS/Cadastro.css">

</head>
<body>
    <div class="split-screen-container">
        
        <div class="left-section">
            <h1 class="techfit-logo-text">TECH<span class="techfit-logo-fit">FIT</span></h1>
        </div>

        <div class="right-section">
            <div class="form-wrapper">
                <h2 class="form-title">Faça seu cadastro</h2>

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

                    <p id="feedback-message" class="message"></p>

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