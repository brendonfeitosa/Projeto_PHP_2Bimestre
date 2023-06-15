<?php 
require("./header.php");

if(isset($_GET['item'])){
   print_r($_SESSION['carrinho']);
    $aux = [];
      foreach ($_SESSION['carrinho'] as $chave => $produto1) {
          if ($produto1 != null) {
             if($produto1['cod'] != $_GET['item'])
            /// print_r($produto1);
              array_push($aux,$produto1);
            }
        }
    }
   

echo "-------------------------";
//session_start();
$_SESSION['carrinho'] = $aux;
//print_r($_SESSION['carrinho']);


header("Location:verificar_pedido.php");
?>