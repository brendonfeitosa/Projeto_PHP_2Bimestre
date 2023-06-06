<?php session_start();  
    require_once("utils/connetion.php");
?>
<!doctype html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fatec Food</title>
   <!--  <link rel="stylesheet" href="./bootstrap-5.3.0-alpha3-dist/"> -->
   
    <link rel="stylesheet" href="./CSS/styles.css" />
</head>

<body >
    <!-- navbar -->
    
    <br><br><br><br>
  
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#ee8f54; z-index: 1000;">
        <div class="container-fluid col-11 m-auto">
            <a class="navbar-brand" href="#"><img src="./img/logo_size_invertg40.jpg" alt=""></a>
            <button class="navbar-toggler btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                        <a class="nav-link dropdown-toggle active" href="cardapioteste.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cardápio</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fw-bolder" href="cardapioteste.php">Cardápio</a></li>
                            <hr>
                            <li><a class="dropdown-item fw-bolder font" href="cardapioteste.php">Massas</a></li>
                            <li><a class="dropdown-item fw-bolder" href="cardapioteste.php">Pizzas</a></li>
                            <li><a class="dropdown-item fw-bolder " href="cardapioteste.php">Sobremesas</a></li>  
                        </ul>

                        
                    </li>
                    
                  
                </ul>
                
            </div>
           
        </div>
        <?php
            if (isset($_SESSION['login']) == true) { ?> <div class="font_menor reset_decor nm_sessao">
                <?= substr($_SESSION['nome'], 0, 9) ?> |
                <a class="reset_decor" href="logout.php">Sair &nbsp;</a>
                </div>
            <?php } else { ?>
                <div class="font_menor reset_decor nm_sessao">

                    <a class="reset_decor" href="login.php ">Login</a>&nbsp;&nbsp;
                </div>
            <?php }
        ?>
        </p>
    </nav>