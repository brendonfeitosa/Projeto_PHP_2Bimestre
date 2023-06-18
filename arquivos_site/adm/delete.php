<?php
    require("header.inc.php");
if (!isset($_SESSION['login_adm']) || $_SESSION['login_adm'] != true) {
    header("Location: login_adm.php");

}
if(isset($_GET['id'])){
    $table = $_GET['tb'];
	
    $id = $_GET['id'];
	

    //echo $table." ".$id;
	require_once('../utils/connetion.php');

	if($table == 0){
		$field = "tipo_cod";
		$table = "tipo_produto";
		header("Location: tipo.php");

	}else if($table == 1){
		
		$field="cod";
		$table = "tipo_pagamento";
		header("Location: tipo.php");
	}else if($table == 2){
		$field="codigo";
		$table = "produto";
		header("Location: produto.php");
	}
	

	$mysql_query = "DELETE FROM {$table} where $field={$id}";
	$del = $conn->query($mysql_query);

	
	if( $del === true){
       // echo "aqui";
		$msg = "delete success";
		$msgerror="";
	}else{
		$msg = "delete error";
		$msgerror=$conn->error;

	}
	mysqli_close($conn);
}else{
    $msgerror="O id não foi informado";
    
}
//header("Location: tipo.php?msg={$msg}&msgerror={$msgerror}");



