<?php session_start();
require_once("utils/connetion.php");
?>
<!doctype html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fatec Food</title><!-- 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./CSS/styles.css" />
</head>

<body>
    <!-- navbar -->

    <br><br><br><br>

    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#ee8f54; z-index: 1000;">
        <div class="container-fluid col-11 m-auto">
            <a class="navbar-brand" href="#"><img src="./img/logo_size_invertg40.jpg" alt=""></a>
            <button class="navbar-toggler btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item  cor ">
                        <a class="nav-link fw-bolder " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fw-bolder" href="sobre_nos.php"> Nossa história</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" href="contato.php">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  fw-bolder" href="pedidos.php">Pedidos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="cardapio.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cardápio</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fw-bolder" href="cardapio.php">Cardápio</a></li>
                            <hr>
                            <li><a class="dropdown-item fw-bolder font" href="cardapio.php#massas">Massas</a></li>
                            <li><a class="dropdown-item fw-bolder" href="cardapio.php#pizzas">Pizzas</a></li>
                            <li><a class="dropdown-item fw-bolder " href="cardapio.php#sobremesas">Sobremesas</a></li>
                        </ul>

                    </li>

                </ul>

            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (!isset($_SESSION['login']) || $_SESSION['login'] != true) { ?>

                    <li>

                        <a class="reset_decor" href="login.php ">Login</a>&nbsp;&nbsp;
                    </li>


                <?php } else { ?>

                    <div class="btn-button">
                        <li class="nav-item dropdown">

                            <button class="btn dropdown-toggle navbar-btn" type="button" data-bs-toggle="dropdown">

                                <?= substr($_SESSION['nome'], 0, 9) ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>

                                    <a class="dropdown-item" href="cadastro.php?id=<?= $_SESSION['id'] ?>">
                                        Minha Conta
                                    </a>
                                </li>
                                <li>

                                    <a class="dropdown-item" href="logout.php">
                                        sair
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </div>
                <?php } ?>
            </ul>

            <!-- ////////////////////////////////////////////////////////////////////// -->

            <?php
            if (isset($_SESSION['carrinho'])) { ?>
                <a href="cardapio.php?limpar=1"><button class="btn btn-outline-secondary text-end">Limpar Carrinho</button></a>

            <?php } ?>


    </nav>