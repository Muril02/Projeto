<?php
require_once "../Controller/LoginController.php";
session_start();


    $teste = new LoginController();

    if(!isset($_SESSION['IdUsuario'])){
        header("Location: /Login.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>TechFit - Home</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">TechFit</a> 
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="Detralhes.html">Planos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="VerMais.html">Agendar </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="/View/Login.php">Entrar</a>
                        </li>
                             <li class="nav-item me-3">
                            <a class="nav-link" href="Sobre.html">Sobre nós</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <button onclick="<?php $teste->Sair(); ?>">Sair</button>
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
            <img src="treinando.avif" alt="Homem fazendo agachamento com saco de areia" class="img-principal">
        </div>

        <a href="https://wa.me/" class="whatsapp-icon" target="_blank">
            <i class="bi bi-whatsapp"></i>
        </a>
        
        <div class="container content-section">
            <div class="row d-flex align-items-center mb-5">
                <div class="col-lg-6 col-md-12">
                    <img src="musculacao.png" alt="Máquinas de treino sob luz azul" class="img-fluid content-img-left shadow">
                </div>
                <div class="col-lg-6 col-md-12 content-text mt-4 mt-lg-0">
                    <h4><strong>Treino Funcional e Musculação: </strong></h4>
                    <p>
                        Sessões planejadas para desenvolver força, resistência e flexibilidade
                    </p>
                </div>
            </div>

            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-12 content-text mb-4 mb-lg-0">
                    <h4><strong>aulas que combinam ritmo e exercícios físicos, proporcionando queima de calorias de forma divertida.</strong></h4>
                    <p>
                        aulas que combinam ritmo e exercícios físicos,
                        promovendo queima de calorias de forma
                        divertida.
                    </p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <img src="zumba.png" alt="Grupo de pessoas em aula de dança" class="img-fluid content-img-right shadow">
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
                <a href="VerMais.html" class="btn-ver-mais">Ver mais</a>
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
                        <p>Horário</p>
                        <p>18h-19h</p>
                        <p>Professor Roberto</p>
                    </div>
                    <div class="card-footer-custom">
                        <a href="Detralhes.html" class="btn-valor">Valor</a>
                    </div>
                </div>
                <div class="card-plano col-lg-3 col-md-5 col-sm-10 shadow">
                    <div class="card-title text-center">Avançado</div>
                    <div class="card-body text-center">
                        <p>Horário</p>
                        <p>18h-19h</p>
                        <p>Professor Roberto</p>
                    </div>
                    <div class="card-footer-custom">
                        <a href="Detralhes.html" class="btn-valor">Valor</a>
                    </div>
                </div>
                <div class="card-plano col-lg-3 col-md-5 col-sm-10 shadow">
                    <div class="card-title text-center">Pro</div>
                    <div class="card-body text-center">
                        <p>Horário</p>
                        <p>18h-19h</p>
                        <p>Professor Roberto</p>
                    </div>
                    <div class="card-footer-custom">
                        <a href="Detralhes.html" class="btn-valor">Valor</a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="Detralhes.html" class="btn-detalhes">Ver detalhes</a>
            </div>
        </div>
    </main>

    <footer>
        <div class="container d-flex justify-content-evenly align-items-start">
            <div>
                <h4>Contato</h4>
                <p>Telefone: 19 4002-8922</p>
                <p>Email: techfit@gmail.com</p>
            </div>
            <div class="text-center">
                <h4>Redes Sociais</h4>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-twitter-x"></i>
                <i class="bi bi-facebook"></i>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>