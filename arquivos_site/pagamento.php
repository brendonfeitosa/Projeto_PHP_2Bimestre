<?php
require_once("./header.php");
require_once("./utils/connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
}
//print_r($_GET);

if (isset($_GET['numped'])) {
    $num = $_GET['numped'];
    $endcod = $_GET['endcod'];
    $sqlsum  = "select valor_total from pedido where ped_num = {$_GET['numped']};";
    $rest = $conn->query($sqlsum);
    $ttl = mysqli_fetch_assoc($rest);
    // print_r($ttl);
    //-----------------------------pagamento--------------------------------------//
    $sql = "INSERT INTO pagamento(identificador,valor,ped_num,cod_entrega) ";
    $sql .= " VALUES('cartão',{$ttl['valor_total']},$num, $endcod);";
    //echo $sql;

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

                // print_r($_SESSION['carrinho']);
                $somaTotal = 0;
                // print_r($_SESSION);
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
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <th colspan="2">numero cartão</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">botão</th>
                    <th colspan="2"></th>
                </tr>
        </tbody>
    </table>

    <form action="">


    </form>
</section>