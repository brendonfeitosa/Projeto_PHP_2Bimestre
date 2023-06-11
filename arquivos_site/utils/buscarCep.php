<?php
$cep = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

   $cep = $_POST['cep'];
}

function get_endereco($cep)
{
   // formatar o cep removendo caracteres nao numericos
   $json = file_get_contents("http://viacep.com.br/ws/$cep/json/");
   $cpJson = json_decode($json, true);

   return $cpJson;
}

// print_r(get_endereco("19026440"));

function validaCep($cep)
{

   if (!preg_match('/[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $cep)) {

      return false;
   }

   return true;
}
