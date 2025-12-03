<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFit - Nossa História</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
<style>
        /* ==================================== */
        /* 0. VARIÁVEIS DE COR DA MARCA */
        /* ==================================== */

        :root {
            --color-primary: #000;           /* Preto Sólido */
            --color-secondary: #fff;         /* Branco Sólido */
            --color-accent: #ffb800;         /* Amarelo/Laranja TechFit */
            --color-text: #333;              /* Cinza Escuro para leitura */
            --color-light-gray: #f4f4f4;     /* Cinza muito claro para fundo de seções */
            --color-border-light: #ddd; 
        }

        /* ========== RESET E PADRÕES ========== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--color-secondary);
            color: var(--color-text);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ========== CABEÇALHO (NAVBAR) ========== */
        header {
            background-color: var(--color-primary); 
            padding: 10px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            position: sticky; /* Mantém o menu fixo ao rolar */
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-techfit-text {
            font-size: 1.5rem;
            font-weight: 800; /* Mais peso para o logo */
            text-decoration: none;
            letter-spacing: 0.5px;
        }

        .logo-techfit-text .tech {
            color: var(--color-secondary);
        }

        .logo-techfit-text .fit {
            color: var(--color-accent);
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* Estilo para "Planos", "Agendar" e "Voltar" (sem fundo) */
        .btn-link {
            color: var(--color-secondary);
            text-decoration: none;
            font-weight: 600;
            padding: 8px 10px;
            transition: color 0.3s;
            display: none; /* Esconde no mobile */
        }
        
        .btn-voltar {
            color: var(--color-secondary);
            text-decoration: none;
            font-weight: 600;
            padding: 8px 15px;
            transition: color 0.3s;
        }

        .btn-link:hover, .btn-voltar:hover {
            color: var(--color-accent);
        }

        /* Estilo para "Entrar" (botão amarelo) */
        .btn-entrar {
            background-color: var(--color-accent);
            color: var(--color-primary);
            font-weight: 700;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-entrar:hover {
            background-color: #ffcc4c; 
            box-shadow: 0 0 15px rgba(255, 184, 0, 0.6);
        }
        
        @media (min-width: 768px) {
            .btn-link {
                display: block; /* Mostra no desktop */
            }
        }
        
        /* ========== SEÇÃO SOBRE (INTRODUÇÃO) ========== */
        .secao-sobre {
            padding-top: 60px;
            padding-bottom: 30px;
        }
        
        .secao-sobre h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
            color: var(--color-primary);
            font-weight: 700;
            text-align: center;
        }

        .secao-sobre p {
            font-size: 1.05rem;
            line-height: 1.7;
            max-width: 800px;
            margin: 0 auto 30px auto;
            text-align: justify;
        }

        /* ========== SEÇÃO DE HISTÓRIA / TIMELINE ========== */
        .historia-timeline {
            padding-top: 50px;
            padding-bottom: 80px;
            position: relative;
        }

        .timeline-wrapper {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .timeline-wrapper .timeline-item:nth-child(odd) {
            background-color: var(--color-light-gray);
        }

        /* Linha vertical (por padrão, invisível ou centralizada no mobile - vamos mover no desktop) */
        .timeline-wrapper::after {
            content: '';
            position: absolute;
            width: 3px;
            background-color: var(--color-accent);
            top: 0;
            bottom: 0;
            left: 25%; 
            margin-left: -1.5px;
            display: none; /* Esconde no mobile e mostra no desktop */
        }

        .timeline-item {
            padding: 20px;
            position: relative;
            border-bottom: 1px solid var(--color-border-light); 
            margin-bottom: 0;
        }
        
        .timeline-year {
            font-size: 3rem; 
            font-weight: 700;
            color: var(--color-accent);
            position: relative;
            margin-bottom: 10px;
            text-align: left; /* Padrão mobile */
        }
        
        .timeline-content {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .timeline-title {
            font-size: 1.5rem;
            color: var(--color-primary);
            margin-bottom: 10px;
        }

        .timeline-content p {
            font-size: 1rem;
            color: var(--color-text);
            line-height: 1.7;
            text-align: left;
            margin-bottom: 15px;
        }

        /* CORREÇÃO: Responsivo para telas maiores (desktop) com a linha à esquerda */
        @media (min-width: 768px) {
            
            /* Mostra a linha da Timeline à esquerda: 25% */
            .timeline-wrapper::after {
                display: block; 
            }
            
            .timeline-item {
                padding: 40px 0; 
                border-bottom: none;
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                gap: 5%;
                position: relative;
            }

            .timeline-year {
                font-size: 4rem; 
                width: 25%; /* Largura da coluna do ano */
                position: static;
                text-align: right;
                margin-bottom: 0;
                padding-right: 20px;
            }
            
            .timeline-content {
                width: 70%; /* Largura da coluna do conteúdo */
                padding-left: 20px;
            }
            
            /* Círculo de Destaque (Posicionado sobre a linha) */
            .timeline-item::before {
                content: '';
                position: absolute;
                width: 15px;
                height: 15px;
                background-color: var(--color-accent);
                border: 3px solid var(--color-secondary);
                border-radius: 50%;
                z-index: 10;
                left: 25%; 
                transform: translateX(-50%);
                top: 50%;
                margin-top: -7.5px;
            }
        }
        
        /* ========== RODAPÉ ========== */
        footer {
            background-color: var(--color-primary);
            color: var(--color-secondary);
            padding: 40px 0;
            margin-top: 80px;
        }

        .footer-conteudo-techfit {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px;
            text-align: center;
        }

        .footer-section {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .footer-section h4 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: var(--color-secondary);
            font-weight: 700;
        }

        .contact-info p {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 10px;
            color: var(--color-secondary);
        }
        
        .contact-info a {
            color: var(--color-accent); 
            text-decoration: none;
            transition: color 0.3s;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 10px;
        }

        .social-icons a {
            background-color: var(--color-secondary);
            color: var(--color-primary);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .social-icons a:hover {
            background-color: #ccc; 
            color: var(--color-primary);
        }

        @media (min-width: 700px) {
            .footer-conteudo-techfit {
                flex-direction: row;
                justify-content: space-around;
            }
            .footer-section {
                align-items: flex-start;
            }
        }
</style>

</head>
<body>

    <header>
        <div class="header-container container">
            <a href="index.html" class="logo-techfit-text"><span class="tech">TECH</span><span class="fit">FIT</span></a> 
            <div class="nav-buttons">
                <a href="Detralhes.php" class="btn-link">Planos</a>
                <a href="Agendar.php" class="btn-link">Agendar</a>
                <a href="index.php" class="btn-voltar">Voltar</a>
                <a href="Perfil.php" class="btn-entrar">Meu Perfil</a>
            </div>
        </div>
    </header>

    <main>
        <section class="secao-sobre container">
            <h1>Sobre nós</h1>
            <p>Desde a nossa fundação, a TechFit se dedicou a revolucionar o mercado fitness, unindo o melhor da  com o foco total no bem-estar do aluno. Conheça os marcos que definiram nossa história, do nosso primeiro aplicativo à expansão internacional.</p>
            
            <div style="margin: 0 auto 50px auto; max-width: 900px;">
                <img src="niver.png" alt="Visão interna moderna da academia TechFit" class="imagem-principal" style="width:100%; height: auto; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
            </div>
        </section>

        <section class="historia-timeline container">
            <h2 style="text-align: center; color: var(--color-primary); margin-bottom: 40px;">Marcos Históricos</h2>
            <div class="timeline-wrapper">
                
                <div class="timeline-item">
                    <div class="timeline-year">2020</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">O Desafio e o Lançamento Digital</h3>
                        <p>Lançamento da Plataforma TechFit GO, nossa solução de treinos online e aulas virtuais ao vivo, garantindo que nossos alunos pudessem treinar de qualquer lugar.</p>
                        <p>Inauguramos as 3 primeiras unidades com tecnologia de acesso por biometria e avaliação corporal remota.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2021</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Gamificação e Expansão do App</h3>
                        <p>A TechFit ultrapassou a marca de 50.000 alunos ativos na plataforma digital. Introduzimos o recurso de Gamificação no aplicativo, premiando alunos por consistência e resultados.</p>
                        <p>Expansão para a região Sul do Brasil, abrindo 6 novas unidades e consolidando a marca nacionalmente.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">2022</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Inteligência Artificial (IA) e 1ª Unidade Internacional</h3>
                        <p>Lançamento da Smart Coach AI, um sistema de inteligência artificial que personaliza e ajusta os planos de treino em tempo real com base na performance do aluno.</p>
                        <p>Inauguramos nossa primeira unidade em Lisboa, Portugal, marcando o início da expansão global da TechFit.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">2023</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Foco em Recovery e 100 Unidades</h3>
                        <p>Introdução das Áreas de Recovery em todas as unidades premium, incluindo crioterapia e cadeiras de massagem de alta tecnologia, focadas na recuperação muscular rápida.</p>
                        <p>Alcançamos a marca de 100 unidades ativas no Brasil e no exterior, reforçando nossa liderança em inovação fitness.</p>
                    </div>
                </div>

                <div class="timeline-item" style="border-bottom: none;"> <div class="timeline-year">2024</div>
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

</body>
</html>