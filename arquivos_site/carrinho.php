<?php 
require_once("./header.php");
//print_r($_POST);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cod = $_POST['cod'];
    $qtde = $_POST['qtd'];

}
if (empty($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
 } 

array_push($_SESSION['carrinho'],$_POST);



//print_r($_SESSION['carrinho']);
header("Location: cardapio.php")

?>