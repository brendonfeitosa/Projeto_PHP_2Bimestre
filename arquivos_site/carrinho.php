<?php 
require_once("./header.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cod = $_POST['cod'];
    $qtde = $_POST['qtde'];

}
if (empty($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
 } 

array_push($_SESSION['carrinho'],$_POST);




header("Location: cardapio.php")

?>