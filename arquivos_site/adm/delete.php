<?php
    require("header.inc.php");
if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
    header("Location: login_adm.php");

}
if(isset($_GET['id'])){
    $table = $_GET['tb'];
	
    $id = $_GET['id'];
	$field = $_GET['field'];
	

    //echo $table." ".$id;
	require_once('../utils/connetion.php');

	if($field == 0){
		$field = "tipo_cod";
	}else{

		$field="cod";
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
header("Location: tipo.php");


