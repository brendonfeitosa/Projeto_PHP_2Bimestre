<?php
session_start();
require_once("../utils/connetion.php");

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resto</title>
    <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link href="../bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css">


</head>

<body>
    <main>

        <header>

            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="produto.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tipo.php">Tipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contato_adm.php">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pagamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ">Release</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link ">Sair</a>
                    </li>
                </ul>

            </nav>
            <?php
            if (isset($_SESSION['login_adm'])) { ?>

                <div class="text-info text-end">Ola <?= $_SESSION['nome'] ?></div>
            <?php } ?>

        </header>