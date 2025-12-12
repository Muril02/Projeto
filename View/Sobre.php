<?php
session_start();
require_once "../Controller/LoginController.php";
require_once "../Model/LoginModel.php";
require_once "../Controller/ClienteController.php"; // Certifique-se de incluir o ClienteController.php


// A página "Sobre" é tipicamente acessível sem login, mas o header precisa saber se o usuário está logado
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
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFit - Nossa História</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/Sobre.css">
    
    </head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php"><span class="logo-highlight">TECH FIT</span></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="Detalhes.php">Planos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Agendar.php">Agendar</a>
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
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link btn-entrar" href="Login.php">Entrar</a>
                            </li>
                        <?php endif; ?>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="secao-sobre container">
            <h1>Nossa História na <span class="logo-highlight">TECH FIT</span></h1>

            <p>
                A TECH FIT nasceu em 2018 com a visão de revolucionar o mercado fitness, unindo o melhor da tecnologia com o treino físico. Começamos com um pequeno estúdio em São Paulo, focado em oferecer equipamentos de última geração e um ambiente inspirador. Acreditamos que a tecnologia é uma aliada essencial para personalizar a experiência de cada cliente e otimizar os resultados.
            </p>
            <p>
                Desde o início, nosso foco tem sido inovação, comunidade e resultados. Crescemos rapidamente, expandindo nossas unidades e incorporando a inteligência artificial em nossos programas de treino. Hoje, somos uma rede reconhecida por levar o futuro do fitness para milhões de pessoas, mantendo sempre o toque humano e o apoio de uma comunidade forte.
            </p>
        </section>

        <section class="historia-timeline container">
            <div class="timeline-wrapper">
                <div class="timeline-item">
                    <div class="timeline-year">2018</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Nascimento e Visão</h3>
                        <p>Fundação da TECH FIT em São Paulo com a missão de integrar tecnologia e fitness.</p>
                        <p>Lançamento do primeiro aplicativo de monitoramento básico de treinos.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2020</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Expansão e Inovação em Equipamentos</h3>
                        <p>Inauguração da 10ª unidade. Todos os equipamentos de cardio e musculação são substituídos por modelos inteligentes e conectados (IoT).</p>
                        <p>Integração de wearables para coleta de dados de desempenho em tempo real.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">2022</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Inteligência Artificial (IA) e 1ª Unidade Internacional</h3>
                        <p>Lançamento da Smart Coach AI, um sistema de inteligência artificial que personaliza e ajusta os planos de treino em tempo real com base na performance.</p>
                        <p>Abertura da primeira unidade na Argentina, marcando o início da expansão global.</p>
                    </div>
                </div>

                <div class="timeline-item" style="border-bottom: none;">
                    <div class="timeline-year">2024</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Sustentabilidade e Conexão Social</h3>
                        <p>Implementação do projeto TechFit Green, com instalação de painéis solares e equipamentos de cardio que geram energia, focando em sustentabilidade.</p>
                        <p>Lançamos o TechFit Connect, uma funcionalidade social no app para encontrar parceiros de treino e participar de desafios de grupo.</p>
                    </div>
                </div>
                
            </div>
        </section>
        
    </main>

    <footer>
        <div class="footer-conteudo-techfit container">
            <div class="footer-section contact-info">
                <h4>Contato</h4>
                <p>Telefone: (19) 4002-6922</p>
                <p>Email: <a href="mailto:techfit@gmail.com">TechFit@gmail.com</a></p>
            </div>
            <div class="footer-section social-media">
                <h4>Redes Sociais</h4>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-instagram"></i></a> 
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>