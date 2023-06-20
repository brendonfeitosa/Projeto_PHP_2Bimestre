<?php require_once("header.php"); ?>
<?php
$qtd = 0;
$vl_unitario = 0;
$vl_total = 0;
$cod = "";


$sql = "select * from produto";

$resultado = $conn->query($sql);


$result = $conn->query($sql);

$result1 = $conn->query($sql);
$data1 = mysqli_fetch_array($result1);

$vetcar = [];


if (isset($_POST['finalizarpedido'])) {
    if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
        header("Location: login_adm.php");
        echo "Bem vindo!";

        $nomeCliente = $_SESSION['nome'];
    }
}


?>
<?php
require_once('filtro.php');
?>

<div class="text">
    <h4 class="text-center">CARDÁPIO</h4>
</div>



<section class="container_card">

    <!-- Vertically centered scrollable modal -->
    <div class="text-end" style="width: 99%;">

        <button type="button" class="btn btn-link text-saiba " data-bs-toggle="modal" data-bs-target="#modal1">
            <?=isset($_SESSION['carrinho'])?'Carrinho':''?> 
        </button>
    </div>

    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Carrinho</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Valor Unitario</th>
                                <th scope="col">Valor Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($_SESSION['carrinho'] as $chave => $produto) {

                                if ($produto != null) {
                            ?>
                                    <tr>
                                        <td><?= $produto['nomeprod'] ?></td>
                                        <td><?= $produto['qtd'] ?></td>
                                        <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                                        <td>R$ <?= number_format($produto['preco'] * $produto['qtd'], 2, ',', '.') ?></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link-secondary" data-bs-dismiss="modal">Fechar</button>
                    <form method="post" action="verificar_pedido.php">
                        <input type="submit" class="btn btn-outline-success" value="Finalizar Pedido" />
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- ////////////////////////////////////////////////////////////////// -->


    <div class="row text-center">
        <hr>


        <?php while ($data = mysqli_fetch_assoc($result)) {
            //print_r($data);
        ?>
            <br />
            <div class="card m-2 card-produto" style="height: 390px; ">
                <?php
                if ($data['promo'] > 0) {
                    $preco =  $data['preco'] - ($data['preco']*$data['desconto']/100);
                } 
                ?>
                <form action="carrinho.php" method="post">
                    <input type="hidden" name="cod" value="<?= $data['codigo'] ?>">
                    <input type="hidden" name="preco" value="<?= $preco ?>">
                    <input type="hidden" name="nomeprod" value="<?= $data['nome'] ?>">
                    <input type="hidden" name="promo" value="<?= $data['promo'] ?>">
                    <input type="hidden" name="desconto" value="<?= $data['desconto'] ?>">
                    <strong class="card-text1"><?= $data['nome'] ?> </strong>
                    <img src="<?= $data['image_url'] ?>" class="img_card2" alt="...">



                    <div class="text-descr"><?= substr($data['descricao'], 0, 40) ?></div>
                    <div class="cor-preco">

                        R$ <?= number_format($data['preco'], 2, ',', '.') ?>

                        <span class="cor-promo"> <?= $data['promo'] > 0 ? ' &nbsp;Promoção ' : '' ?></span>

                        
                        <?= $data['promo'] > 0 ? 'R$ '. number_format($preco, 2, ',', '.')  : '' ?>
                    </div>
                    <div style="margin-top: 2px;">

                        Quantidade: <input type="number" name="qtd" class="tm_input" min="1" value="1" /> <br />
                        <input type="submit" name="addcarrinho" id="addcarrinho" class="btn btn-success" value="Adicionar ao Carrinho" />
                    </div>
                </form>
            </div>
        <?php }

        ?>
    </div>

</section>
<?php if (isset($_SESSION['carrinho'])) { ?>
    <section class="container_card">

        <div class="text" style="width: 100%;">
            <h4 class="text-center">ITENS ADICIONADOS</h4>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor Unitario</th>
                    <th scope="col">Desconto</th>
                    <th scope="col">Valor Total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                 // print_r($_SESSION['carrinho']);

                foreach ($_SESSION['carrinho'] as $chave => $produto) {

                    if ($produto != null) {
                         //print_r($produto);
                ?>
                        <tr>
                            <td><?= $produto['nomeprod'] ?></td>
                            <td><?= $produto['qtd'] ?></td>
                            <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                            <td><?=(isset($produto['desconto']))? $produto['desconto'].'%':'' ?></td>
                            <td>R$ <?= number_format($produto['preco'] * $produto['qtd'], 2, ',', '.') ?></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
        <form method="post" action="verificar_pedido.php" class="text-center" style="width: 100%;">
            <input type="submit" class="btn btn-outline-success" value="Finalizar Pedido" />
        </form>
    </section>

    <!--  -->
<?php
}

require_once("footer.php") ?>