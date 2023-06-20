<section class="col-10 m-auto text-center">
    <form class="justify-content-center justify-content-md-start" method="GET" action="">
        <!--faz alinhamento  -->

        <div class="input-group input-group-sm"><!-- BUSCA  -->

            <?php
            $sql = "select cod, nome from tipo_pagamento";
            $resp = $conn->query($sql);
            ?>

            <select name="modo" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">-----</option>
                <?php
                while ($tp = mysqli_fetch_array($resp)) {
                ?>

                    <option value="<?= $tp['nome'] ?>">
                        <?= $tp['nome'] ?>


                    </option>
                <?php } ?>
            </select>
            <!--  <input type="text" class="form-control" placeholder="Digite o modo" name="modo"> -->
            &nbsp;&nbsp;



            <input type="text" class="form-control" placeholder="Digite o nome do cliente" name="pesquisa">
            &nbsp;
            &nbsp;


            <input type="date" class="form-control" placeholder="Informe a data Inicial" name="data1">
            &nbsp;
            <input type="date" class="form-control" placeholder="Informe a data final" name="data2">
            <button class="btn btn-danger" name="buscar">
                Buscar
            </button>
            <a class="btn btn-secondary" href="pagamentos.php">Limpar</a>
        </div>
    </form>
</section>
<?php
// Verificar se o botão de busca foi clicado
if (isset($_GET['buscar'])) {
    // Verificar se o campo de pesquisa está preenchido
    if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
        $pesquisa = $_GET['pesquisa'];


        // Preparar a consulta SQL para buscar registros que correspondem à pesquisa
        $sql = "SELECT pg.pag_id, p.ped_num, tp.nome AS modo, pg.valor, p.ped_data, c.nome, pg.cancelado, e.logradouro, e.numero ";
        $sql .= "FROM pagamento pg ";
        $sql .= "INNER JOIN pedido p ON pg.ped_num = p.ped_num ";
        $sql .= "INNER JOIN cliente c ON c.cli_id = p.cliente_cli_id ";
        $sql .= "INNER JOIN tipo_pagamento tp ON p.tipo_pagamento_cod = tp.cod ";
        $sql .= "INNER JOIN endereco e ON e.cliente_cli_id = c.cli_id ";
        $sql .= "WHERE e.end_cod = p.cod_entrega and c.nome like '%$pesquisa%' ";

        // Executar a consulta SQL  

    }
    if (isset($_GET['modo']) && !empty($_GET['modo'])) {

        $modo = $_GET['modo'];
        $sql = "SELECT pg.pag_id, p.ped_num, tp.nome AS modo, pg.valor, p.ped_data, c.nome, pg.cancelado, e.logradouro, e.numero ";
        $sql .= "FROM pagamento pg ";
        $sql .= "INNER JOIN pedido p ON pg.ped_num = p.ped_num ";
        $sql .= "INNER JOIN cliente c ON c.cli_id = p.cliente_cli_id ";
        $sql .= "INNER JOIN tipo_pagamento tp ON p.tipo_pagamento_cod = tp.cod ";
        $sql .= "INNER JOIN endereco e ON e.cliente_cli_id = c.cli_id ";
        $sql .= "WHERE e.end_cod = p.cod_entrega and tp.nome like '%$modo%' ";

    }
    if (isset($_GET['data1']) && !empty($_GET['data1'])) {

        $data1 = $_GET['data1'];
        $data2 = $_GET['data2'];

        $sql = "SELECT pg.pag_id, p.ped_num, tp.nome AS modo, pg.valor, p.ped_data, c.nome, pg.cancelado, e.logradouro, e.numero ";
        $sql .= "FROM pagamento pg ";
        $sql .= "INNER JOIN pedido p ON pg.ped_num = p.ped_num ";
        $sql .= "INNER JOIN cliente c ON c.cli_id = p.cliente_cli_id ";
        $sql .= "INNER JOIN tipo_pagamento tp ON p.tipo_pagamento_cod = tp.cod ";
        $sql .= "INNER JOIN endereco e ON e.cliente_cli_id = c.cli_id ";
        $sql .= "WHERE e.end_cod = p.cod_entrega and p.ped_data between '{$data1}' and '{$data2}'";
    }

    $result = mysqli_query($conn, $sql);
?>

    <br />
    <!--  <div class="container">
    
 -->
    <div class="col-12 m-auto" style="width: 100%;">
        <h6>Busca Histórico de Pagamentos</h6>
        <hr>
        <br>
        <div class="col-8 m-auto text-center"> <!-- temos que centrarlizar direito -->
            <table class="table table-bordered">
                <thead>
                    <tr class="">
                        <th scope="col">Nº</th>
                        <th scope="col">Pedido</th>
                        <th scope="col">Modo</th>
                        <th scope="col">Valor</th>

                        <th scope="col">Data</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Rua</th>
                        <th scope="col">Número</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    <?php
                    while ($row = mysqli_fetch_array($result)) {


                    ?>

                        <tr class="<?= ($row['cancelado'] == 1) ? 'pg-cancelado' : 'pg-pago' ?>">
                            <th scope="row"><?= $row['pag_id'] ?></th>
                            <td><?= $row['ped_num'] ?></td>
                            <td><?= $row['modo'] ?></td>
                            <td> R$ <?= number_format($row['valor'], 2, ',', '.') ?></td>
                            <td><?= date("d/m/Y", strtotime($row['ped_data'])) ?></td>
                            <td><?= $row['nome'] ?></td>
                            <td><?= $row['logradouro'] ?></td>
                            <td><?= $row['numero'] ?></td>
                            <td><?= ($row['cancelado'] == 1) ? 'Cancelado' : 'Pago' ?></td>


                        </tr>

                    <?php } ?>


                </tbody>
            </table>
        </div>
    </div>
    <!-- </div> -->

<?php } ?>