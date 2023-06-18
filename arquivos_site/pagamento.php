<?php
require_once("./header.php");

$num = "";
$somaTotal = 0;
$identificador = "";
$endcod = "";
//print_r($_GET);

if (isset($_GET['numped'])) {
    $num = $_GET['numped'];
    $endcod = $_GET['endcod'];
    $sql1  = "select p.valor_total, t.nome from pedido p, tipo_pagamento t ";
    $sql1 .= "where p.tipo_pagamento_cod = t.cod and ped_num = {$_GET['numped']};";
    $rest = $conn->query($sql1);
    $row = mysqli_fetch_assoc($rest);
    $identificador = $row['nome'];
}

if (isset($_POST['btnPagar'])) {
    $somaTotal = $_POST['total'];

    //----------------- validar metodo de pagamento ------------------------
    $identificador = $_POST['identificador'];
    // -------------------------------------------------------------------

    $num = $_POST['num'];

    //-----------------------------pagamento--------------------------------------//
    $sql = "INSERT INTO pagamento(identificador,valor,ped_num) ";
    $sql .= " VALUES('{$identificador}',{$somaTotal},$num);";

    $result = $conn->query($sql);

    if ($result) {

        unset($_SESSION['carrinho']);
        header("Location:pedidos.php");
    } else {
        $msg_err = "Não foi possivel realizar o pagameto";
        header("Location:verificar_pedido.?msg_err={$msg_err}");
    }


    //---------------------------------------------------------------------------//
}



?>
<section class="container_card">

    <table class="table">
        <thead>
            <tr>

                <th scope="col">Nome</th>
                <th scope="col" class="text-center">Quantidade</th>
                <th scope="col" class="text-center">Valor Unitario</th>
                <th scope="col" class="text-center">Valor Total</th>

            </tr>
        </thead>
        <tbody>
            <form method="post" action="pagamento.php" class="text-center">

                <?php


                foreach ($_SESSION['carrinho'] as $chave => $produto) {
                    if ($produto != null) { ?>
                        <tr>

                            <td><?= $produto['nomeprod'] ?></td>
                            <td class="text-center">
                                <?= $produto['qtd'] ?>
                            </td>
                            <td class="text-center">R$

                                <?= number_format($produto['preco'], 2, ',', '.') ?>
                            </td>
                            <td class="text-center">R$ <?= number_format($produto['preco'] * $produto['qtd'], 2, ',', '.') ?></td>



                        </tr>

                <?php
                        $somaTotal += $produto['preco'] * $produto['qtd'];
                    }
                } ?>
                <tr>
                    <th colspan="2"></th>
                    <th class="text-center">Total</th>
                    <th class="text-center">R$ <?= number_format($somaTotal, 2, ',', '.') ?></th>

            
                <tr>
                    <td style="text-align: end;" class="align-items-center">
                        <?= $identificador ?>&nbsp;
                    </td>

                    <td class="text-end" colspan="2">
                        <input type="text"value="<?=$identificador=='PIX'?'8989434jajfsa00':''?>" 
                        class="input-group-text" 
                        style="height: 40px; width: 400px;margin-left: auto;" name="identificador">

                    </td>

                   <!--  <td class="d-flex align-items-center">

                    </td> -->

                    <td class="text-center align-items-center">
                        <input class="btn btn-primary" type="submit" value="Pagar" style="margin-right: auto;" name="btnPagar">
                    </td>

                </tr>
                <input type="hidden" name="total" value="<?= $somaTotal ?>">
                <input type="hidden" name="num" value="<?= $num ?>">
            </form>
        </tbody>
    </table>


</section>