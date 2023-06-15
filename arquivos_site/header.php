<<<<<<< HEAD
<?php
session_start();
require_once("utils/connection.php");

if (isset($_GET['limpar'])) {

    unset($_SESSION['carrinho']);/*  */
    //session_destroy();
    header("Location:cardapio.php");
}
=======
<?php session_start();
require_once("utils/connetion.php");
>>>>>>> parent of 075c600 (Merge branch 'main' into Evelin)
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

<<<<<<< HEAD
    <link rel="stylesheet" href="./CSS/styles.css">

=======
    <link rel="stylesheet" href="./CSS/styles.css" />
>>>>>>> parent of 075c600 (Merge branch 'main' into Evelin)
</head>

<body>
    <!-- navbar -->

    <br><br><br><br>

    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#ee8f54; z-index: 1000;">
        <div class="container-fluid col-11 m-auto">
<<<<<<< HEAD

=======
            <a class="navbar-brand" href="#"><img src="./img/logo_size_invertg40.jpg" alt=""></a>
>>>>>>> parent of 075c600 (Merge branch 'main' into Evelin)
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
<<<<<<< HEAD
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" href="cardapio.php" role="button">Cardápio</a>
=======
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="cardapio.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cardápio</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fw-bolder" href="cardapio.php">Cardápio</a></li>
                            <hr>
                            <li><a class="dropdown-item fw-bolder font" href="cardapio.php#massas">Massas</a></li>
                            <li><a class="dropdown-item fw-bolder" href="cardapio.php#pizzas">Pizzas</a></li>
                            <li><a class="dropdown-item fw-bolder " href="cardapio.php#sobremesas">Sobremesas</a></li>
                        </ul>
>>>>>>> parent of 075c600 (Merge branch 'main' into Evelin)

                    </li>

                </ul>

            </div>
<<<<<<< HEAD




            <!-- ////////////////////////////////////////////////////////////////////// -->

            <?php
            if (isset($_SESSION['carrinho'])) { ?>

                <a href="header.php?limpar=1" class="link-dark link-offset-2 link-underline-opacity-10 link-underline-opacity-10-hover" style="font-size: 13px;">
                    Esvaziar (<?= count($_SESSION['carrinho']) ?>) &nbsp; </a>

            <?php

            } else { ?>

                <span style="font-size: 11px;">Vazio (0) &nbsp;</span>
            <?php  }
            ?>
            <span> <img src="./img/shoppingcart_80945.svg" alt="" width="13px" /></span>
        </div>
=======
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (!isset($_SESSION['login']) || $_SESSION['login'] != true) { ?>
>>>>>>> parent of 075c600 (Merge branch 'main' into Evelin)

                    <li>

<<<<<<< HEAD
        <ul class="navbar-nav navbar-right" style="margin-right: 100px;">
            <?php
            if (!isset($_SESSION['login']) || $_SESSION['login'] != true) { ?>

                <li>

                    <a class="reset_decor" href="login.php ">Login</a>&nbsp;&nbsp;
                </li>


            <?php } else { ?>

                <div class="btn-button">
                    <li class="nav-item dropdown">

                        <button class="btn dropdown-toggle navbar-btn" type="button" data-bs-toggle="dropdown">

                            <span style="font-size: 13px;"> <?= substr($_SESSION['nome'], 0, 9) ?></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" style="font-size: 13px;">
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
=======
                        <a class="reset_decor" href="login.php ">Login</a>&nbsp;&nbsp;
>>>>>>> parent of 075c600 (Merge branch 'main' into Evelin)
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




    </nav>