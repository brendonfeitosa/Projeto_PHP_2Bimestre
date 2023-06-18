<?php
require_once("header.inc.php");
$display = "";
$aviso = "";
if (!isset($_SESSION['login_adm']) || $_SESSION['login_adm'] != true) {

    header("Location: login_adm.php");
}

$sql ="SELECT pg.pag_id, p.ped_num,tp.nome modo,pg.valor,p.ped_data, c.nome, e.logradouro, e.numero ";
$sql .= " FROM pagamento pg inner join pedido p on pg.ped_num = p.ped_num ";
$sql .= "inner join cliente c on c.cli_id = p.cliente_cli_id ";
$sql .= " inner join tipo_pagamento tp on p.tipo_pagamento_cod = tp.cod ";
$sql .= "inner join endereco e on e.cliente_cli_id = c.cli_id where e.end_cod = p.cod_entrega";

$result = $conn->query($sql);


mysqli_close($conn);
?>
<section style="width: 100%;">


    <div class="col-12 m-auto">
        <h1>Pagamentos</h1>
        <hr>
        <br>
        <div class="col-8 m-auto text-center"> <!-- temos que centrarlizar direito -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">Pedido</th>
                        <th scope="col">Modo</th>
                        <th scope="col">valor</th>

                        <th scope="col">Data</th>
                        <th scope="col">nome</th>
                        <th scope="col">Rua</th>
                        <th scope="col">numero</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    <?php
                    while ($data = mysqli_fetch_array($result)) {


                    ?>
                        <tr>
                            <th scope="row"><?= $data['pag_id'] ?></th>
                            <td><?= $data['ped_num'] ?></td>
                            <td><?= $data['modo'] ?></td>
                            <td> R$ <?= number_format($data['valor'],2,',','.') ?></td>
                            <td><?= date("d/m/Y", strtotime($data['ped_data'])) ?></td>
                            <td><?= $data['nome'] ?></td>
                            <td ><?= $data['logradouro'] ?></td>
                            <td ><?= $data['numero'] ?></td>
                            
                           
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once("../footer.php") ?>