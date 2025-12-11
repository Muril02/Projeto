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
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Faça seu Cadastro - TECHFIT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/Cadastro.css"> 
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head>
<body>
    <div class="split-screen-container">
        <div class="left-section">
            <h1 class="techfit-logo-text">TECH<span class="techfit-logo-fit">FIT</span></h1>
        </div>
        
        <main class="right-section">
            <h2 class="form-title">Crie sua Conta</h2>
            
            <form id="cadastroForm" action="Cadastro.php" method="post">
                <input type="hidden" name="acao" value="criar">

                <div class="input-group">
                    <i class="fas fa-user icon"></i>
                    <input type="text" id="nome" name="nome" placeholder="Nome Completo" required minlength="3" maxlength="100">
                    <small class="error-text" id="error-nome"></small>
                </div>

                <div class="input-group">
                    <i class="fas fa-envelope icon"></i>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <small class="error-text" id="error-email"></small>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock icon"></i>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required minlength="6">
                    <small class="error-text" id="error-senha"></small>
                </div>
                
                <div class="input-group">
                    <i class="fas fa-id-card icon"></i>
                    <input type="text" id="cpf" name="cpf" placeholder="CPF" required data-js="cpf">
                    <small class="error-text" id="error-cpf"></small>
                </div>

                <div class="input-group">
                    <i class="fas fa-calendar-alt icon"></i>
                    <input type="text" id="dt_nasc" name="dt_nasc" placeholder="Data de Nascimento (DD/MM/AAAA)" required data-js="date">
                    <small class="error-text" id="error-dt_nasc"></small>
                </div>

                <div class="input-group">
                    <i class="fas fa-phone icon"></i>
                    <input type="tel" id="telefone" name="telefone" placeholder="Telefone (XX) XXXXX-XXXX" required data-js="phone">
                    <small class="error-text" id="error-telefone"></small>
                </div>

                <p class="privacy-text">
                    Utilizamos seus dados pessoais para o cadastro em nossa plataforma, que nos permite lhe prestar nossos serviços. Para mais informações, acesse nosso
                    <a href="termosDePrivacidade.html">Aviso de Privacidade</a>.
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
            
            <div class="form-links">
                <a href="Login.php">Já tem uma conta? Faça login!</a>
            </div>
            
        </main>
    </div>

    <script>
        $(document).ready(function() {
            // ========================================================
            // 1. APLICAÇÃO DE MÁSCARAS
            // ========================================================
            
            // Máscara de Telefone com 9 dígitos (opcional para o 9º)
            // Pattern: (99) 9999-9999 ou (99) 99999-9999
            $('#telefone').mask('(00) 00000-0000');

            // Máscara de CPF
            $('#cpf').mask('000.000.000-00');

            // Máscara de Data de Nascimento (DD/MM/AAAA)
            $('#dt_nasc').mask('00/00/0000');


            // ========================================================
            // 2. FUNÇÕES DE VALIDAÇÃO
            // ========================================================

            /**
             * Função para exibir feedback de erro
             * @param {string} inputId - O ID do input ('#email', '#cpf', etc.)
             * @param {string} message - A mensagem de erro a ser exibida.
             */
            function setFeedback(inputId, message) {
                const $input = $(inputId);
                const $errorText = $('#error-' + $input.attr('id'));

                if (message) {
                    $input.addClass('invalid');
                    $errorText.text(message).show();
                    return false;
                } else {
                    $input.removeClass('invalid');
                    $errorText.text('').hide();
                    return true;
                }
            }

            /**
             * Validação de Data de Nascimento: Checa formato e idade mínima (18 anos)
             */
            function validateDate() {
                const dateString = $('#dt_nasc').val();
                let isValid = true;
                let message = '';

                // Remove máscara para validação
                const parts = dateString.split('/');
                if (parts.length === 3) {
                    const day = parseInt(parts[0], 10);
                    const month = parseInt(parts[1], 10);
                    const year = parseInt(parts[2], 10);
                    
                    const date = new Date(year, month - 1, day);
                    const today = new Date();
                    const ageLimit = new Date();
                    ageLimit.setFullYear(today.getFullYear() - 18);

                    if (date > today || date > ageLimit || date.getFullYear() < 1900 || date.getDate() !== day || date.getMonth() !== month - 1 || isNaN(date.getTime())) {
                        message = 'Data inválida ou idade mínima não atingida (18 anos).';
                        isValid = false;
                    }

                } else if (dateString.length > 0 && dateString.length < 10) {
                    message = 'Formato de data incompleto (DD/MM/AAAA).';
                    isValid = false;
                }

                setFeedback('#dt_nasc', message);
                return isValid;
            }

            /**
             * Validação simples de CPF (Apenas checa a máscara completa)
             */
            function validateCPF() {
                const cpfValue = $('#cpf').val();
                let isValid = true;
                let message = '';
                
                // Checa se a string está completa com a máscara
                if (cpfValue.length > 0 && cpfValue.length < 13) {
                    message = 'CPF incompleto. O formato correto é 999.999.999-9.';
                    isValid = false;
                }
                
                // Nota: A validação matemática (dígito verificador) deve ser feita
                // principalmente no back-end para segurança.

                setFeedback('#cpf', message);
                return isValid;
            }

            /**
             * Validação de Telefone: Checa se tem o número mínimo de dígitos
             */
            function validatePhone() {
                // Remove a máscara para contar apenas os números
                const phoneValue = $('#telefone').cleanVal(); 
                let isValid = true;
                let message = '';

                // Telefone deve ter 10 ou 11 dígitos (incluindo DDD)
                if (phoneValue.length > 0 && phoneValue.length < 10) {
                    message = 'Telefone incompleto. Ex: (XX) XXXXX-XXXX.';
                    isValid = false;
                }

                setFeedback('#telefone', message);
                return isValid;
            }
            
            /**
             * Validação de Senha
             */
            function validatePassword() {
                const password = $('#senha').val();
                let isValid = true;
                let message = '';

                if (password.length > 0 && password.length < 6) {
                    message = 'A senha deve ter no mínimo 6 caracteres.';
                    isValid = false;
                }

                setFeedback('#senha', message);
                return isValid;
            }

            /**
             * Validação de Nome
             */
            function validateName() {
                const name = $('#nome').val().trim();
                let isValid = true;
                let message = '';

                if (name.length > 0 && name.length < 3) {
                    message = 'O nome deve ter no mínimo 3 caracteres.';
                    isValid = false;
                }

                setFeedback('#nome', message);
                return isValid;
            }

            // ========================================================
            // 3. EVENT LISTENERS PARA VALIDAÇÃO EM TEMPO REAL (oninput/onchange)
            // ========================================================
            $('#nome').on('input', validateName);
            $('#senha').on('input', validatePassword);
            $('#dt_nasc').on('change', validateDate); // change é melhor para datas após a máscara
            $('#cpf').on('change', validateCPF); 
            $('#telefone').on('change', validatePhone); 
            
            // Validação de E-mail (o HTML5 já faz a validação básica no type="email")
            $('#email').on('input', function() {
                const emailInput = $(this);
                if (emailInput[0].validity.typeMismatch) {
                    setFeedback('#email', 'Por favor, insira um endereço de e-mail válido.');
                } else {
                    setFeedback('#email', '');
                }
            });


            // ========================================================
            // 4. VALIDAÇÃO FINAL NO SUBMIT DO FORMULÁRIO
            // ========================================================
            $('#cadastroForm').on('submit', function(event) {
                // Executa todas as validações finais e acumula o resultado
                const isNameValid = validateName();
                const isEmailValid = setFeedback('#email', $('#email')[0].validity.typeMismatch ? 'Por favor, insira um endereço de e-mail válido.' : '');
                const isPasswordValid = validatePassword();
                const isCPFValid = validateCPF();
                const isDateValid = validateDate();
                const isPhoneValid = validatePhone();

                // Se qualquer validação falhar, impede o envio do formulário
                if (!isNameValid || !isEmailValid || !isPasswordValid || !isCPFValid || !isDateValid || !isPhoneValid) {
                    event.preventDefault();
                    
                    // Rola a tela para o primeiro erro encontrado (melhor UX)
                    const firstError = $('.invalid').first();
                    if (firstError.length) {
                        $('html, body').animate({
                            scrollTop: firstError.offset().top - 50
                        }, 500);
                    }
                    alert('Por favor, corrija os erros do formulário antes de enviar.');
                    return false;
                }
                
                // Antes de enviar, remove a máscara para garantir que o PHP receba apenas números puros (para CPF e Telefone)
                // A data já está no formato DD/MM/AAAA para o back-end
                $('#telefone').val($('#telefone').cleanVal());
                $('#cpf').val($('#cpf').cleanVal());
            });
        });
    </script>
    </body>
</html>

