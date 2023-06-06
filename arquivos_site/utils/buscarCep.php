<?php 
$cep = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

   $cep = $_POST['cep'];
}

function get_endereco($cep){


    // formatar o cep removendo caracteres nao numericos
    $cep = preg_replace("/[^0-9]/", "", $cep);

    $json = file_get_contents("http://viacep.com.br/ws/$cep/json/");
   
    $cpJson= json_decode($json, true);
  
    
    return $cpJson;
  }

 // print_r(get_endereco("19026440"));
  
?>