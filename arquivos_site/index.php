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

<!-- cards -->
<h4 class="text-center">ALGUNS DE NOSSOS PRODUTOS</h4>
<div class="row row-cols-1 row-cols-md-3 g-4 col-11 m-auto">
    <div class="col">
        <div class="card">
            <img src="./img/lasanha2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Lasanha Bolonhesa</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Veja mais
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="./img/lasanha2.jpg" class="card-img-top" alt="...">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est ipsa quaerat perspiciatis corporis fugiat provident quis corrupti? Quam quas laboriosam fuga expedita nihil distinctio ab, voluptas eos qui! Earum, nulla. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente soluta, aspernatur quisquam id asperiores dolore recusandae perspiciatis, deserunt minus nam placeat exercitationem, voluptate maxime quae! Quia porro ab ducimus voluptatem.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img src="./img/pizza2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Veja mais
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="./img/pizza2.jpg" class="card-img-top" alt="...">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est ipsa quaerat perspiciatis corporis fugiat provident quis corrupti? Quam quas laboriosam fuga expedita nihil distinctio ab, voluptas eos qui! Earum, nulla. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente soluta, aspernatur quisquam id asperiores dolore recusandae perspiciatis, deserunt minus nam placeat exercitationem, voluptate maxime quae! Quia porro ab ducimus voluptatem.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img src="./img/massa2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Veja mais
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="./img/massa2.jpg" class="card-img-top" alt="...">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est ipsa quaerat perspiciatis corporis fugiat provident quis corrupti? Quam quas laboriosam fuga expedita nihil distinctio ab, voluptas eos qui! Earum, nulla. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente soluta, aspernatur quisquam id asperiores dolore recusandae perspiciatis, deserunt minus nam placeat exercitationem, voluptate maxime quae! Quia porro ab ducimus voluptatem.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img src="./img/pitit-gateau1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Veja mais
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="./img/pitit-gateau1.jpg" class="card-img-top" alt="...">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est ipsa quaerat perspiciatis corporis fugiat provident quis corrupti? Quam quas laboriosam fuga expedita nihil distinctio ab, voluptas eos qui! Earum, nulla. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente soluta, aspernatur quisquam id asperiores dolore recusandae perspiciatis, deserunt minus nam placeat exercitationem, voluptate maxime quae! Quia porro ab ducimus voluptatem.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<!-- sessão -->
<div class="col-11 m-auto">
    <h4 class="text-center">Titulo</h4>
    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis error, itaque ad earum illum deleniti saepe corporis delectus voluptatum nostrum? Fugit doloribus quam neque culpa explicabo ipsum eos illo voluptate! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente ratione nam impedit suscipit, facilis hic eos maxime laudantium alias voluptatum et temporibus similique, eius distinctio quae quisquam delectus maiores cumque.</p>
</div>
<hr>


















<?php require_once("footer.php") ?>