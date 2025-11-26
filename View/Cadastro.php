
<?php

require_once "../Controller/ClienteController.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    switch($_POST['acao']){
        case "criar":
            $DAO = new ClienteController();
            $DAO->InserirCliente(
            $_POST['nome'],
            $_POST['dt_nasc'],
            $_POST['telefone'],
            $_POST['email'],
            $_POST['senha'],
            $_POST['cpf']
            );
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
    <link rel="stylesheet" href="../CSS/Cadastro.css">
    
</head>
<body>
    <div class="split-screen-container">
        
        <div class="left-section">
            <h1 class="techfit-logo-text">TECH<span class="techfit-logo-fit">FIT</span></h1>
        </div>

        <div class="right-section">
            <div class="form-wrapper">
                <h2 class="form-title">Faça seu cadastro</h2>

                <form method="post" action="Cadastro.php">
                    <input type="hidden" name="acao" value="criar">
                    
                    <div class="input-group">
                        <i class="fas fa-envelope icon"></i>
                        <input type="text" id="nome" name="nome" placeholder="Nome" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-lock icon"></i>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    
                    <div class="input-group">
                        <i class="fas fa-lock icon"></i>
                        <input type="text" id="dt_nasc" name="dt_nasc" placeholder="Data de Nascimento" required>
                    </div>
                    
                    <div class="input-group">
                        <i class="fas fa-lock icon"></i>
                        <input type="text" id="telefone" name="telefone" placeholder="Telefone" required>
                    </div>
                    
                    <div class="input-group">
                        <i class="fas fa-lock icon"></i>
                        <input type="text" id="cpf" name="cpf" placeholder="CPF" required>
                    </div>
                    
                    <div class="input-group">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="senha" name="senha" placeholder="Senha" required>
                    </div>

                    <p id="feedback-message" class="message"></p>

                    <button type="submit" class="btn btn-primary">CRIAR</button>
                </form>

                <div class="form-links">
                    <a href="Esq.html">Esqueci a senha</a>
                    <a href="Login.html">Já tenho uma conta</a>
                </div>
            </div>
        </div>
    </div>
</body>

<script>

           const dataInput = document.getElementById('dt_nasc');
            
            dataInput.onfocus = function(){
                this.type = 'date'
            }
            
            dataInput.onblur = function(){
                if(this.value == ''){
                    this.type = 'text'
                }
            }

        // function simularCadastro(event) {
        //     event.preventDefault(); 

        //     const nomeInput = document.getElementById('nome').value.trim();
        //     const emailInput = document.getElementById('email').value.trim();
        //     const senhaInput = document.getElementById('senha').value.trim();
        //     const dataInputValue = document.getElementById('dt_nasc').value.trim();
        //     const telefoneInput = document.getElementById('telefone').value.trim();
        //     const cpfInput = document.getElementById('cpf').value.trim();
            
            
         
        //     const mensagem = document.getElementById('feedback-message');

        //     // Validação básica para garantir que os campos não estão vazios
        //     if (emailInput === '' || senhaInput === '') {
        //          mensagem.textContent = 'Por favor, preencha todos os campos.';
        //          mensagem.style.color = 'red';
        //          mensagem.style.display = 'block';
        //          return;
        //     }

        //     mensagem.textContent = 'Cadastro realizado com sucesso! Redirecionando para o login...';
        //     mensagem.style.color = 'green';
        //     mensagem.style.display = 'block';

            // Redireciona para a página de login após 1.5 segundos
            // setTimeout(() => {
            //     window.location.href = 'login.html'; // <<< Mude 'login.html' para sua página de login
            // }, 1500); 
        
    </script>
</html>