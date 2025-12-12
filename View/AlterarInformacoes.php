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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


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
                        <small class="error-text" id="error-cpf"></small>
                    </div>

                    <div class="form-group">
                        <label for="nome">Nome completo</label>
                        <input type="text" id="nome" name="Nome" value="<?php echo htmlspecialchars($Nome ?? '') ?>" placeholder="Digite seu nome completo" required>
                        <small class="error-text" id="error-nome"></small>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="Email" value="<?php echo htmlspecialchars($Email ?? '') ?>" placeholder="Ex: techFit@.com" required>
                        <small class="error-text" id="error-email"></small>
                    </div>

                    <div class="form-group phone-group">
                        <label for="telefone">DDD + Celular</label>
                        <div class="phone-input-wrapper">
                            <input type="tel" id="telefone" name="Telefone" value="<?php echo htmlspecialchars($Telefone ?? '') ?>" placeholder="(19) 12345-6789" required>
                        </div>
                        <small class="error-text" id="error-telefone"></small>
                    </div>

                    <div class="form-group">
                        <label for="data_nascimento">Data de nascimento</label>
                        <input onfocus="MudarTipo()" type="text" id="dt_nasc" name="Dt_nasc" value="<?php echo htmlspecialchars($Dt_nasc ?? '') ?>" placeholder="__/__/____" required>
                        <small class="error-text" id="error-dt_nasc"></small>
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