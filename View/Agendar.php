<?php
session_start();
require_once "../Controller/LoginController.php";
require_once "../Model/LoginModel.php";
require_once "../Controller/ClienteController.php"; 

// Bloco de lógica PHP para exibir o nome do usuário no botão, copiado de index.php
$nome_usuario = "Minha Conta"; // Texto padrão
if (isset($_SESSION['IdUsuario'])) {
    $controller = new ClienteController();
    $cliente = $controller->ListarClientePorId($_SESSION['IdUsuario']); // Assumindo este método existe

    if ($cliente && isset($cliente['nome'])) {
        // Pega apenas o primeiro nome para exibir no botão
        $nome_completo = $cliente['nome'];
        $nome_usuario = explode(' ', trim($nome_completo))[0];
    } else {
        $nome_usuario = "Usuário";
    }
}
// Fim do bloco de lógica PHP
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFit - Agendar Aula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/Agendar.css">

</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <span class="logo-highlight">TECH FIT</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="Detalhes.php">Planos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="Agendar.php">Agendar</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="Sobre.php">Sobre</a>
                        </li>

                        <?php if (isset($_SESSION['IdUsuario'])): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle custom-account-button" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle me-1"></i> <?php echo htmlspecialchars($nome_usuario); ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="Perfil.php">Meu Perfil</a></li>
                                    
                                    <li>
                                        <form action="../Controller/LoginController.php" method="post" class="d-inline">
                                            <input type="hidden" name="acao" value="sair">
                                            <button type="submit" class="dropdown-item sair-link">Sair</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                       
                        <?php endif; ?>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card p-4 shadow-lg">
                    <h2 class="card-title text-center mb-4">Agendamento de Aulas</h2>

                    <form id="agendamentoForm" action="../Controller/AgendamentoController.php" method="POST">
                        <input type="hidden" name="acao" value="agendarAula">
                        <input type="hidden" name="id_cliente" value="<?php echo htmlspecialchars($_SESSION['IdUsuario'] ?? ''); ?>">

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="id_academia" class="form-label">Academia</label>
                                <select class="form-select" id="id_academia" name="id_academia" required>
                                    <option value="">Selecione a Academia</option>
                                    <option value="1">TechFit - Campinas</option>
                                    <option value="2">TechFit - São Paulo</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="modalidade" class="form-label">Modalidade</label>
                                <select class="form-select" id="modalidade" name="modalidade" required>
                                    <option value="">Selecione a Modalidade</option>
                                    <option value="zumba">Zumba</option>
                                    <option value="funcional">Treinamento Funcional</option>
                                    <option value="yoga">Yoga</option>
                                    <option value="spinning">Spinning</option>
                                    </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="data_aula" class="form-label">Data da Aula</label>
                            <input type="date" class="form-control" id="data_aula" name="data_aula" required>
                        </div>
                        
                        <h4 class="mb-3">Horários Disponíveis</h4>
                        <div id="horariosDisponiveis" class="d-flex flex-wrap gap-2 mb-4">
                            <div class="alert alert-info w-100" role="alert">
                                Selecione uma modalidade e uma data para ver os horários.
                            </div>
                        </div>

                        <div id="mensagemStatus" class="mt-4 text-center">
                            </div>
                        
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn-escolha-academia" id="btnAgendar" disabled>
                                Confirmar Agendamento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container d-flex justify-content-evenly align-items-start">
            <div>
                <h4>Contato</h4>
                <p>Telefone: (19) 4002-8922</p>
                <p>Email: <a href="mailto:techfit@gmail.com">TechFit@gmail.com</a></p>
            </div>
            <div class="text-center">
                <h4>Redes Sociais</h4>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
        <div class="text-center mt-4">
            <p>&copy; 2025 TechFit. Todos os direitos reservados.</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simulação de vagas e horários
        const turmasDisponiveis = {
            'zumba': [
                { horario: '08:00', vagas: 10, capacidade: 10 },
                { horario: '19:00', vagas: 0, capacidade: 15 } // Esgotado
            ],
            'funcional': [
                { horario: '12:00', vagas: 5, capacidade: 8 },
                { horario: '18:00', vagas: 1, capacidade: 10 }
            ],
            'yoga': [
                { horario: '10:00', vagas: 8, capacidade: 8 }, 
                { horario: '20:00', vagas: 6, capacidade: 12 }
            ],
             'spinning': [
                { horario: '07:00', vagas: 2, capacidade: 10 }, 
                { horario: '17:30', vagas: 10, capacidade: 10 }
            ],
        };

        const modalidadeSelect = document.getElementById('modalidade');
        const dataAulaInput = document.getElementById('data_aula');
        const horariosDiv = document.getElementById('horariosDisponiveis');
        const btnAgendar = document.getElementById('btnAgendar');
        const form = document.getElementById('agendamentoForm');
        const mensagemStatus = document.getElementById('mensagemStatus');
        let selectedHorario = null;
        
        // Função para formatar a data (opcional, para exibir no status)
        function formatarData(dataString) {
            const [year, month, day] = dataString.split('-');
            return `${day}/${month}/${year}`;
        }

        // Função para renderizar os botões de horário
        function renderHorarios() {
            const modalidade = modalidadeSelect.value;
            const data = dataAulaInput.value;
            
            horariosDiv.innerHTML = '';
            btnAgendar.disabled = true;
            mensagemStatus.innerHTML = '';

            if (!modalidade || !data) {
                horariosDiv.innerHTML = `<div class="alert alert-info w-100" role="alert">Selecione uma modalidade e uma data.</div>`;
                return;
            }

            const horarios = turmasDisponiveis[modalidade];

            if (!horarios || horarios.length === 0) {
                horariosDiv.innerHTML = `<div class="alert alert-warning w-100" role="alert">Nenhum horário disponível para ${modalidade} nesta data.</div>`;
                return;
            }

            horarios.forEach(turma => {
                const btn = document.createElement('button');
                const isEsgotado = turma.vagas <= 0;
                
                btn.type = 'button';
                btn.className = `btn btn-horario ${isEsgotado ? 'btn-danger-custom' : 'btn-success-custom'}`;
                btn.dataset.horario = turma.horario;
                btn.disabled = isEsgotado;
                btn.innerHTML = `
                    ${turma.horario} 
                    <span class="badge text-bg-light">${isEsgotado ? 'Esgotado' : `${turma.vagas} Vagas`}</span>
                `;

                if (!isEsgotado) {
                    btn.addEventListener('click', () => {
                        // Limpa seleção anterior
                        document.querySelectorAll('.btn-horario.selected').forEach(b => b.classList.remove('selected'));
                        
                        // Define nova seleção
                        btn.classList.add('selected');
                        selectedHorario = turma.horario;
                        btnAgendar.disabled = false;
                        updateStatusMessage();
                    });
                }
                
                horariosDiv.appendChild(btn);
            });
            
            // Se já havia um horário selecionado antes de renderizar, tenta mantê-lo
            if (selectedHorario) {
                const reselect = document.querySelector(`.btn-horario[data-horario="${selectedHorario}"]`);
                if (reselect && !reselect.disabled) {
                    reselect.classList.add('selected');
                    btnAgendar.disabled = false;
                    updateStatusMessage();
                } else {
                    selectedHorario = null;
                }
            }
        }

        function updateStatusMessage() {
            if (selectedHorario) {
                const modalidadeTexto = modalidadeSelect.options[modalidadeSelect.selectedIndex].text;
                const dataFormatada = formatarData(dataAulaInput.value);
                mensagemStatus.innerHTML = `
                    <div class="alert alert-success" role="alert">
                        Aula selecionada: <strong>${modalidadeTexto}</strong> em <strong>${dataFormatada}</strong> às <strong>${selectedHorario}</strong>.
                    </div>
                `;
            } else {
                 mensagemStatus.innerHTML = '';
            }
        }
        
        // Event listeners
        modalidadeSelect.addEventListener('change', renderHorarios);
        dataAulaInput.addEventListener('change', renderHorarios);
        
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            if (!selectedHorario) {
                alert('Por favor, selecione um horário para agendar.');
                return;
            }
            
            // Adiciona o horário selecionado como campo oculto
            const inputHorario = document.createElement('input');
            inputHorario.type = 'hidden';
            inputHorario.name = 'horario_aula';
            inputHorario.value = selectedHorario;
            form.appendChild(inputHorario);
            
            // Simula o envio
            mensagemStatus.innerHTML = `
                 <div class="alert alert-success" role="alert">
                     Agendamento de ${modalidadeSelect.options[modalidadeSelect.selectedIndex].text} para ${formatarData(dataAulaInput.value)} às ${selectedHorario} confirmado!
                 </div>
            `;
            btnAgendar.disabled = true; // Desabilita após simular o envio
            
            // Aqui você enviaria o formulário via AJAX ou `form.submit()`
            // form.submit();
        });
        
        // Inicializa a data mínima para hoje
        const today = new Date().toISOString().split('T')[0];
        dataAulaInput.setAttribute('min', today);

        // Renderiza a primeira vez (mostrar a mensagem inicial)
        renderHorarios();

    </script>
</body>
</html>