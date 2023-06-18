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
$sql = "select * from produto where promo =1 ";

$result = $conn->query($sql);
?>

<!-- cards -->
<div class="text">
    <h4 class="text-center">Promoções</h4>
</div>
<section class="container_card">
    <hr>
    <div class="row text-center item-container">
        <?php
        while ($data = mysqli_fetch_array($result)) { ?>


            <div class="card m-2 card-menu card-produto" style="width:16rem; padding:2px; ">
                <strong class="card-text1"><?= $data['nome'] ?> </strong>

                <img src="<?= $data['image_url'] ?>" class="img_card" alt="...">

                <span class="text-descr"><?= substr($data['descricao'], 0, 40) ?>

                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-link text-saiba" data-bs-toggle="modal" data-bs-target="#modal<?= $data['codigo'] ?>">
                        ...adicionar +
                    </button>
                </span>

                <!--//////////////////////////////////// Modal //////////////////////////////////// -->

                <div class="modal fade" id="modal<?= $data['codigo'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Descrição</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?= $data['descricao'] ?>
                            </div>
                            <div class="modal-footer">

                                <?php
                                if ($data['promo'] > 0) {
                                    $preco =  $data['preco'] - ($data['preco'] * 0.05);
                                } else {

                                    $preco = $data['preco'];
                                }
                                ?>
                                <form action="carrinho.php" method="post">
                                    <input type="hidden" name="cod" value="<?= $data['codigo'] ?>">
                                    <input type="hidden" name="preco" value="<?= $preco ?>">
                                    <input type="hidden" name="nomeprod" value="<?= $data['nome'] ?>">
                                    <input type="hidden" name="promo" value="<?= $data['promo'] ?>">
                                    <input type="hidden" name="qtd" class="tm_input" min="1" value="1" />

                                    <button type="button" class="btn btn-link-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <input type="submit" name="addcarrinho" class="btn btn-link"  value="Adicionar ao Carrinho">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////////////////////////////////////////////////////// -->

            </div>

        <?php } ?>
    </div>


</section>


<div class="text">
    <h4 class="text-center">DESTAQUES</h4>
</div>

<?php
$sql = "select * from produto ";

$result = $conn->query($sql);
?>
<section class="container_card">
    <hr>
    <div class="row text-center item-container ">
        <?php
        while ($data = mysqli_fetch_array($result)) { ?>


            <div class="card m-2 card-menu card-produto" style="width:16rem; padding:2px; ">
                <strong class="card-text1"><?= $data['nome'] ?> </strong>

                <img src="<?= $data['image_url'] ?>" class="img_card" alt="<?=$data['nome']?>">

                <span class="text-descr"><?= substr($data['descricao'], 0, 40) ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-link text-saiba" data-bs-toggle="modal" data-bs-target="#modal<?= $data['codigo'] ?>">
                        ...adicionar +
                    </button>
                </span>

                <!--//////////////////////////////////// Modal //////////////////////////////////// -->

                <div class="modal fade" id="modal<?= $data['codigo'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Descrição</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?= $data['descricao'] ?>
                            </div>
                            <div class="modal-footer">

                                <?php
                                if ($data['promo'] > 0) {
                                    $preco =  $data['preco'] - ($data['preco'] * 0.05);
                                } else {

                                    $preco = $data['preco'];
                                }
                                ?>
                                <form action="carrinho.php" method="post">
                                    <input type="hidden" name="cod" value="<?= $data['codigo'] ?>">
                                    <input type="hidden" name="preco" value="<?= $preco ?>">
                                    <input type="hidden" name="nomeprod" value="<?= $data['nome'] ?>">
                                    <input type="hidden" name="promo" value="<?= $data['promo'] ?>">
                                    <input type="hidden" name="qtd" class="tm_input" min="1" value="1" />

                                    <button type="button" class="btn btn-link-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <input type="submit" name="addcarrinho" class="btn btn-link"  value="Adicionar ao Carrinho">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////////////////////////////////////////////////////// -->
            </div>



        <?php } ?>
    </div>


</section>



<?php require_once("footer.php") ?>