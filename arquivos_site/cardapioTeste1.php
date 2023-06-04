
<?php require_once("header.php"); ?>
<?php
$sql = "select * from produto ";

$result = $conn->query($sql);
$resultado = $conn->query($sql);


?>

<body style="min-width: 372px;">

    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

    <main class="mb-5 pb-5 mb-md-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <!-- FORMULARIO DE PESQUISA -->
                    <?php require_once('filtro.php')?>

                </div>
                <!-- paginas e ordenação -->
                <div class="col-12 col-md-7"><!-- ORDENAÇÃO HEAD -->
                    <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                        <form class="ml-3 d-inline-block">

                            <select class="form-select form-select-sm">
                                <option> Ordenar pelo nome</option>
                                <option> Ordenar menor preço</option>
                                <option> Ordenar maior preço</option>
                            </select>

                        </form>
                        <nav class="d-inline-block">
                            <ul class="pagination pagination-sm my-0">
                                <li class="page-item">
                                    <button class="page-link">1</button>
                                </li>
                                <li class="page-item">
                                    <button class="page-link">2</button>
                                </li>
                                <li class="page-item disabled">
                                    <button class="page-link">3</button>
                                </li>
                                <li class="page-item">
                                    <button class="page-link">4</button>
                                </li>
                                <li class="page-item">
                                    <button class="page-link">5</button>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <hr class="mt-3"><!-- linha separadora -->

            <div class="row "> <!-- LISTAGEM PRODUTOS -->
                <form action="" method="post" class="  d-flex flex-row ">
                    <?php
                        while ($data = mysqli_fetch_array($result)) { ?>

                        <div class="card text-center bg-light m-2" style="width: 16rem;">
                            <img src="<?= $data['image_url'] ?>" class="card-img-top" alt="...">
                            <h4 class="card-title"><?= $data['nome'] ?></h4>

                            <h4 class="card-title">R$ <?= $data['preco'] ?></h4>

                            <p class="card-text truncate-3l"><?= substr($data['descricao'], 0, 40) ?></p>

                            <button class="btn btn-success">
                                Adicionar ao Carrinho
                            </button>
                        </div>
                    <?php } ?>
                </form>
            </div>

            <hr class="mt-3">

            <div class="row pb-4"><!-- ORDENAÇÃO FOOTER -->
                <div class="col-12">
                    <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                        <form class="ml-3 d-inline-block">

                            <select class="form-select form-select-sm">
                                <option> Ordenar pelo nome</option>
                                <option> Ordenar menor preço</option>
                                <option> Ordenar maior preço</option>
                            </select>

                        </form>
                        <nav class="d-inline-block">
                            <ul class="pagination pagination-sm my-0">
                                <li class="page-item">
                                    <button class="page-link">1</button>
                                </li>
                                <li class="page-item">
                                    <button class="page-link">2</button>
                                </li>
                                <li class="page-item disabled">
                                    <button class="page-link">3</button>
                                </li>
                                <li class="page-item">
                                    <button class="page-link">4</button>
                                </li>
                                <li class="page-item">
                                    <button class="page-link">5</button>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<?php require_once("footer.php") ?>