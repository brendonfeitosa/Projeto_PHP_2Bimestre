<?php require_once("header.php"); ?>
<?php 
$sql = "SELECT * FROM historia;";

$result = $conn->query($sql);

$data = mysqli_fetch_array($result);


?>


<div class="container-fluid col-11 m-auto">
    <h1>Conheça nossa história</h1>
    <hr>
    <div class="text-justify m-auto">
        <h2>Fundação</h2>
        <p><?=$data['fundacao']?></p>
        <h2>De onde viemos</h2>
        <p><?=$data['de_onde_viemos']?></p>
        <h2>Porque escolhemos esta cidade</h2>
        <p><?=$data['porque_cidade']?></p>
        <h2>Curiosidades</h2>
        <p><?=$data['curiosidades']?></p>
    </div>
    <p>Fale conosco: <a href="contato.php"><i class="bi bi-telephone-outbound-fill">Contato</i></a></p>
</div>
<?php require_once("footer.php") ?>