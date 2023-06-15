<?php
require_once("header.php");
if (isset($_SESSION['carrinho'])) {

    if ($_SESSION['id'] == "") {
        header("Location:login.php");
    }
}
$vl_total_item = 0;

//print_r($_SESSION['carrinho']);




$sql = "select * from produto";
$result = $conn->query($sql);

foreach ($_SESSION['carrinho'] as $chave => $produto) {
    if ($produto != null) {
        $vl_total_item += $produto['preco'] * $produto['qtd'];
    }
}

$sql1 = "select * from tipo_pagamento;";
$result1 = $conn->query($sql1);




if (isset($_POST['finalizar'])) {


    $sql2 = "INSERT INTO pedido (tipo_pagamento_cod,cliente_cli_id, valor_total) VALUES ({$_POST['pgto']}, {$_SESSION['id']},$vl_total_item)";
    //   print_r($_POST);
    // echo $sql2;
    $result = $conn->query($sql2);
    $ultimopedido = "SELECT MAX(ped_num) as maxId FROM pedido;";
    $result3 = $conn->query($ultimopedido);

    $pedidoNum = mysqli_fetch_assoc($result3);

    $sql2 = "";
    if ($result) {
        foreach ($_SESSION['carrinho'] as $key => $value) {
            if ($value != null) {
                $cod = $value['cod'];
                $qtd = $value['qtd'];
                $vlUnitario = $value['preco'];
                $vlTotal =  $vlUnitario  * $qtd;

                $sql2 = "INSERT INTO produto_has_pedido ( produto_codigo,pedido_ped_num,qtde,valorUinitario, desconto,subtotal)";
                $sql2 .= "  VALUES($cod,{$pedidoNum['maxId']},$qtd,$vlUnitario,0,$vlTotal);";

                $result = $conn->query($sql2);
            }
        }
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

                    <th scope="col" >Nome</th>
                    <th scope="col" class="text-center" >Quantidade</th>
                    <th scope="col"  class="text-center">Valor Unitario</th>
                    <th scope="col" class="text-center">Valor Total</th>
                    <th scope="col"  class="text-center">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <form method="post" action="verificar_pedido.php" class="text-center">

                    <?php

                    // print_r($_SESSION['carrinho']);
                    $somaTotal = 0;
                   // print_r($_SESSION);
                    foreach ($_SESSION['carrinho'] as $chave => $produto) {
                        if ($produto != null) { ?>
                            <tr>

                                <td><?= $produto['nomeprod'] ?></td>
                                <td  class="text-center">
                                    <?= $produto['qtd'] ?>
                                </td>
                                <td  class="text-center">R$

                                    <?= number_format($produto['preco'], 2, ',', '.') ?>
                                </td>
                                <td  class="text-center">R$ <?= number_format($produto['preco'] * $produto['qtd'], 2, ',', '.') ?></td>

                                <td class="text-center">

                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">


                                        
                                        <button class="btn btn-danger" onclick="confirm('Deseja excluir o registro?')">
                                            <a style="color:white; text-decoration: none;" href="alterarCarrinho.php?item=<?= $produto['cod']?>">Excluir</a>

                                        </button>

                                    </div>

                                </td>

                            </tr>

                    <?php
                    $somaTotal += $produto['preco'] * $produto['qtd'];

                        }
                    } ?>
                    <tr>
                        <th colspan="2"></th>
                        <th  class="text-center">Total</th>
                        <th  class="text-center">R$ <?= number_format($somaTotal,2,',','.')?></th>
                        <th colspan="2"></th>
                    </tr>
            </tbody>
        </table>



        <div class="text-center">
            <?php
            while ($tppgto = mysqli_fetch_array($result1)) { ?>

                <label for="pgto"><?= strtoupper($tppgto['nome']) ?></label>
                <input type="radio" name="pgto" <?= $tppgto['cod'] == 9 ? 'checked' : '' ?> id="pgto" value="<?= $tppgto['cod'] ?>">&nbsp;
            <?php } ?>
            <br />
            <br />

            <input type="submit" class="btn btn-outline-success" name="finalizar" value="Finalizar Pedido" />
        </div>

        </form>

    </section>

    </form>
    </div>
    </div>

<?php } ?>
<?php require_once("footer.php") ?>