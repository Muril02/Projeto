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
    <link rel="stylesheet" href="CSS/Detalhe.css">
</head>

<body>
    <div class="page-wrapper">
    
        <header class="main-header">
            <a href="index.php" class="logo">
                TECH<span class="logo-accent">FIT</span>
            </a>
            <nav class="main-nav">
                <a href="Detalhes.php">Planos</a> 
                <a href="Agendar.php">Agendar</a> 
                <a href="index.php">Voltar</a> 
                <a href="Perfil.php" class="nav-button">Perfil</a> 
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