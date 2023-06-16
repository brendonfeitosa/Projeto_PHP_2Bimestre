<?php
require_once("./header.php");
/* print_r($_POST);
$cod = "";
$qtde = ""; */
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cod = $_POST['cod'];
    $qtde = $_POST['qtd'];
}
$aux = [];
if (empty($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}
$aux = $_POST;
$test = false;
foreach ($_SESSION['carrinho'] as $key => $value) {
    // print_r($value);

    if (isset($value['cod'])) {
         
        if ($value['cod'] == $cod) {
            $_SESSION['carrinho'][$key]['qtd'] += $_POST['qtd'];
            $test = true;
        }
    }
}
if(!$test)
  array_push($_SESSION['carrinho'], $aux);


header("Location: cardapio.php");
?>
