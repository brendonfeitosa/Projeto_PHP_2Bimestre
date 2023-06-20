<section class="col-10 m-auto text-center">
    <form class="justify-content-center justify-content-md-start" method="GET" action="">
        <!--faz alinhamento  -->

        <div class="input-group input-group-sm"><!-- BUSCA  -->


            <input type="text" class="form-control" placeholder="Digite o numero do pedido" name="numero">
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
            <a class="btn btn-secondary" href="pedidos.php">Limpar</a>
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
        $sql = "SELECT p.ped_num, c.nome, e.logradouro, ped_data, e.numero, e.comp, s.status ";
        $sql .= "FROM pedido p ";
        $sql .= "INNER JOIN cliente c ON p.cliente_cli_id = c.cli_id ";
        $sql .= "INNER JOIN endereco e ON c.cli_id = e.cliente_cli_id ";
        $sql .= "INNER JOIN status_pedido s ON s.status_id = p.status ";
        $sql .= "WHERE c.nome LIKE '%$pesquisa%' ";
    }
    if (isset($_GET['numero']) && !empty($_GET['numero'])) {


        $numero = $_GET['numero'];
        //por numero
        $sql = "SELECT p.ped_num, c.nome, e.logradouro, ped_data, e.numero, e.comp, s.status ";
        $sql .= " FROM pedido p INNER JOIN cliente c ON p.cliente_cli_id = c.cli_id INNER JOIN endereco e ";
        $sql .= " ON p.cod_entrega = e.end_cod INNER JOIN status_pedido s ON s.status_id = p.status  WHERE p.ped_num = {$numero} ";
    }


    if (isset($_GET['data1']) && !empty($_GET['data1'])) {
        $data1 = $_GET['data1'];
        $data2 = $_GET['data2'];

        $sql = "SELECT p.ped_num, c.nome, e.logradouro, ped_data, e.numero, e.comp, s.status ";
        $sql .= " FROM pedido p INNER JOIN cliente c ON p.cliente_cli_id = c.cli_id INNER JOIN endereco e ";
        $sql .= " ON p.cod_entrega = e.end_cod INNER JOIN status_pedido s ON s.status_id = p.status ";
        $sql .= " where p.ped_data between '{$data1}' and '{$data2}' ";
    }

    $result = mysqli_query($conn, $sql);
?>

    <br />


    <div class="col-12 m-auto" style="display: <?= $display ?>;">
        <h3>Busca Histórico de Pedidos</h3>
        <hr>
        <br>
        <div class="col-10 m-auto text-center"> <!-- temos que centrarlizar direito -->
            <table class="table table-bordered">
                <thead>
                    <tr></tr>
                    <th scope="col">Número</th>
                    <th scope="col">Data / hora</th>
                    <th scope="col">Cliente</th>
                    <th scope="col" colspan="3">Local de entrega</th>

                    <th scope="col" colspan="2">Status</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    <?php
                    while ($row = mysqli_fetch_array($result)) {


                    ?>
                        <tr>
                            <th scope="row"><?= $row['ped_num'] ?></th>
                            <td><?= date("d/m/Y H:i:s", strtotime($row['ped_data'])) ?></td>
                            <td><?= $row['nome'] ?></td>
                            <td><?= $row['logradouro'] ?></td>
                            <td><?= $row['numero'] ?></td>
                            <td><?= $row['comp'] ?></td>
                            <td>
                                <?= $row['status'] ?>

                            </td>
                            <td>
                                &nbsp;<a href="alterar_pedido.php?final=<?= $row['ped_num'] ?>">Finalizar</a> -
                                <a href="alterar_pedido.php?cancela=<?= $row['ped_num'] ?>">Cancelar</a>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>


<?php } ?>