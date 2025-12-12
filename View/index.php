<?php
session_start();
require_once "../Controller/LoginController.php";
require_once "../Model/LoginModel.php";
require_once "../Controller/ClienteController.php"; // Certifique-se de incluir o ClienteController.php


if (!isset($_SESSION['IdUsuario'])) {
    // ... lógica de redirecionamento se não estiver logado ...
    $_SESSION['mensagem_erro'] = "Você precisa fazer login para acessar esta página.";
    header("Location: Login.php");
    exit();
}


$nome_usuario = "Minha Conta"; // Texto padrão
if (isset($_SESSION['IdUsuario'])) {
    $controller = new ClienteController();
    $cliente = $controller->ListarClientePorId($_SESSION['IdUsuario']); // Usa o método de busca por ID

    if ($cliente && isset($cliente['nome'])) {
        // Pega apenas o primeiro nome para exibir no botão
        $nome_completo = $cliente['nome'];
        $nome_usuario = explode(' ', trim($nome_completo))[0];
    } else {
        $nome_usuario = "Usuário";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>TechFit - Home</title>
</head>

<body>
    <?php if (isset($_SESSION['mensagem_sucesso'])): ?>
        <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3" role="alert" style="z-index: 9999; min-width: 300px;">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?php
            echo htmlspecialchars($_SESSION['mensagem_sucesso']);
            unset($_SESSION['mensagem_sucesso']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

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
                                <button class="btn btn-warning custom-account-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle me-2"></i> Conta
                                </button>

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

    <main>
        <div class="container hero-section">
            <div class="row w-100">
                <div class="col-lg-6 col-md-12 hero-text">
                    <h1>É pra dançar, é pra funcional, é pra tudo. É TechFit</h1>
                    <p>Um montão de aulas e treinos exclusivos, pra você encontrar qual o seu jeito de ser Fit.</p>
                    <a href="Detalhes.php" class="btn-escolha-academia">Conheça nossos planos</a>
                </div>
                <div class="col-lg-6 d-none d-lg-block"></div>
            </div>
        </div>

        <div class="img-principal-wrapper">
            <img src="Img/treinando.avif" alt="Homem fazendo agachamento com saco de areia" class="img-principal">
        </div>

        <a href="https://wa.me/" class="whatsapp-icon" target="_blank">
            <i class="bi bi-whatsapp"></i>
        </a>

        <div class="container content-section">
            <div class="row d-flex align-items-center mb-5">
                <div class="col-lg-6 col-md-12">
                    <img src="Img/musculação.png" alt="Máquinas de treino sob luz azul" class="img-fluid content-img-left shadow">
                </div>
                <div class="col-lg-6 col-md-12 content-text mt-4 mt-lg-0">
                    <h4><strong>Treino Funcional e Musculação:</strong></h4>
                    <p>Sessões planejadas para desenvolver força, resistência e flexibilidade</p>
                </div>
            </div>

            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-12 content-text mb-4 mb-lg-0 order-lg-1">
                    <h4><strong>Aulas que combinam ritmo e exercícios físicos</strong></h4>
                    <p>Aulas que combinam ritmo e exercícios físicos, promovendo queima de calorias de forma divertida.</p>
                </div>
                <div class="col-lg-6 col-md-12 order-lg-2">
                    <img src="Img/zumba.png" alt="Grupo de pessoas em aula de dança" class="img-fluid content-img-right shadow">
                </div>
            </div>
        </div>

        <div class="container section-turmas">
            <h3 class="text-center">Turmas</h3>
            <div class="row d-flex justify-content-evenly">
                <div class="card-turmas col-lg-3 col-md-5 col-sm-10 shadow">
                    <div class="card-title text-center">Dança</div>
                    <div class="card-body text-center">
                        <p>Horário</p>
                        <p>18h-19h</p>
                        <p>Professora Ana</p>
                    </div>
                </div>
                <div class="card-turmas col-lg-3 col-md-5 col-sm-10 shadow">
                    <div class="card-title text-center">Funcional</div>
                    <div class="card-body text-center">
                        <p>Horário</p>
                        <p>18h-19h</p>
                        <p>Professor Bruno</p>
                    </div>
                </div>
                <div class="card-turmas col-lg-3 col-md-5 col-sm-10 shadow">
                    <div class="card-title text-center">Zumba</div>
                    <div class="card-body text-center">
                        <p>Horário</p>
                        <p>18h-19h</p>
                        <p>Professora Carla</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="VerMais.php" class="btn-ver-mais">Ver mais</a>
            </div>
        </div>

        <div class="container section-historias">
            <h3 class="text-center">Histórias reais, Pessoas reais</h3>
            <div class="row d-flex justify-content-evenly">
                <div class="card-depoimento col-lg-3 col-md-5 col-sm-10 shadow">
                    <h5 class="card-title">Mariana</h5>
                    <p class="card-text">Evoluí muito em coordenação e condicionamento. Os professores aqui nos dão um gás para superar nossos limites na dança.</p>
                </div>
                <div class="card-depoimento col-lg-3 col-md-5 col-sm-10 shadow">
                    <h5 class="card-title">Jéssica</h5>
                    <p class="card-text">Encontrei uma nova confiança e força que eu nem sabia que tinha. A academia me faz sentir poderosa a cada passo.</p>
                </div>
                <div class="card-depoimento col-lg-3 col-md-5 col-sm-10 shadow">
                    <h5 class="card-title">Carla</h5>
                    <p class="card-text">A energia é contagiante! Ela comanda a sala com os melhores hits, transformando o treino em uma verdadeira celebração.</p>
                </div>
            </div>
        </div>

        <div class="container section-planos">
            <h3 class="text-center">Planos</h3>
            <div class="row d-flex justify-content-evenly">
                <div class="card-plano col-lg-3 col-md-5 col-sm-10 shadow">
                    <div class="card-title text-center">Básico</div>
                    <div class="card-body text-center">
                        <p>Musculação</p>
                        <p>Acesso em Horário Restrito</p>
                        <p>Avaliação Física Trimestral</p>
                    </div>
                    <div class="card-footer-custom">
                        <a href="Detalhes.php" class="btn-valor">Valor</a>
                    </div>
                </div>
                <div class="card-plano col-lg-3 col-md-5 col-sm-10 shadow">
                    <div class="card-title text-center">Avançado</div>
                    <div class="card-body text-center">
                        <p>Musculação + Aulas (Zumba, Funcional)</p>
                        <p>Acesso Ilimitado</p>
                        <p>Avaliação Física Mensal</p>
                    </div>
                    <div class="card-footer-custom">
                        <a href="Detalhes.php" class="btn-valor">Valor</a>
                    </div>
                </div>
                <div class="card-plano col-lg-3 col-md-5 col-sm-10 shadow">
                    <div class="card-title text-center">Pro</div>
                    <div class="card-body text-center">
                        <p>Tudo do Avançado + Personal</p>
                        <p>Acesso Ilimitado</p>
                        <p>Acompanhamento Nutricional</p>
                    </div>
                    <div class="card-footer-custom">
                        <a href="Detalhes.php" class="btn-valor">Valor</a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="Detalhes.php" class="btn-detalhes">Ver detalhes</a>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="row d-flex justify-content-between align-items-start">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h4>Contato</h4>
                    <p>Telefone: 19 4002-8922</p>
                    <p>Email: <a href="mailto:techfit@gmail.com">techfit@gmail.com</a></p>
                </div>

                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <h4>Redes Sociais</h4>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>

                <div class="col-md-4 text-center d-none d-md-block"></div>
            </div>

            <div class="text-center mt-4">
                <p>&copy; 2025 TechFit. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>

</html>