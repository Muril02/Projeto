<?php
session_start();
require_once "../Controller/ClienteController.php";
require_once "../Controller/LoginController.php";

$controller = new ClienteController();
$controllerLogin = new LoginController();

$usuario = [];

if (isset($_SESSION["IdUsuario"])) {
    $id = $_SESSION["IdUsuario"];
    $usuario = $controller->ListarClientePorId($id);
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | TechFit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/Perfil.css">


</head>

<body>

    <header class="main-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">

                <span class="logo-text">TECH<span class="fit-highlight">FIT</span></span>

                <a href="index.php" class="btn btn-voltar">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="profile-card">
                    <div class="text-center">
                        <div class="profile-picture-container">
                            <img src="Img/icone.avif" alt="Foto da Aluna Ana Silva">
                        </div>
                        <h1 class="display-5 fw-bold"></h1>
                        <p class="lead text-muted">
                            <i class="bi bi-calendar-check me-2"></i> Bem vindo(a), <?php echo $usuario["Nome"] ?>
                        </p>
                    </div>

                    <h2 class="section-title">Dados Básicos</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <span class="info-label">Data de nascimento:</span> <?php echo $usuario["Data_nascimento"] ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="info-label">Plano:</span> <?php echo $usuario["idPlano"] == null ? "Nenhum plano" :  "teste";   ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="info-label">E-mail:</span> <?php echo $usuario["Email"];  ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="info-label">Contato:</span> <?php echo $usuario["Telefone"]; ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="info-label">CPF:</span> <?php echo $usuario["CPF"]; ?>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div>
                            <form action="AlterarInformacoes.php" method="post">
                                <input type="hidden" name="Nome" value="<?php echo $usuario["Nome"] ?>">
                                <input type="hidden" name="Email" value="<?php echo $usuario["Email"] ?>">
                                <input type="hidden" name="CPF" value="<?php echo $usuario["CPF"] ?>">
                                <input type="hidden" name="Telefone" value="<?php echo $usuario["Telefone"] ?>">
                                <input type="hidden" name="Dt_nasc" value="<?php echo $usuario["Data_nascimento"] ?>">
                                <input type="hidden" name="Id_cliente" value="<?php echo $usuario["Id_cliente"] ?>">
                                <input type="hidden" name="acao" value="alterar">
                                <button type="submit" class="btn btn-voltar ">Alterar informações</button>
                            </form>

                            <form action="AlterarSenha.php" method="post">
                                <input type="hidden" name="acao" value="alterarSenha">
                                <input type="hidden" name="Id_cliente" value="<?php echo $usuario["Id_cliente"] ?>">
                                <button type="submit" class="btn btn-voltar mt-1">Alterar senha</button>
                            </form>
                        </div>
                        <div>
                            <form action="/Controller/ClienteController.php" method="post">
                                <input type="hidden" name="acao" value="excluirConta">
                                <input type="hidden" name="Id_cliente" value="<?php echo $usuario["Id_cliente"] ?>">
                                <button type="submit" class="btn btn-voltar mt-1">Excluir conta</button>
                            </form>
                        </div>
                    </div>
                    <!-- <form action="../Controller/ClienteController.php" method="post">
                        <input type="hidden" name="acao" value="excluir">
                        <input type="hidden" name="Id_cliente" value="<?php echo $usuario["Id_cliente"] ?>">
                        <button class="mt-1" type="submit">Excluir conta</button>
                    </form> -->


                    <h2 class="section-title">Avaliação Física</h2>
                    <div class="row">
                        <span>Não registrado</span>
                    </div>

                    <h2 class="section-title">Metas e Progresso</h2>

                    <span>Não registrado</span>

                </div>
            </div>
        </div>
    </main>

    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2025 TechFit Academia. Todos os direitos reservados. | Dados Fictícios para Demonstração.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>