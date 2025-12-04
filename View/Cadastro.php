<?php
require_once "../Controller/ClienteController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    switch ($_POST['acao']) {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/Cadastro.css"> 
    
     <script>
        // function simularCadastro(event) {
        //     // Impede o envio padrão do formulário (que recarregaria a página)
        //     event.preventDefault();

        //     // Captura todos os dados para salvar
        //     const emailInput = document.getElementById('email').value.trim();
        //     const senhaInput = document.getElementById('senha').value.trim();
        //     const cpfInput = document.getElementById('cpf').value.trim();
        //     const nomeInput = document.getElementById('nome').value.trim();
        //     const sexoInput = document.getElementById('sexo').value.trim();
        //     const telefoneInput = document.getElementById('telefone').value.trim();
        //     const dataNascimentoInput = document.getElementById('data_nascimento').value.trim();
            
        //     // Captura a mensagem de feedback
        //     const mensagem = document.getElementById('feedback-message');
            
        //     // 1. Validação Mínima
        //     if (emailInput === '' || senhaInput === '' || cpfInput === '' || nomeInput === '' || sexoInput === '' || telefoneInput === '' || dataNascimentoInput === '') {
        //         mensagem.textContent = 'Por favor, preencha todos os campos obrigatórios.';
        //         mensagem.style.color = 'red';
        //         mensagem.style.display = 'block';
        //         return;
        //     }

        //     // 2. Salva os dados no Local Storage
        //     // Salvamos todos os campos, mas no Login.html só usamos 'emailCadastrado' e 'senhaCadastrada'.
        //     localStorage.setItem("emailCadastrado", emailInput);
        //     localStorage.setItem("senhaCadastrada", senhaInput);
        //     localStorage.setItem("nomeCadastrado", nomeInput);
        //     localStorage.setItem("cpfCadastrado", cpfInput);
        //     localStorage.setItem("sexoCadastrado", sexoInput);
        //     localStorage.setItem("telefoneCadastrado", telefoneInput);
        //     localStorage.setItem("dataNascimentoCadastrado", dataNascimentoInput);


        //     // 3. Feedback e Redirecionamento
        //     mensagem.textContent = 'Cadastro finalizado com sucesso! Redirecionando para o Login...';
        //     mensagem.style.color = 'green';
        //     mensagem.style.display = 'block';

        //     // Redireciona para Login.html após 1.5 segundos
        //     setTimeout(() => {
        //         window.location.href = 'Login.html';
        //     }, 1500);

        // } 

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

</head>
<body>
    <div class="split-screen-container">
        
        <div class="left-section">
            <h1 class="techfit-logo-text">TECH<span class="techfit-logo-fit">FIT</span></h1>
        </div>

        <div class="right-section">
            <div class="form-wrapper">
                <h2 class="form-title">Faça seu cadastro completo</h2>

                <form action="Cadastro.php" method="post">
                    <input type="hidden" name="acao" value="criar">
                    <p id="feedback-message" class="message" style="display:none; text-align: center; margin-bottom: 20px;"></p>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" placeholder="Digite seu documento" required>
                    </div>

                    <div class="form-group">
                        <label for="nome">Nome completo</label>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="Ex: techFit@.com" required>
                    </div>

                    <div class="form-group phone-group">
                        <label for="telefone">DDD + Celular</label>
                        <div class="phone-input-wrapper">
                            <input type="tel" id="telefone" name="telefone" placeholder="(19) 12345-6789" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="data_nascimento">Data de nascimento</label>
                        <input type="text" onfocus="MudarTipo()" id="data_nascimento" name="dt_nasc" placeholder="__/__/____" required>
                    </div>

                    <div class="form-group">
                        <label for="senha">Criar Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Crie uma senha segura" required>
                    </div>
                    
                    <p class="privacy-text">
                        Utilizamos seus dados pessoais para o cadastro em nossa plataforma, que nos permite lhe prestar nossos serviços. Para mais informações, acesse nosso 
                        <a href="TermosDePrivacidade.php">Aviso de Privacidade</a>. Caso não queira receber comunicações de marketing, o descadastramento pode ser realizado pelo 
                        <a href="TermosDePrivacidade.php">Portal de Privacidade</a> ou pelo link disponibilizado no rodapé dos e-mails da TechFit.
                    </p>
                    <p class="important-text">
                        Importante: apenas comunicações de Marketing podem ser desativadas. O envio de informações sobre seus planos e/ou sobre sua TechFit continuarão a ser encaminhados, pois são essenciais para prestação de serviços.
                    </p>

                    <button type="submit" class="submit-button btn btn-primary">
                        FINALIZAR CADASTRO
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








<!-- <!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Faça seu Cadastro - TECHFIT</title>
    <link rel="stylesheet" href="/CSS/Cadastro2.css">
</head>

<body>
    <div class="page-container">

        <main class="registration-form">
            <form action="Cadastro.php" method="post">
                <input type="hidden" name="acao" value="criar">
                <h1 class="main-title">Criação de cadastro</h1>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
                </div>

                <div class="form-group">
                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Ex: techFit@.com" required>
                </div>

                <div class="form-group phone-group">
                    <label for="telefone">DDD + Celular</label>
                    <div class="phone-input-wrapper">
                        <input type="tel" id="telefone" name="telefone" placeholder="Digite seu telefone" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input type="text" id="dt_nasc" name="dt_nasc" required>
                </div>

                <div class="form-group hidden-field">
                    <label for="senha">Criar Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                </div>

                <p class="privacy-text">
                    Utilizamos seus dados pessoais para o cadastro em nossa plataforma, que nos permite lhe prestar nossos serviços. Para mais informações, acesse nosso
                    <a href="termosDePrivacidade.html">Aviso de Privacidade</a>. Caso não queira receber comunicações de marketing, o descadastramento pode ser realizado pelo
                    <a href="termosDePrivacidade.html">Portal de Privacidade</a> ou pelo link disponibilizado no rodapé dos e-mails da TechFit.
                </p>
                <p class="important-text">
                    Importante: apenas comunicações de Marketing podem ser desativadas. O envio de informações sobre seus planos e/ou sobre sua TechFit continuarão a ser encaminhados, pois são essenciais para prestação de serviços.
                </p>

                <div class="button-class">
                    <button type="submit" class="submit-button">
                       Cadastrar
                    </button>
                </div>
            </form>
        </main>
        <!-- <strong><a href="home.html">Voltar</a></strong> -->
    <!-- </div>
</body> -->

<!-- <script>
    const dataInput = document.getElementById('dt_nasc');

    dataInput.onfocus = function() {
        this.type = 'date'
    }

    dataInput.onblur = function() {
        if (this.value == '') {
            this.type = 'text'
        }
    }
</script> -->

<!-- </html> -->