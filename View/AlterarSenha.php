<?php

require_once "../Controller/ClienteController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Id_cliente = $_POST["Id_cliente"] ?? null; 
    $Senha = $_POST["Senha"] ?? null;

    if($_POST['acao'] == "updateSenha"){
                $controller = new ClienteController();
                $controller->AlterarSenha($Id_cliente, $Senha);
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
    <link rel="stylesheet" href="CSS/AlterarSenha.css"> 
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head>
<body>
    <div class="split-screen-container">

        <div class="right-section">
            <div class="form-wrapper">
                <h2 class="form-title">Alterar senha</h2>

                <form action="AlterarSenha.php" method="post">
                    <input type="hidden" name="acao" value="updateSenha">
                    <input type="hidden" name="Id_cliente" value="<?php echo $Id_cliente?>">
                    <p id="feedback-message" class="message" style="display:none; text-align: center; margin-bottom: 20px;"></p>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="Senha" placeholder="Digite sua senha nova" required>
                        <small class="error-text" id="error-senha"></small>
                    </div>

                    <button type="submit" class="submit-button btn btn-primary">
                        Alterar
                    </button>

                </form>
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

        $(document).ready(function() {
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
            // 3. EVENT LISTENERS PARA VALIDAÇÃO EM TEMPO REAL (oninput/onchange)
            // ========================================================
            
            $('#senha').on('input', validatePassword);

            // ========================================================
            // 4. VALIDAÇÃO FINAL NO SUBMIT DO FORMULÁRIO
            // ========================================================
            $('#cadastroForm').on('submit', function(event) {
                // Executa todas as validações finais e acumula o resultado
              
              
                const isPasswordValid = validatePassword();

                // Se qualquer validação falhar, impede o envio do formulário
                if ( !isPasswordValid) {
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

