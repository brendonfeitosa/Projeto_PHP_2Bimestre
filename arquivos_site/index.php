<?php require('./header.php'); ?>

<!-- Carousel -->
<div id="demo" class="carousel slide centralizar" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators centralizar">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/pizza1.jpg" alt="Los Angeles" class="d-block img_banner">
        </div>
        <div class="carousel-item">
            <img src="./img/lasanha1.jpg" alt="Chicago" class="d-block img_banner">
        </div>
        <div class="carousel-item">
            <img src="./img/massa1.jpg" alt="New York" class="d-block img_banner">
        </div>
        <div class="carousel-item">
            <img src="./img/torta1.jpg" alt="New York" class="d-block img_banner">
        </div>
        <div class="carousel-item">
            <img src="./img/pudim.png" alt="New York" class="d-block img_banner">
        </div>
      

    </div>
</div>

<br />

<!-- cards -->
<?php
$sql = "select * from produto ";

$result = $conn->query($sql);
?>

<!-- cards -->
<div class="text">
    <h4 class="text-center">DESTAQUES</h4>
</div>

<form action="" method="post">
    <section class="container_card">
        <div class="row text-center item-container">
            <?php
            while ($data = mysqli_fetch_array($result)) { ?>


                <div class="card m-2 card-menu" style="width:16rem; padding:2px; ">
                    <strong class="card-text1"><?= $data['nome'] ?> </strong>
                 
                    <img src="<?= $data['image_url'] ?>" class="img_card" alt="...">
                    
                    <p class="card-text"><?= substr($data['descricao'], 0, 40) ?></p>
                  
                </div>



            <?php } ?>
        </div>


    </section>

</form>
<hr>



<?php require_once("footer.php") ?>