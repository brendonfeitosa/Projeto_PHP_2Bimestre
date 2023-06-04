<?php require_once("header.php"); ?>

<!-- carrosel -->
<div id="carouselExampleIndicators" class="carousel slide col-11 m-auto" data-bs-ride="true">
    <div class="carousel-indicators" style="margin-bottom: 0;">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/pizza1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./img/lasanha1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./img/massa1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./img/pudim2.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<br><br>
<?php
$sql = "select * from produto ";

$result = $conn->query($sql);




?>

<!-- cards -->

<h4 class="text-center">ALGUNS DE NOSSOS PRODUTOS</h4>
<form action="" method="post">
    <section class="container_card">

        <?php
        while ($data = mysqli_fetch_array($result)) { ?>


            <div class="card m-2" style="width: 16rem;">
                <h6><?= $data['nome'] ?></h6>
                <div>

                    <img src="<?= $data['image_url'] ?>"
                    class="img_card" alt="...">
                </div>
                <p class="card-text"><?= substr($data['descricao'],0,40) ?></p>
                <div class="bts">
                    <button type="button" class="btn2" name="btn" id="subtract">
                        <img src="./public/icons/icons8-menos-96.svg" class="tt" width="10" alt="">
                    </button>
                    <input class="n-pedido" readonly type="text" id="<?= $data['codigo'] ?>" name="<?= $data['codigo'] ?>" value="" size="2">
                    <button type="button" class="btn2" id="add" value="?" name="btn" onclick="addCarrinho();">
                        <img src="./public/icons/mais.svg" width="10" alt="">
                    </button>
                </div>
            </div>



        <?php } ?>


        <script type="text/javascript">
            function addCarrinho(id) {
                // alert(cp);

                alert(id);
                alert(document.getElementById(id).value)

                let x = document.getElementById(id).value;
                if (x == "") {

                    document.getElementById(id).value = 1;
                } else {

                    document.getElementById(id).value = parseInt(x) + 1;
                }

            }
            /* var btn = document.getElementById('add');
            btn.onclick = function() {


                //alert(this.name); // alerta 'seuid'
                let x = document.getElementById('pro').value;
                if (x == "") {

                    document.getElementById('pro').value = 1;
                } else {

                    document.getElementById('pro').value = parseInt(x) + 1;
                }

            }

            var btn = document.getElementById('subtract');
            btn.onclick = function() {


                //alert(this.name); // alerta 'seuid'
                let x = document.getElementById('pro').value;
                if (x > 0) {

                    document.getElementById('pro').value = parseInt(x) - 1;
                }

            } */
        </script>



    </section>

</form>
<hr>




















<?php require_once("footer.php") ?>