<?php
/* define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'ander22pa');
define('DB_NAME', 'bd_resto'); */

define('DB_HOST', 'localhost'); // define o servidor
define('DB_USER', 'root'); //define o usuário
define('DB_PASSWORD', ''); //Ddefine a senha do banco
define('DB_NAME', 'agenda'); //procura o nome do banco

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
  die("Failed to conect to MylSql" . mysqli_connect_error());
}
