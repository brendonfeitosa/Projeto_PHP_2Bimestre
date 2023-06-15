<?php 


session_destroy();
$_SESSION['carrinho']= "";
header("Location:carrinho.php");
?>