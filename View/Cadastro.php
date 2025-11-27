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
    <link rel="stylesheet" href="Cadastro2.css">
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
                        JÁ TENHO CADASTRO
                    </button>
                </div>
            </form>
        </main>
        <!-- <strong><a href="home.html">Voltar</a></strong> -->
    </div>
</body>

<script>
    const dataInput = document.getElementById('dt_nasc');

    dataInput.onfocus = function() {
        this.type = 'date'
    }

    dataInput.onblur = function() {
        if (this.value == '') {
            this.type = 'text'
        }
    }
</script>

</html>