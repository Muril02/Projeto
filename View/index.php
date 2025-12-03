<?php
require_once "../Controller/LoginController.php";
require_once "../Model/LoginModel.php";

    if(!isset($_SESSION['IdUsuario'])){
        header("Location: /Login.php");
        exit;
    }

    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/CSS/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>TechFit - Home</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">TECH<span class="logo-highlight">FIT</span></a> 
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="Detralhes.php">Planos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Agendar.php">Agendar </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Sobre.php">Sobre nós</a>
                        </li>
                        <li class="nav-item ms-lg-3">
                            <a href="Perfil.php" class="btn-busca-academia">Meu Perfil</a>
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
                    <h1>
                        É pra dançar, é pra funcional, é pra tudo. É TechFit
                    </h1>
                    <p>
                        Um montão de aulas e treinos exclusivos, pra você encontrar qual o seu jeito de ser Fit.
                    </p>
                    <a href="Detralhes.html" class="btn-escolha-academia">Conheça nossos planos</a>
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
                    <h4><strong>Treino Funcional e Musculação: </strong></h4>
                    <p>
                        Sessões planejadas para desenvolver força, resistência e flexibilidade
                    </p>
                </div>
            </div>

            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-12 content-text mb-4 mb-lg-0 order-lg-1">
                    <h4><strong>Aulas que combinam ritmo e exercícios físicos, proporcionando queima de calorias de forma divertida.</strong></h4>
                    <p>
                        Aulas que combinam ritmo e exercícios físicos,
                        promovendo queima de calorias de forma
                        divertida.
                    </p>
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
                    <div class="card-title text-center">Dança</div>
                    <div class="card-body text-center">
                        <p>Horário</p>
                        <p>18h-19h</p>
                        <p>Professor Bruno</p>
                    </div>
                </div>
                <div class="card-turmas col-lg-3 col-md-5 col-sm-10 shadow">
                    <div class="card-title text-center">Dança</div>
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
                    <p class="card-text">
                        Evoluí muito em coordenação e condicionamento. Os professores aqui nos dão um gás para superar nossos limites na dança.
                    </p>
                </div>
                <div class="card-depoimento col-lg-3 col-md-5 col-sm-10 shadow">
                    <h5 class="card-title">Jéssica</h5>
                    <p class="card-text">
                        Stiletto Dance com Ana "Encontrei uma nova confiança e força que eu nem sabia que tinha. A academia me faz sentir poderosa a cada passo.
                    </p>
                </div>
                <div class="card-depoimento col-lg-3 col-md-5 col-sm-10 shadow">
                    <h5 class="card-title">Carla</h5>
                    <p class="card-text">
                        A energia da Carla é contagiante! Ela comanda a sala com os melhores hits, transformando o treino em uma verdadeira celebração.
                    </p>
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
                        <a href="Detralhes.html" class="btn-valor">Valor</a>
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
                        <a href="Detralhes.html" class="btn-valor">Valor</a>
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
                        <a href="Detralhes.php" class="btn-valor">Valor</a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="Detralhes.php" class="btn-detalhes">Ver detalhes</a>
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
                
                <div class="col-md-4 text-center d-none d-md-block">
                    </div>
            </div>
            
            <div class="text-center mt-4">
                 <p>&copy; 2025 TechFit. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>