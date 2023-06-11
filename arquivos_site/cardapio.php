<?php require_once("header.php"); ?>
<?php
$qtd = 0;
$vl_unitario = 0;
$vl_total = 0;

$sql = "select * from produto";

$resultado = $conn->query($sql);


$result = $conn->query($sql);

$result1 = $conn->query($sql);
$data1 = mysqli_fetch_array($result1);

$vetcar = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $codigo = $_POST['cod'];
    $qtd = $_POST['qtd'];
    $vl_unitario = $_POST['preco'];
    $vl_total = $qtd * $vl_unitario;

    //$_SESSION['carrinho'] = true;
    // $_SESSION['carrinho'] = array();
    /* $item = array();
    array_push($item, $codigo, $qtd, $vl_unitario); */
}

if (isset($_POST['finalizarpedido'])) {
    if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
        header("Location: login_adm.php");
        echo "Bem vindo!";

        $nomeCliente = $_SESSION['nome'];
    }
}


if (isset($_GET['limpar'])) {

    session_destroy();
    unset($_SESSION['carrinho']);/*  */
}



?>

<a href="cardapio.php?limpar=1">Limpar</a>
<section class="cl_filtro">
    <?php
    require_once('filtro.php');
    ?>
</section>
<section class="container_card ">
    <div class="row text-center">


        <div class="text">
            <h4 class="text-center">CARDÁPIO</h4>
        </div>
        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
            <div class="card m-2" style="width: 16rem;height: 380px; ">

                <form action="carrinho.php" method="post">
                    <input type="hidden" name="cod" value="<?= $data['codigo'] ?>">
                    <strong class="card-text1"><?= $data['nome'] ?> </strong>
                    <img src="<?= $data['image_url'] ?>" class="img_card2" alt="...">

                    <div class="text-descr"><?= substr($data['descricao'], 0, 40) ?></div>
                    <div style="margin-top: 5px;">

                        Quantidade: <input type="number" name="qtde" class="tm_input" min="1" value="1" /> <br />
                        <input type="submit" name="addcarrinho" id="addcarrinho" class="btn btn-success" value="Adicionar ao Carrinho" />
                    </div>
                </form>
            </div>
        <?php }

        ?>
    </div>

</section>

<section>

    <<table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
        </table>

</section>

<!--  -->
<?php require_once("footer.php") ?>