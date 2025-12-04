<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECHFIT - Encontre seu Plano</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="CSS/VerMais.css">
</head>
<body>

    <header class="techfit-header">
        <div class="logo">
            <span class="tech">TECH</span><span class="fit">FIT</span>
        </div>
        <nav>
            <a href="index.php" class="btn-voltar">Voltar</a>
            <a href="Login.php" class="btn-entrar">Perfil</a>
        </nav>
    </header>

    <main class="jumbotron">
        <h1>Encontre</h1>
        <h2>o plano que combina com você!</h2>
        
        <form class="search-bar-form" onsubmit="return handleSearch(event)">
            <div class="search-bar">
                <span>&#128269;</span> 
                <input type="search" id="search-input" placeholder="Buscar planos ou aulas" required>
                <button type="submit" class="btn-filtrar">Filtrar</button>
            </div>
        </form>
    </main>
    
    <section class="cards-section">
        
        <div class="card">
            <div class="card-image-container">
                <img src="Img/Body.png" alt="Aula de Body Balance" class="card-image">
                <div class="card-title-overlay">BODY BALANCE</div>
            </div>
            <div class="card-details">
                <div class="card-icons">
                    <div class="icon-group">
                        <span class="icon-clock">&#x23F1;</span>
                        <p class="duration">30/45 min</p>
                    </div>
                    <div class="icon-group">
                        <span class="icon-intensity">&#9646;&#9646;</span> 
                        <p class="intensity">Moderado</p>
                    </div>
                </div>
                <p class="card-description">Inspirado no Yoga, com elementos do Tai Chi e do Pilates, é um treino com a função de melhorar não só o corpo, mas também a mente.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-image-container">
                <img src="Img/FitDance.png" alt="Aula de Smart Core" class="card-image">
                <div class="card-title-overlay">FITDANCE</div>
            </div>
            <div class="card-details">
                <div class="card-icons">
                    <div class="icon-group"><span class="icon-clock">&#x23F1;</span><p class="duration">30 min</p></div>
                    <div class="icon-group"><span class="icon-intensity">&#9646;&#9646;</span><p class="intensity">Moderado</p></div>
                </div>
                <p class="card-description">Aulas de dança que transformam passos em um treino aeróbico divertido e de alta queima calórica.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-image-container">
                <img src="Img/alongamento.png"Aula de Alongamento" class="card-image">
                <div class="card-title-overlay">ALONGAMENTO</div>
            </div>
            <div class="card-details">
                <div class="card-icons">
                    <div class="icon-group"><span class="icon-clock">&#x23F1;</span><p class="duration">30 min</p></div>
                    <div class="icon-group"><span class="icon-intensity">&#9646;</span><p class="intensity">Baixa</p></div>
                </div>
                <p class="card-description">Uma aula focada em exercícios de alongamento, flexibilidade e mobilidade articular, que alivia o stress e as dores do corpo.</p>
            </div>
        </div>
        
        <div class="card">
            <div class="card-image-container">
                <img src="Img/zumba.png" alt="Aula de Zumba" class="card-image">
                <div class="card-title-overlay">ZUMBA</div>
            </div>
            <div class="card-details">
                <div class="card-icons">
                    <div class="icon-group"><span class="icon-clock">&#x23F1;</span><p class="duration">30/45 min</p></div>
                    <div class="icon-group"><span class="icon-intensity">&#9646;&#9646;&#9646;</span><p class="intensity">Alta</p></div>
                </div>
                <p class="card-description">Adora remexer os quadris? Você tem aulas de Zumba com professores licenciados para gastar muita energia.</p>
            </div>
        </div>
        
        <div class="card">
            <div class="card-image-container">
                <img src="Img/box.png" alt="Aula de Body Combat" class="card-image">
                <div class="card-title-overlay">BODY COMBAT</div>
            </div>
            <div class="card-details">
                <div class="card-icons">
                    <div class="icon-group"><span class="icon-clock">&#x23F1;</span><p class="duration">30/45 min</p></div>
                    <div class="icon-group"><span class="icon-intensity">&#9646;&#9646;&#9646;</span><p class="intensity">Alta</p></div>
                </div>
                <p class="card-description">Karate, Jiu-Jitsu, Capoeira e Taekwondo são inspirações para esta aula intensa que trabalha o corpo todo.</p>
            </div>
        </div>
        
        <div class="card">
            <div class="card-image-container">
                <img src="Img/funcional.png" alt="Aula de Treino Funcional" class="card-image">
                <div class="card-title-overlay">FUNCIONAL</div>
            </div>
            <div class="card-details">
                <div class="card-icons">
                    <div class="icon-group"><span class="icon-clock">&#x23F1;</span><p class="duration">45 min</p></div>
                    <div class="icon-group"><span class="icon-intensity">&#9646;&#9646;</span><p class="intensity">Moderado</p></div>
                </div>
                <p class="card-description">Melhore a sua coordenação e equilíbrio com exercícios que simulam movimentos do dia a dia. É um treino completo.</p>
            </div>
        </div>
        
    </section>

    <footer class="techfit-footer">
        <div class="footer-content">
            <div class="contato">
                <h3>Contato</h3>
                <p>Telefone: (19) 4002-8922</p>
                <p>Email: <a href="mailto:TechFit@.com" class="email-link">TechFit@.com</a></p>
            </div>
            <div class="redes-sociais">
                <h3>Redes Sociais</h3>
                <div class="social-icons">
                    <a href="#" class="social-icon">📷</a> 
                    <a href="#" class="social-icon">🐦</a> 
                    <a href="#" class="social-icon">📘</a> 
                    <a href="#" class="social-icon">👔</a> 
                </div>
            </div>
        </div>
    </footer>
</body>
</html>