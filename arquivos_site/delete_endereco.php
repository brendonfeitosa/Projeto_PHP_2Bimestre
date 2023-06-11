<?php
    require("header.php");
if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
    header("Location: login.php");

}
if(isset($_GET['ecod'])){
   // $id = $_GET['id'];
    $ecod = $_GET['ecod'];
	//echo $table." ".$id;
	require_once('./utils/connetion.php'); 

	$mysql_query = "DELETE FROM endereco where end_cod = $ecod;";
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
header("Location: endereco.php?msg={$msg}&msgerror={$msgerror}");



