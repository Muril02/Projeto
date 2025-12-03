<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFit - Planos e Turmas</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* ==================================== */
        /* VARIÁVEIS DE COR TECHFIT */
        /* ==================================== */
        :root {
            --cor-primaria: #000000; /* Preto */
            --cor-secundaria: #ffcc00; /* Amarelo (Logo/Botões) */
            --cor-texto-claro: #ffffff;
            --cor-texto-escuro: #222;
            --cor-fundo-claro: #ffffff; 
        }

        /* ======== RESET E FONTES ======== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--cor-fundo-claro);
            color: var(--cor-texto-escuro);
            line-height: 1.6;
        }
        
        /* Otimização de Layout para o corpo da página */
        .page-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            flex-grow: 1; 
        }

        /* ==================================== */
        /* CABEÇALHO (NOVO) - Baseado em image_a87f75.png */
        /* ==================================== */
        .main-header {
            background-color: var(--cor-primaria); /* Fundo Preto */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* LOGO TECHFIT */
        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--cor-texto-claro); 
            text-decoration: none;
        }

        .logo-accent {
            color: var(--cor-secundaria); 
        }

        /* Navegação */
        .main-nav {
            display: flex;
            align-items: center;
            /* Garante que o Entrar fique na extrema direita */
            flex-grow: 1; 
            justify-content: flex-end; 
        }
        
        /* Links de Navegação */
        .main-nav a {
            text-decoration: none;
            color: var(--cor-texto-claro);
            font-weight: 500;
            margin-left: 25px;
            transition: color 0.3s;
            padding: 5px 0;
        }

        .main-nav a:hover:not(.nav-button) {
            color: var(--cor-secundaria); 
        }
        
        /* Botão "Entrar" (Amarelo em destaque) */
        .main-nav .nav-button {
            background-color: var(--cor-secundaria);
            color: var(--cor-primaria) !important;
            padding: 10px 20px;
            border-radius: 5px; /* Quadrado, como na imagem a87f75.png */
            font-weight: 600;
            margin-left: 35px; /* Mais espaço para separação visual */
            transition: background 0.3s;
            line-height: 1;
            text-align: center;
        }

        .main-nav .nav-button:hover {
            background-color: #e09e00;
            color: var(--cor-primaria) !important;
        }
        
        /* ======== CONTEÚDO PRINCIPAL (MANTIDO) ======== */
        .main-content {
            text-align: center;
            padding: 50px 20px;
        }

        .main-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 40px;
            line-height: 1.2;
        }

        /* BARRA DE PESQUISA */
        .search-section {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-bottom: 40px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 25px;
            padding: 10px 15px;
            width: 100%; 
            max-width: 350px; 
        }

        .search-icon {
            color: #999;
            margin-right: 10px;
        }

        .search-bar input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 0.9rem;
        }

        .filter-button {
            background-color: var(--cor-secundaria);
            border: none;
            color: var(--cor-primaria); 
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }

        .filter-button:hover {
            background-color: #e09e00;
        }

        /* CARDS */
        .class-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            justify-content: center;
            max-width: 1100px;
            margin: 0 auto;
        }

        .card {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            text-align: left;
            padding: 25px;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }

        .card-header {
            font-size: 1.2rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 15px;
        }

        .card-body p {
            font-size: 0.9rem;
            color: #444;
            margin-bottom: 8px;
        }

        .value strong {
            font-size: 1.1rem;
            color: #000;
        }

        /* CARD DESTACADO (Plano Básico) */
        .card:first-of-type {
            background-color: #e7ca86; 
            border: 2px solid var(--cor-secundaria);
            position: relative;
        }
        
        .card:first-of-type .card-header,
        .card:first-of-type .card-body p,
        .card:first-of-type .value strong {
            color: var(--cor-texto-escuro); 
        }

        .card:first-of-type::before {
            content: "Mais vantajoso";
            position: absolute;
            top: -12px;
            left: 20px;
            background-color: var(--cor-secundaria);
            color: var(--cor-primaria);
            font-weight: 600;
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 10px;
        }

        /* BOTÃO */
        .action-button {
            margin-top: 15px;
            width: 100%;
            padding: 12px 0;
            border: none;
            border-radius: 25px;
            background-color: var(--cor-secundaria);
            color: var(--cor-primaria);
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .action-button:hover {
            background-color: #e09e00;
        }

        /* ==================================== */
        /* RODAPÉ (Consistente com image_a87f32.png) */
        /* ==================================== */
        .footer-dark {
            background-color: var(--cor-primaria);
            color: var(--cor-texto-claro);
            padding: 30px 40px; /* Aumentei o padding lateral */
            margin-top: 60px;
            text-align: center; 
        }

        .footer-content {
             display: flex;
             justify-content: space-between; /* Espaçamento entre Contato e Redes Sociais */
             align-items: flex-start;
             max-width: 1200px;
             margin: 0 auto;
        }

        .footer-dark h4 {
            color: var(--cor-texto-claro); /* Branco, como na imagem */
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }
        
        /* Ajuste do telefone e email para cor clara/amarela */
        .footer-dark p {
            margin-bottom: 5px;
            line-height: 1.5;
            color: var(--cor-texto-claro);
            font-size: 1rem;
        }

        .footer-dark a {
            color: var(--cor-secundaria) !important; /* Amarelo no email */
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-dark a:hover {
             color: #ff9900 !important;
        }

        /* Estilo dos ícones de redes sociais */
        .social-icons-list {
            display: flex;
            gap: 10px;
            padding: 0;
            list-style: none;
        }

        .social-icons-list a {
            color: var(--cor-primaria); /* Preto do fundo */
            font-size: 1.1rem;
            background: var(--cor-texto-claro); /* Fundo branco */
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
            margin: 0;
        }
        
        .social-icons-list a:hover {
            background-color: var(--cor-secundaria); /* Hover amarelo */
        }
        
        /* Ajuste Responsivo */
        @media (max-width: 800px) {
            .main-header {
                padding: 15px 20px;
            }
            .main-nav a {
                margin-left: 15px;
            }
            .main-nav .nav-button {
                margin-left: 20px;
                padding: 8px 15px;
            }
            .footer-dark {
                padding: 30px 20px;
            }
            .footer-content {
                flex-direction: column;
                align-items: center;
                gap: 30px;
            }
            .footer-content > div {
                 text-align: center;
            }
            .social-icons-list {
                justify-content: center;
            }
            .main-title {
                font-size: 2.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
    
        <header class="main-header">
            <a href="index.php" class="logo">
                TECH<span class="logo-accent">FIT</span>
            </a>
            <nav class="main-nav">
                <a href="Detralhes.php">Planos</a> 
                <a href="Agendar.php">Agendar</a> 
                <a href="index.php">Voltar</a> 
                <a href="Login.php" class="nav-button">Entrar</a> 
            </nav>
        </header>

        <main class="main-content">
            <h1 class="main-title">Encontre<br>o plano que combina com você!</h1>

            <section class="search-section">
                <div class="search-bar">
                    <i class="bi bi-search search-icon"></i> 
                    <input type="text" placeholder="Buscar planos ou aulas" aria-label="Buscar planos ou aulas">
                </div>
                <button class="filter-button">Filtrar</button>
            </section>

            <section class="class-cards">
                <article class="card">
                    <div class="card-header">Plano Básico</div>
                    <div class="card-body">
                        <p class="value">Valor: <strong>R$ 89,90/mês</strong></p>
                        <p class="schedule">Aulas: 3x por semana</p>
                        <p class="teacher">Professor principal: Roberto</p>
                        <button class="action-button">Detalhes</button>
                    </div>
                </article>

                <article class="card">
                    <div class="card-header">Plano Avançado</div>
                    <div class="card-body">
                        <p class="value">Valor: <strong>R$ 120,90/mês</strong></p>
                        <p class="schedule">Aulas: 4x por semana</p>
                        <p class="teacher">Professor principal: Ana</p>
                        <button class="action-button">Detalhes</button>
                    </div>
                </article>

                <article class="card">
                    <div class="card-header">Plano PRO</div>
                    <div class="card-body">
                        <p class="value">Valor: <strong>R$ 169,90/mês</strong></p>
                        <p class="schedule">Aulas: Ilimitadas</p>
                        <p class="teacher">Professor principal: Bruno</p>
                        <button class="action-button">Detalhes</button>
                    </div>
                </article>

            </section>
        </main>
    
        <footer class="footer-dark">
            <div class="footer-content">
                <div class="contact">
                    <h4>Contato</h4>
                    <p>Telefone: (19) 4002-6922</p>
                    <p>Email: <a href="mailto:TechFit@gmail.com">TechFit@gmail.com</a></p>
                </div>
                <div class="social-media">
                    <h4>Redes Sociais</h4>
                    <ul class="social-icons-list">
                        <li><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a></li>
                        <li><a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>