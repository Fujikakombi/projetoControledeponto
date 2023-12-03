<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($connect, "SELECT * FROM tb_users WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);
} else {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=registro">Registro de ponto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=novo">Novo usuário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=listar">Listar usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=sair">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php

                switch (@$_REQUEST["page"]) {
                    case "registro":
                        include("registroponto.php");
                        break;
                    case "novo":
                        include("cadastro.php");
                        break;
                    case "listar":
                        include("listarUsuario.php");
                        break;
                    case "salvar":
                        include("gravarUsuario.php");
                        break;
                    case "editar":
                        include("editarUsuario.php");
                        break;
                    case "sair":
                        include("logout.php");
                        break;
    
                }
                ?>

            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>