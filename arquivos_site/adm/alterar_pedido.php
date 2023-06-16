
<?php 
   require_once("header.inc.php");
if(isset($_GET['final'])){

    $sql = "update pedido set status = 1 where ped_num = {$_GET['final']};";

    $result = $conn->query($sql);

    if(!$result){
        $msg_err = "não foi possival alterar o status do pedido";
    }else{

        header("Location:pedidos.php?msg_err=$msg_err");
    }
}else if(isset($_GET['cancela'])){

    $sql = "update pedido set status = 3 where ped_num = {$_GET['cancela']};";

    $result = $conn->query($sql);

    if(!$result){
        $msg_err = "não foi possival alterar o status do pedido";
    }else{

        header("Location:pedidos.php?msg_err=$msg_err");
    }
}


?>