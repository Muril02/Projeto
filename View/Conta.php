<?php
session_start();
require_once "../Controller/ClienteController.php";

$controller = new ClienteController();

$usuario = [];

if(isset($_SESSION["IdUsuario"])){
    $id = $_SESSION["IdUsuario"];
    var_dump($controller->ListarClientePorId($id) );  
    $usuario = $controller->ListarClientePorId($id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Conta</title>
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
                            <a class="nav-link" href="Sobre.html">Sobre nós</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <h1 class="text-center">Bem vindo, <?php echo $usuario['Nome']  ?>!</h1>


    <div class="text-center">
    <h3 class="text-center mt-5">Infomações da conta</h3>
    <h4>Nome</h4>
    <input type="text" value="<?php echo $usuario['Nome'] ?>">

    <h4>Data nascimento</h4>
    <input type="date" value="<?php echo $usuario['Data_nascimento'] ?>">
    
    <h4>Telefone</h4>
    <input type="text" value="<?php echo $usuario['Telefone'] ?>">
    
    <h4>CPF</h4>
    <input type="email" value="<?php echo $usuario['CPF'] ?>">

    <h4>Email</h4>
    <input type="email" value="<?php echo $usuario['Email'] ?>">
    

    </div>

</body>
</html>