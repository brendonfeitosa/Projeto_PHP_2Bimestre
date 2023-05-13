<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fatec Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar position-fixed col-12 navbar-expand-lg navbar-dark bg-dark" style="z-index: 999;">
        <div class="container-fluid col-11 m-auto">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <br><br><br>
    <!-- carrosel -->
    <div id="carouselExampleIndicators" class="carousel slide col-11 m-auto" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="height: 500px">
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
    <h4 class="text-center">PRODUTOS</h4>
    <div class="row row-cols-1 row-cols-md-3 g-4 col-11 m-auto">
        <div class="col">
            <div class="card">
                <img src="./img/lasanha2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
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