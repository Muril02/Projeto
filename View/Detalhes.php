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
    
         <header>
        <nav class="navbar navbar-expand">
            <div class="container">
                <a class="navbar-brand" href="index.php"><span class="logo-highlight">TECH FIT</span></a>

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
        <a class="nav-link text-white dropdown-toggle custom-account-button" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Menu da Conta">
             <i class="bi bi-person-circle"></i> Conta </a>
        
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