<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFit - Agendar Aula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <style>
     
        :root {
            --cor-primaria: #000000; /* Preto */
            --cor-secundaria: #ffcc00; /* Amarelo (Logo/Botões) */
            --cor-texto-claro: #ffffff;
            --cor-texto-escuro: #333333;
            --cor-fundo-claro: #f8f9fa;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--cor-fundo-claro);
            color: var(--cor-texto-escuro);
        }

        
    /* --- Cabeçalho e Navegação --- */
    .navbar {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
        background-color: var(--text-color);
        /* Fundo do Header: PRETO SÓLIDO */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        /* Sombra Escura no Header */
    }

    .navbar-brand {
        font-size: 1.8rem;
        font-weight: bold;
        color: var(--logo-light);
        /* Cor padrão para a logo: Branco */
        position: relative;
    }

    .navbar-brand::after {
        content: none;
        display: none;
    }

    .navbar-brand .logo-highlight {
        color: var(--primary-color);
    }

        .logo-techfit-text {
            font-size: 1.8rem;
            font-weight: bold;
            text-decoration: none;
            color: var(--cor-texto-claro) !important;
        }
        
        .logo-techfit-text .fit {
            color: var(--cor-secundaria);
        }

        .navbar-nav .nav-link {
            color: var(--cor-texto-claro);
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: var(--cor-secundaria);
        }

        .btn-busca-academia, .btn-escolha-academia {
            background-color: var(--cor-secundaria);
            color: var(--cor-primaria) !important;
            padding: 8px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
            border: none; /* Adicionado para ser um botão padrão */
        }

        .btn-busca-academia:hover, .btn-escolha-academia:hover {
            background-color: #ff9900; /* Amarelo um pouco mais escuro no hover */
        }

        /* --- Main / Card de Agendamento --- */
        .agendamento-card {
            background-color: var(--cor-texto-claro);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .agendamento-card h2 {
            color: var(--cor-primaria);
            font-weight: 700;
        }

        .agendamento-card .form-label {
            font-weight: 600;
            color: var(--cor-texto-escuro);
        }

        /* Estilo para os horários/turmas (Botões/Badges) */
        .horario-badge {
            background-color: #eee;
            color: var(--cor-primaria);
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            border: 1px solid #ccc;
            font-weight: bold;
        }

        .horario-badge:hover {
            background-color: #ddd;
        }

        .horario-badge.selected {
            background-color: var(--cor-secundaria);
            color: var(--cor-primaria);
            border: 1px solid var(--cor-primaria);
        }
        
        .horario-badge.esgotado {
            background-color: #dc3545; /* Vermelho Bootstrap */
            color: var(--cor-texto-claro);
            cursor: not-allowed;
            opacity: 0.6;
            border: 1px solid #dc3545;
        }


        /* --- Footer --- */
        footer {
            background-color: var(--cor-primaria);
            color: var(--cor-texto-claro);
            padding: 30px 0;
            margin-top: 50px;
            font-size: 0.9em;
        }
        
        footer h4 {
            color: var(--cor-secundaria);
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        footer p {
            margin-bottom: 5px;
            line-height: 1.5;
        }

        footer .bi {
            font-size: 1.5rem;
            margin-right: 15px;
            color: var(--cor-texto-claro);
            transition: color 0.3s;
        }
        
        footer .bi:hover {
            color: var(--cor-secundaria);
        }
        
        /* Ajuste do Email para cor da marca */
        footer p:last-child {
            color: var(--cor-secundaria);
        }

        /* Responsividade básica para o Footer */
        @media (max-width: 768px) {
            footer .container {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            footer > div > div {
                margin-bottom: 20px;
            }
        }
    </style>


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
                { horario: '20:00', vagas: 6, capacidade: 10 } 
            ],
            'musculacao': [
                { horario: '06:00 - 08:00', vagas: 99, capacidade: 100 },
                { horario: '18:00 - 20:00', vagas: 2, capacidade: 50 } 
            ]
        };

        let horarioSelecionado = null;
        let tipoAulaSelecionada = null;
        let dataAulaSelecionada = null;
        
        document.addEventListener('DOMContentLoaded', () => {
            const tipoAulaSelect = document.getElementById('tipoAula');
            const dataAulaInput = document.getElementById('dataAula');
            const horariosContainer = document.getElementById('horariosContainer');
            const btnAgendar = document.getElementById('btnAgendar');
            const mensagemStatus = document.getElementById('mensagemStatus');

            // --- 1. Event Listeners ---
            tipoAulaSelect.addEventListener('change', atualizarHorarios);
            dataAulaInput.addEventListener('change', atualizarHorarios);
            document.getElementById('agendamentoForm').addEventListener('submit', confirmarAgendamento);

            // --- 2. Função de Atualização de Horários ---
            function atualizarHorarios() {
                tipoAulaSelecionada = tipoAulaSelect.value;
                dataAulaSelecionada = dataAulaInput.value;
                horarioSelecionado = null; // Reseta seleção
                
                // Desabilita o botão até que um horário seja clicado
                btnAgendar.disabled = true;

                if (!tipoAulaSelecionada || !dataAulaSelecionada) {
                    horariosContainer.innerHTML = `
                        <div class="alert alert-info w-100" role="alert">
                            Selecione uma modalidade e uma data para ver os horários.
                        </div>`;
                    mensagemStatus.innerHTML = '';
                    return;
                }

                const turmas = turmasDisponiveis[tipoAulaSelecionada] || [];
                horariosContainer.innerHTML = ''; // Limpa o container

                if (turmas.length === 0) {
                     horariosContainer.innerHTML = `
                        <div class="alert alert-warning w-100" role="alert">
                            Nenhum horário disponível para esta modalidade na data selecionada.
                        </div>`;
                    return;
                }
                
                // Renderiza os horários
                turmas.forEach((turma) => {
                    const esgotado = turma.vagas <= 0;
                    const vagasTexto = esgotado ? 'ESGOTADO' : `${turma.vagas} vagas`;
                    
                    const badge = document.createElement('div');
                    badge.className = `horario-badge ${esgotado ? 'esgotado' : 'clickable'}`;
                    badge.textContent = `${turma.horario} (${vagasTexto})`;
                    
                    // Adiciona o Evento de Clique APENAS se não estiver esgotado
                    if (!esgotado) {
                        badge.addEventListener('click', () => selecionarHorario(turma.horario, badge, turma.vagas));
                    }

                    horariosContainer.appendChild(badge);
                });
            }

            // --- 3. Função de Seleção de Horário ---
            function selecionarHorario(horario, elementoClicado, vagas) {
                // 1. Desmarca o elemento anteriormente selecionado
                document.querySelectorAll('.horario-badge.selected').forEach(badge => {
                    badge.classList.remove('selected');
                });
                
                // 2. Marca o novo elemento
                elementoClicado.classList.add('selected');
                horarioSelecionado = horario;
                
                // 3. Habilita o botão e mostra status
                btnAgendar.disabled = false;
                mensagemStatus.innerHTML = `
                    <div class="alert alert-success" role="alert">
                        Horário ${horario} selecionado. Restam ${vagas} vagas.
                    </div>`;
            }

            // --- 4. Função de Confirmação de Agendamento (ALTERADA AQUI) ---
            function confirmarAgendamento(e) {
                e.preventDefault();
                
                if (!horarioSelecionado || !tipoAulaSelecionada || !dataAulaSelecionada) {
                    mensagemStatus.innerHTML = '<div class="alert alert-danger" role="alert">Selecione uma aula e horário válidos.</div>';
                    return;
                }
                
                const turma = turmasDisponiveis[tipoAulaSelecionada].find(t => t.horario === horarioSelecionado);

                // Lógica de Agendamento e Lista de Espera
                if (turma.vagas > 0) {
                    // Simula a redução de vagas
                    turma.vagas--; 
                    
                    // Mensagem de sucesso antes de redirecionar
                    mensagemStatus.innerHTML = `
                        <div class="alert alert-success" role="alert">
                            ✅ Agendamento de ${tipoAulaSelecionada} às ${horarioSelecionado} em ${dataAulaSelecionada} confirmado! Redirecionando para o QR Code...
                        </div>`;
                    
                    // ** REDIRECIONAMENTO PARA A PÁGINA QR CODE **
                    setTimeout(() => {
                        window.location.href = 'controle.html'; 
                    }, 1500); // Espera 1.5s para o usuário ver a mensagem

                } else {
                    // Lógica de Lista de Espera (Apenas mensagem, não redireciona)
                    mensagemStatus.innerHTML = `
                        <div class="alert alert-warning" role="alert">
                            ⏳ A turma de ${tipoAulaSelecionada} às ${horarioSelecionado} está cheia. Você foi adicionado(a) à **Lista de Espera**.
                        </div>`;
                }
                
                // Re-habilita/desabilita componentes
                btnAgendar.disabled = true;
                horarioSelecionado = null; 
                atualizarHorarios(); // Atualiza a lista para mostrar a redução de vagas
            }
        });
    </script>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><span class="logo-highlight">TECH FIT</span></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="Detalhes.php">Planos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="Agendar.php">Agendar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="Sobre.php">Sobre nós</a>
                        </li>
                        <li class="nav-item ms-lg-3">
                            <div class="dropdown">

                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="Perfil.php">Minhas Informações</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li>
                                        <form action="../Controller/LoginController.php" method="POST" class="d-inline">
                                            <input type="hidden" name="acao" value="sair">
                                            <button type="submit" class="dropdown-item sair-link">
                                                <i class="bi bi-box-arrow-right me-2"></i> Sair
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ms-lg-2">

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="agendamento-card shadow p-4 p-md-5">
                    <h2 class="text-center mb-4">Agendamento de Aulas <i class="bi bi-calendar-check"></i></h2>
                    
                    <form id="agendamentoForm">
                        <div class="mb-3">
                            <label for="tipoAula" class="form-label">Selecione a Modalidade (Turma):</label>
                            <select class="form-select" id="tipoAula" required>
                                <option value="">Escolha uma aula...</option>
                                <option value="zumba">Zumba (Turma)</option>
                                <option value="funcional">Treinamento Funcional (Turma)</option>
                                <option value="yoga">Yoga (Turma)</option>
                                <option value="musculacao">Musculação (Livre)</option>
                            </select>
                        </div>
                        
                        <div class="mb-5">
                            <label for="dataAula" class="form-label">Selecione a Data:</label>
                            <input type="date" class="form-control" id="dataAula" required>
                        </div>
                        
                        <h4 class="mb-3">Horários Disponíveis:</h4>
                        <div id="horariosContainer" class="d-flex flex-wrap gap-2 mb-4">
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
                <p>Email: TechFit@com</p>
            </div>
            <div class="text-center">
                <h4>Redes Sociais</h4>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-twitter-x"></i>
                <i class="bi bi-facebook"></i>
                <i class="bi bi-linkedin"></i>
            </div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>