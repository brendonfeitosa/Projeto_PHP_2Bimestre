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
                            <input type="text" class="form-control" placeholder="Digite aqui o que procura"
                                name="pesquisa">
                            <button class="btn btn-danger" name="buscar">
                                Buscar
                            </button>
                        </div>
                        <?php
                        // Verificar se o botão de busca foi clicado
                        if (isset($_GET['buscar'])) {
                            // Verificar se o campo de pesquisa está preenchido
                            if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
                                $pesquisa = $_GET['pesquisa'];

                                // Conectar ao banco de dados 
                                $conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                                if (!$conexao) {
                                    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
                                }

                                // Preparar a consulta SQL para buscar registros que correspondem à pesquisa
                                $sql = "SELECT * FROM tabela WHERE campo LIKE '%$pesquisa%'";

                                // Executar a consulta SQL
                                $resultado = mysqli_query($conexao, $sql);
                                if (!$resultado) {
                                    die('Erro na consulta: ' . mysqli_error($conexao));
                                }

                                // Exibir os resultados
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    // Faça algo com cada registro retornado, por exemplo, exibir em uma lista
                                    echo '<li>' . $row['campo'] . '</li>';
                                }

                                // Fechar a conexão com o banco de dados
                                mysqli_close($conexao);
                            }
                        }
                        ?>


                    </form>

                </div>
                <!-- paginas e ordenação -->
                <!--  <div class="col-12 col-md-7">
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

                </div> -->
            </div>
            <!-- linha separadora -->
            <hr class="mt-3">
            <div class="">
                <!-- 12 produtos -->
                
                    <!-- reponsividade de fora -->


                    <form action="" method="post" class="container_card d-flex flex-row">


                        <?php
                                while ($data = mysqli_fetch_array($result)) { ?>

                        <div class="card m-2" style="width: 16rem;">
                            <img src="<?= $data['image_url'] ?>" class="img_card" alt="...">
                            <h6><?= $data['nome'] ?></h6>

                            <h6><?= $data['preco'] ?></h6>



                            <p class="card-text"><?= substr($data['descricao'], 0, 40) ?></p>





                            <button class="btn btn-success">
                                Adicionar ao Carrinho
                            </button>





                        </div>
                        <?php } ?>

                    </form>



                    <!-- <img src="img/lasanha1.jpg" class="card-img-top">
                        <div class="card-header">
                             preço 
                            R$ 4,50

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Feijoada</h5>
                            <p class="card-tex"> when an unknown printer took a galley of type and scrambled it to make
                                a type specimen book. It ha</p>
                        </div>
                        <div class="card-footer">
                            <form class="d-block">

                                <button class="btn btn-success">
                                    Adicionar ao Carrinho
                                </button>
                            </form>

                        </div> -->

                </div>
                <!-- 
                       teste

                     -->


                <hr class="mt-3">
                <!-- <div class="row pb-4">
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
                </div>-->

            </div>
        </div>
        

    </main>

</body>

<?php require_once("footer.php") ?>