<?php

require_once "../Controller/ClienteController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Id_cliente = $_POST["Id_cliente"] ?? null; 
    $Senha = $_POST["Senha"] ?? null; // A senha já está validada para ser igual à confirmação pelo JS

    if($_POST['acao'] == "updateSenha"){
                $controller = new ClienteController();
                $controller->AlterarSenha($Id_cliente, $Senha);
    }                
}

// Nota: O valor de $Id_cliente precisa ser definido aqui para ser usado no formulário.
// Assumindo que este valor viria de uma sessão ou parâmetro GET se fosse uma página real.
// Para manter o contexto do código original:

// Se $Id_cliente não foi definido no POST, define como null ou outra lógica.
if (!isset($Id_cliente)) {
    // Lógica de como o Id_cliente é obtido (ex: da sessão de login)
    // Para fins de demonstração, mantemos como null se não vier no POST inicial.
    $Id_cliente = null; 
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Alterar Senha - TECHFIT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/AlterarSenha.css"> 
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head>
<body>
    <div class="split-screen-container">

        <div class="right-section">
            <div class="form-wrapper">
                <h2 class="form-title">Alterar senha</h2>

                <form action="AlterarSenha.php" method="post" id="alterarSenhaForm"> <input type="hidden" name="acao" value="updateSenha">
                    <input type="hidden" name="Id_cliente" value="<?php echo htmlspecialchars($Id_cliente)?>">
                    <p id="feedback-message" class="message" style="display:none; text-align: center; margin-bottom: 20px;"></p>

                    <div class="form-group">
                        <label for="senha">Nova Senha</label>
                        <input type="password" id="senha" name="Senha" placeholder="Digite sua nova senha" required>
                        <small class="error-text" id="error-senha"></small>
                    </div>

                    <div class="form-group">
                        <label for="confirmaSenha">Confirmar Senha</label>
                        <input type="password" id="confirmaSenha" name="ConfirmaSenha" placeholder="Confirme sua nova senha" required>
                        <small class="error-text" id="error-confirmaSenha"></small>
                    </div>
                    <button type="submit" class="submit-button btn btn-primary">
                        Alterar
                    </button>

                </form>
            </div>
        </div>
    </div>
    

     <script>
    
    // Função MudarTipo não é relevante aqui, pode ser removida se não for usada.
    /*
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
    */

        $(document).ready(function() {
            /**
             * Função para exibir feedback de erro
             * @param {string} inputId - O ID do input ('#email', '#cpf', etc.)
             * @param {string} message - A mensagem de erro a ser exibida.
             */
            function setFeedback(inputId, message) {
                const $input = $(inputId);
                // Ajuste no seletor para usar o ID do input (sem o '#')
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

            // ========================================================
            // 1. VALIDAÇÃO DA SENHA (Mínimo 6 caracteres)
            // ========================================================
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

            // ========================================================
            // 2. VALIDAÇÃO DA CONFIRMAÇÃO DE SENHA
            // ========================================================
            function validatePasswordConfirmation() {
                const password = $('#senha').val();
                const confirmation = $('#confirmaSenha').val();
                let isValid = true;
                let message = '';

                if (confirmation.length > 0 && password !== confirmation) {
                    message = 'A confirmação de senha não confere.';
                    isValid = false;
                } else if (confirmation.length === 0 && password.length > 0) {
                    message = 'Por favor, confirme a senha.';
                    isValid = false;
                }

                setFeedback('#confirmaSenha', message);
                return isValid;
            }

            // ========================================================
            // 3. EVENT LISTENERS PARA VALIDAÇÃO EM TEMPO REAL (oninput/onchange)
            // ========================================================
            
            // Valida a senha e, se ela mudar, revalida a confirmação
            $('#senha').on('input', function() {
                validatePassword();
                // Força a revalidação da confirmação quando a senha principal muda
                if ($('#confirmaSenha').val().length > 0) {
                    validatePasswordConfirmation(); 
                }
            });

            // Valida apenas a confirmação
            $('#confirmaSenha').on('input', validatePasswordConfirmation);

            // ========================================================
            // 4. VALIDAÇÃO FINAL NO SUBMIT DO FORMULÁRIO
            // ========================================================
            // Alterado de #cadastroForm para #alterarSenhaForm
            $('#alterarSenhaForm').on('submit', function(event) {
                // Executa todas as validações finais e acumula o resultado
              
                // Garante que a validação do campo principal e da confirmação sejam executadas
                const isPasswordValid = validatePassword();
                const isConfirmationValid = validatePasswordConfirmation();


                // Se qualquer validação falhar, impede o envio do formulário
                if ( !isPasswordValid || !isConfirmationValid) {
                    event.preventDefault();
                    
                    // Rola a tela para o primeiro erro encontrado (melhor UX)
                    const firstError = $('.invalid').first();
                    if (firstError.length) {
                        $('html, body').animate({
                            scrollTop: firstError.offset().top - 50
                        }, 500);
                    }
                    
                    // Mensagem de alerta mais precisa
                    alert('Por favor, corrija os erros de validação da senha antes de enviar.');
                    return false;
                }
                
                // Remove partes desnecessárias (máscara de CPF/Telefone) do código original.
                // Este arquivo é apenas para Alterar Senha.
            });
        });

    </script>
</body>
</html>