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
    $_SESSION['carrinho'] = array();
    $item= array();
    array_push($item,$codigo,$qtd,$vl_unitario);


   // if(count($_SESSION['carrinho']) == 0){
       
        $_SESSION['carrinho']= $item;

  //  }else{
        //$carrinho [] = $item; 
  //  }
 

   
    print_r($_SESSION);
}

if (isset($_POST['finalizarpedido'])) {
    if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
        header("Location: login_adm.php");
        echo "Bem vindo!";

        $nomeCliente = $_SESSION['nome'];
    }
}



require_once('filtro.php');
?>
<div class="text">
    <h4 class="text-center">CARDÁPIO</h4>
</div>
<?php while ($data = mysqli_fetch_assoc($result)) { ?>
    <div class="card text-center bg-light m-2 d-flex " style="width: 16rem;">
        <form action="" method="post">
            <img src="<?= $data['image_url'] ?>" class="card-img-top" alt="...">
            <h4 class="card-title"><?= $data['nome'] ?></h4>
            <h4 class="card-title">R$ <?= $data['preco'] ?></h4>
            <input type="hidden" name="preco" value="<?= $data['preco'] ?>">
            <input type="hidden" name="cod">
            <p class="card-text truncate-3l"><?= substr($data['descricao'], 0, 40) ?></p>
            <div class="justify-content-center">
                <div>
                    Quantidade:
                </div>
                <div>
                    <select name="qtd" id="qtd" min="1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <br>
            </div>
            <input type="submit" name="addcarrinho" id="addcarrinho" class="btn btn-success" value="Adicionar ao Carrinho">
        </form>
    </div>
<?php }

?>
</div>

<?php
if (isset($_GET['addcarrinho'])) {
    if ($vetcarrinho == null) {

        $vetcarrinho = array($codigo, $nome, $qtd, $vl_unitario, $vl_total);

?>
        <div class="row ">
            <div class="text">
                <h4 class="text-center">ITENS ADICIONADOS</h4>
            </div>
            <div class="row justify-content-center">
                <div class="col-11">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Valor Unitário</th>
                                <th scope="col">Valor Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"><?= $nome ?></td>
                                <td><?= $qtd ?></td>
                                <td>R$ <?= number_format($vl_unitario, 2, ',', '.') ?></td>
                                <td>R$ <?= number_format($vl_total, 2, ',', '.') ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="" method="post">
                        <a href="verificar_pedido.php"><button class="btn btn-success" type="button" name="finalizarpedido" id="finalizarpedido">Finalizar Pedido</button></a>
                    </form>
            <?php
        }
    }
            ?>



                </div>
            </div>
        </div>
        <?php require_once("footer.php") ?>