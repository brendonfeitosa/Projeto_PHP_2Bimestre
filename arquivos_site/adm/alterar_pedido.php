
<?php 
   require_once("header.inc.php");
   $ped_num ="";
if(isset($_GET['final'])){
    $ped_num =$_GET['final'];
    $sql = "update pedido set status = 1 where ped_num = {$ped_num};";

    $result = $conn->query($sql);

    if(!$result){
        $msg_err = "não foi possival alterar o status do pedido";
    }

}else if(isset($_GET['cancela'])){
    $ped_num =$_GET['cancela'];
    $sql = "update pedido set status = 3 where ped_num = {$ped_num};";
    $result = $conn->query($sql);
    
    if(!$result){
        $msg_err = "não foi possival alterar o status do pedido";
    }
    
}

if($msg_err == ""){
    $sql = "SELECT status FROM pedido WHERE ped_num ={$ped_num}";
    $status = $conn->query($sql);
   
    $row = mysqli_fetch_assoc($status);

    if($row['status'] == 3){
        $sql = "update pagamento set cancelado = 1 where ped_num = {$ped_num};";
        $result = $conn->query($sql);
        
    }else{
        $sql = "update pagamento set cancelado = 0 where ped_num = {$ped_num};";
        $result = $conn->query($sql);
    }

   
    if(!$result){
        $msg_err = "não foi possival alterar o status do pedido";
    }
}




header("Location:pedidos.php?msg_err=$msg_err");


?>