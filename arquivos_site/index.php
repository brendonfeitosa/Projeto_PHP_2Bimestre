<?php require_once('./header.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
       
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner" style="margin-left: auto; margin-right: auto;">
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
                <img src="./img/pudim2.jpg" alt="New York" class="d-block img_banner">
            </div>
            <div class="carousel-item">
                <img src="./img/pudim.png" alt="New York" class="d-block img_banner">
            </div>
            <div class="carousel-item">
                <img src="./img/manjarf1.jpg" alt="New York" class="d-block img_banner">
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
        <div class="row text-center">
           <?php
              while ($data = mysqli_fetch_array($result)) { ?>
           
            
                <div class="card m-2" style="width:16rem; padding:2px; ">
                    <h6 class="card-text1"><?= $data['nome'] ?></h6>
                  <!--   <div class="img_tama" alt="..."> -->

                        <img src="<?= $data['image_url'] ?>"
                        class="img_card" alt="...">
                    <!-- </div> -->
                    <p class="card-text"><?= substr($data['descricao'],0,40) ?></p>
                    <!-- <div class="bts">
                        <button type="button" class="btn2" name="btn" id="subtract">
                            <img src="./public/icons/icons8-menos-96.svg" class="tt" width="10" alt="">
                        </button>
                        <input class="n-pedido" readonly type="text" id="<?= $data['codigo'] ?>" name="<?= $data['codigo'] ?>" value="" size="2">
                        <button type="button" class="btn2" id="add" value="?" name="btn" onclick="addCarrinho();">
                            <img src="./public/icons/mais.svg" width="10" alt="">
                        </button>
                    </div> -->
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
                var btn = document.getElementById('add');
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

                } 
            </script> 
        </div>


    </section>

</form>
<hr>
                           
                     

<?php require_once("footer.php") ?>