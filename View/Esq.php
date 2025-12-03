<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Esqueci a Senha - TECHFIT</title>
    <link rel="stylesheet" href="Login.css"> 
   <link rel="stylesheet" href="Esq.css">

    <script>
        function simularEnvio(event) {
            event.preventDefault(); // Impede o envio do formulário padrão

            const emailInput = document.getElementById('email').value.trim();
            const mensagem = document.getElementById('feedback-message');

            // Validação básica se o campo está preenchido
            if (emailInput === '') {
                 mensagem.textContent = 'Por favor, digite seu e-mail.';
                 mensagem.style.color = 'red';
                 mensagem.style.display = 'block';
                 return;
            }

            // Simula o envio de link para qualquer e-mail
            mensagem.textContent = 'Link de redefinição enviado para ' + emailInput + '. Verifique sua caixa de entrada!';
            mensagem.style.color = 'green';
            mensagem.style.display = 'block';

            // Opcional: Redireciona de volta para o login após 4 segundos
            setTimeout(() => {
                window.location.href = 'login.html'; 
            }, 4000); 
        }
    </script>
</head>
<body>
    <div class="split-screen-container">
        
        <div class="left-section">
            <h1 class="techfit-logo-text">TECH<span class="techfit-logo-fit">FIT</span></h1>
        </div>

        <div class="right-section">
            <div class="form-wrapper">
                <h2 class="form-title">Esqueceu a Senha?</h2>
                <p style="margin-bottom: 25px; color: #666; font-size: 0.95em;">
                    Digite seu e-mail para receber um link de redefinição.
                </p>

                <form onsubmit="simularEnvio(event)">
                    
                    <div class="input-group">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" id="email" placeholder="Email" required>
                    </div>

                    <p id="feedback-message" class="message"></p>

                    <button type="submit" class="btn btn-primary">ENVIAR LINK</button>
                </form>

                <div class="form-links" style="margin-top: 50px;">
                    <a href="login.html">Voltar para o Login</a>
                    <a href="Cadastro.html">Voltar para Cadastro</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>