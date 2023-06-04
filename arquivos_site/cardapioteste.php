<?php require_once("header.php"); ?>
<?php
$qtd = '';
$vl_unitario = '';
$vl_total = '';
$nome = '';

$sql = "select * from produto";

$result = $conn->query($sql);

$data = mysqli_fetch_array($result);

if (isset($_GET['addcarrinho'])) {
    $codigo = $data['codigo'];
    $nome = $data['nome'];
    $qtd = $_GET['qtd'];
    $vl_unitario = $data['preco'];
    $vl_total = $qtd * $vl_unitario;
}

?>
<div class="text">
    <h4 class="text-center">CARDÁPIO</h4>
</div>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="card text-center bg-light m-2 d-flex " style="width: 16rem;">
        <form action="" method="get">
            <img src="<?= $row['image_url'] ?>" class="card-img-top" alt="...">
            <h4 class="card-title"><?= $row['nome'] ?></h4>
            <h4 class="card-title">R$ <?= $row['preco'] ?></h4>
            <p class="card-text truncate-3l"><?= substr($row['descricao'], 0, 40) ?></p>
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

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
</div>
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
                    <tr>
                        <td scope="row"><?= $nome ?></td>
                        <td><?= $qtd ?></td>
                        <td>R$ <?= number_format($vl_unitario, 2, ',', '.') ?></td>
                        <td>R$ <?= number_format($vl_total, 2, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
            <form action="" method="get">
                <input type="submit" class="btn btn-success" value="Finalizar pedido">
            </form>
        </div>
    </div>
</div>
<?php require_once("footer.php") ?>