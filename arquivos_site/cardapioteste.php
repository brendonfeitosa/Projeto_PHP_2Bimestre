<?php require_once("header.php"); ?>
<?php
$sql = "select * from produto ";

$result = $conn->query($sql);

?>

<body style="min-width: 372px;">

    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

    <main class="mb-5 pb-5 mb-md-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">

                    <form class="justify-content-center justify-content-md-start">
                        <!--faz alinhamento  -->

                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Digite aqui o que procura" name="pesquisa">
                            <button class="btn btn-danger" name="buscar">
                                Buscar
                            </button>
                        </div>
                        <div class="col-5">
                            <select name="categoria" class="form-select" id="categoria">
                                <option value="">Todas as categorias</option>
                                <option value="categoria1">Categoria 1</option>
                                <option value="categoria2">Categoria 2</option>
                                <option value="categoria3">Categoria 3</option>
                            </select>
                        </div>
                        <?php
                        // Verificar se o botão de busca foi clicado
                        if (isset($_GET['buscar'])) {
                            // Verificar se o campo de pesquisa está preenchido
                            if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
                                $pesquisa = $_GET['pesquisa'];

                                // Conectar ao banco de dados
                                $conn;
                                if (!$conn) {
                                    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
                                }

                                // Preparar a consulta SQL para buscar registros que correspondem à pesquisa
                                $sql = "SELECT * FROM produto WHERE nome LIKE '%$pesquisa%'";

                                // Executar a consulta SQL
                                $result = mysqli_query($conn, $sql);
                                if (!$result) {
                                    die('Erro na consulta: ' . mysqli_error($conn));
                                }

                                // Exibir os resultados
                                while ($row = mysqli_fetch_assoc($result)) { ?>

                                    <div class="card text-center bg-light m-2 d-flex " style="width: 16rem;">
                                        <img src="<?= $row['image_url'] ?>" class="card-img-top" alt="...">
                                        <h4 class="card-title"><?= $row['nome'] ?></h4>

                                        <h4 class="card-title">R$ <?= $row['preco'] ?></h4>

                                        <p class="card-text truncate-3l"><?= substr($row['descricao'], 0, 40) ?></p>

                                        <button class="btn btn-success">
                                            Adicionar ao Carrinho
                                        </button>
                                    </div>
                        <?php }

                                // Fechar a conexão com o banco de dados
                                mysqli_close($conn);
                            }
                        }
                        ?>
                    </form>
                </div>
                <!-- paginas e ordenação -->
                <div class="col-12 col-md-7">
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
            <!-- linha separadora -->
            <hr class="mt-3">
            <div class="row ">
                <!-- 12 produtos -->

                <!-- reponsividade de fora -->

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
            <div class="row pb-4">
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