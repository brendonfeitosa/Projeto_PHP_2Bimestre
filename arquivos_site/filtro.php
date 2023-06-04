<form class="justify-content-center justify-content-md-start" method="GET" action="">
    <!--faz alinhamento  -->

    <div class="input-group input-group-sm"><!-- BUSCA  -->
        <input type="text" class="form-control" placeholder="Digite aqui o que procura" name="pesquisa">
        <button class="btn btn-danger" name="buscar">
            Buscar
        </button>
        <a class="btn btn-secondary" href="cardapioTeste1.php">Limpar</a>
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
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="card text-center bg-light m-2 d-flex " style="width: 16rem;">
                        <img src="<?= $row['image_url'] ?>" class="card-img-top" alt="...">
                        <h4 class="card-title"><?= $row['nome'] ?></h4>
                        <h4 class="card-title">R$ <?= $row['preco'] ?></h4>
                        <p class="card-text truncate-3l"><?= substr($row['descricao'], 0, 40) ?></p>
                        <button class="btn btn-success">Adicionar ao Carrinho</button>
                    </div>
                <?php }
            } else {
                echo '<p class="text-center">Produto não encontrado.</p>';
            }

            // Fechar a conexão com o banco de dados
            mysqli_close($conn);
        }
    }
    ?>
</form>
<form class="ml-3 d-inline-block" method="GET">
        <select class="form-select form-select-sm" name="categoria" onchange="this.form.submit()">
            <option value="">Selecione a categoria</option>
            <?php
           
            // Conexão com o banco de dados
            $conn ;
            if ($conn->connect_error) {
                die("Erro na conexão com o banco de dados: " . $conn->connect_error);
            }

            // Consulta para obter as categorias disponíveis
            $sql1 = "SELECT tipo_cod, tipo_nome FROM Tipo_produto";
            $resultado = $conn->query($sql1);

            // Exibição das opções da lista suspensa com as categorias
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $tipoCod = $row["tipo_cod"];
                    $tipoNome = $row["tipo_nome"];
                    echo "<option value='$tipoCod'>$tipoNome</option>";
                }
            }

            ?>
        </select>
    </form>

    <?php
    // Verificar se uma categoria foi selecionada
    if (isset($_GET["categoria"]) && !empty($_GET["categoria"])) {
        $categoria = $_GET["categoria"];

 
        // Conexão com o banco de dados
        $conn;
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Consulta para obter os produtos da categoria selecionada
        $sql1 = "SELECT * FROM Produto WHERE tipo_cod = '$categoria'";
        $result = $conn->query($sql1);

        // Exibição dos resultados 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="card text-center bg-light m-2 d-flex " style="width: 16rem;">
                    <img src="<?= $row['image_url'] ?>" class="card-img-top" alt="...">
                    <h4 class="card-title"><?= $row['nome'] ?></h4>
                    <h4 class="card-title">R$ <?= $row['preco'] ?></h4>
                    <p class="card-text truncate-3l"><?= substr($row['descricao'], 0, 40) ?></p>
                    <button class="btn btn-success">Adicionar ao Carrinho</button>
                </div>
            <?php }
        } else {
            echo "Nenhum resultado encontrado.";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    }
    ?>