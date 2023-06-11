<?php require_once("header.php");
$vl_total_item = 0;

print_r($_SESSION['carrinho']);

$sql = "select * from produto";
$result = $conn->query($sql);

foreach ($_SESSION['carrinho'] as $chave => $produto) { 
    $vl_total_item += $produto['preco'] * $produto['qtd'];
}

$sql2 = "INSERT INTO pedido (tipo_pagamento_cod, valor_total) VALUES (6, $vl_total_item)";

$result = $conn->query($sql2);

$sql2 = "";
if($result){
    foreach ($_SESSION['carrinho'] as $key => $value) {
        $cod = $value['cod'];
        
    }
}


?>
<?php if (isset($_SESSION['carrinho'])) { ?>
    <section class="container_card">
        <div class="text">
            <h4 class="text-center">FINALIZAR PEDIDO</h4>
        </div>
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

                // print_r($_SESSION['carrinho']);

                foreach ($_SESSION['carrinho'] as $chave => $produto) { ?>
                    <tr>

                        <td><?= $produto['nomeprod'] ?></td>
                        <td><?= $produto['qtd'] ?></td>
                        <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                        <td>R$ <?= number_format($produto['preco'] * $produto['qtd'], 2, ',', '.') ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <form method="post" action="verificar_pedido.php" class="text-center">


            <input type="submit" class="btn btn-outline-success" value="Finalizar Pedido" />

        </form>

    </section>

    </form>
    </div>
    </div>

<?php } ?>
<?php require_once("footer.php") ?>