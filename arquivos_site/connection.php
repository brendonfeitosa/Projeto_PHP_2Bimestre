<?php
//Criar a conexão com banco de dados

// define define uma constante
define ('DB_HOST', 'localhost'); // define o servidor
define ('DB_USER', 'root'); //define o usuário
define ('DB_PASSWORD', ''); //Ddefine a senha do banco
define ('DB_NAME', 'agenda'); //procura o nome do banco

//criando a conexão de fato
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//testar se a conexão falhou

if(!$conn) {
    die('Falhou a conexão com o banco de dados MySQL: '. mysqli_connect_errno()); //testa para ver se o banco foi acessado
}
/* echo "Conexão bem sucessedida!"; */
?>