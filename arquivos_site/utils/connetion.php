<?php 
  define('DB_HOST','localhost');
  define('DB_USER','root');
  define('DB_PASSWORD','ander22pa');
  define('DB_NAME','bd_resto');
  $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

  if(!$conn){
      die("Failed to conect to MylSql".mysqli_connect_error());
  }
