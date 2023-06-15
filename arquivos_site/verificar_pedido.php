<<<<<<< HEAD
<?php
require_once("header.php");
if (isset($_SESSION['carrinho'])) {

    if ($_SESSION['id'] == "") {
        header("Location:login.php");
    }
}
$vl_total_item = 0;

//print_r($_SESSION['carrinho']);

if ($_SESSION['carrinho'] == null) {
    header("Location:cardapio.php");
}


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
    $endcod = $_POST['endereco'];
    $result = $conn->query($sql2);
    $ultimopedido = "SELECT MAX(ped_num) as maxId FROM pedido;";
    $result3 = $conn->query($ultimopedido);

    $pedidoNum = mysqli_fetch_assoc($result3);
    $pdNum = $pedidoNum['maxId'];

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
                //  $result = $conn->query($sql2);
               // echo $sql2." ".$endcod;
            }
        }
    }

    //-----------------------------pagamento--------------------------------------//

    // Realizar pagamento 
    header("Location:pagamento.php?numped={$pdNum}&endcod={$endcod}");
    //---------------------------------------------------------------------------//





}



?>
<?php if (isset($_SESSION['carrinho'])) { ?>
    <section class="container_card">
        <div class="text">
            <h4 class="text-center">FINALIZAR PEDIDO</h4>
        </div>
        <div class="cl_filtro" style="margin-left: 0;">
            <label for="">Endereços de Entrega</label>
            <select class="form-select form-select-sm" name="endereco">

                <?php
                $endcod = 0;
                // Consulta para obter endereços
                $sql1 = "SELECT end_cod, bairro,logradouro, numero, cidade,comp ";
                $sql1 .= "FROM bd_resto.endereco where cliente_cli_id =" . $_SESSION['id'];
                $resultado = $conn->query($sql1);

                // Exibição das opções da lista suspensa com as categorias
                if ($resultado->num_rows > 0) {
                    while ($rows = $resultado->fetch_assoc()) {
                        $endcod = $rows['end_cod'];
                        $rua = $rows['logradouro'];
                        $numero = $rows['numero'];
                        $bairro = $rows['bairro'];
                        $cid = $rows['cidade'];
                        $comp = $rows['comp'];

                ?>

                        <option value="<?= $endcod ?>">
                            <?= $bairro ?>&nbsp;
                            Rua: <?= $rua ?>&nbsp;
                            Nº <?= $numero ?>&nbsp;
                            Compl.<?= $comp ?>&nbsp;
                            Cidade: <?= $cid ?>&nbsp;

                        </option>";
                <?php  }
                }
                ?>
            </select>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">Nome</th>
                    <th scope="col" class="text-center">Quantidade</th>
                    <th scope="col" class="text-center">Valor Unitario</th>
                    <th scope="col" class="text-center">Valor Total</th>
                    <th scope="col" class="text-center">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <form method="post" action="verificar_pedido.php" class="text-center">
                    <input type="hidden" name="endereco" value="<?= $endcod ?>">
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

                                <td class="text-center">

                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">



                                        <button class="btn btn-danger" onclick="confirm('Deseja excluir o registro?')">
                                            <a style="color:white; text-decoration: none;" href="alterarCarrinho.php?item=<?= $produto['cod'] ?>">Excluir</a>

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
                        <th class="text-center">Total</th>
                        <th class="text-center">R$ <?= number_format($somaTotal, 2, ',', '.') ?></th>
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

            <input type="submit" class="btn btn-outline-success" name="finalizar" value="Realizar Pagamento" />
        </div>

        <!-- ===================================================================================================================== -->

        <!-- ------------------------------------------------------------------------------------------------------------------- -->

=======
<?php require_once("header.php"); ?>
<div class="col-11 m-auto">
    <h1>Validar Pedido</h1>
    <hr>
    <br>
    <div class="col-8 m-auto text-center"> <!-- temos que centrarlizar direito -->
        <form action="" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Quantidade</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="row"></th>
                        <strong>
                            <th>Total</th>
                            <th>R$</th>
                        </strong>
                    </tr>
                </tfoot>
            </table>
            <button type="submit" class="btn btn-success">Finalizar pedido</button>
>>>>>>> parent of 075c600 (Merge branch 'main' into Evelin)
        </form>
    </div>
</div>


<?php require_once("footer.php") ?>