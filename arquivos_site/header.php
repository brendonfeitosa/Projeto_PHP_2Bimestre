<?php
session_start();
$_SESSION['adm'] = false;
require_once("utils/connection.php");

if (isset($_GET['limpar'])) {

    unset($_SESSION['carrinho']);/*  */
    //session_destroy();
    header("Location:cardapio.php");
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400;700&family=Roboto:ital,wght@0,100;0,300;0,500;0,700;1,100;1,500;1,700&display=swap" rel="stylesheet">
    <title>Fatec Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./CSS/styles.css">

    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>

</head>

<body>
    <!-- navbar -->
    <br><br><br><br>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#ee8f54; z-index: 1000;">
        <div class="container-fluid col-11 m-auto">
            <button class="navbar-toggler btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item  cor ">
                        <a class="nav-link fw-bolder " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fw-bolder" href="nossa_historia.php"> Nossa história</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" href="contato.php">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  fw-bolder" href="pedidos.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link fw-bolder" href="cardapio.php" role="button">Cardápio</a>
                    </li>
                </ul>
            </div>
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
                    </li>

                </div>
            <?php } ?>
        </ul>
    </nav>
    <main class="main-content">
        