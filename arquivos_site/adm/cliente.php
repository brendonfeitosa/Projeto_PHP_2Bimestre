<?php
require_once("header.inc.php");
$display = "";
$aviso = "";
if (!isset($_SESSION['login_adm']) || $_SESSION['login_adm'] != true) {

    header("Location: login_adm.php");
}





$sql = "SELECT count(p.ped_num) pedidos,c.nome,c.cpf,dt_nasc,nickname,c.email,c.whatsapp,c.cli_id ";
$sql .= "FROM pedido p inner join cliente c on c.cli_id = p.cliente_cli_id  where p.status <> 3 ";
$sql .= "group by c.nome,c.cpf,dt_nasc,c.nickname, c.email,c.whatsapp,c.sexo ,c.cli_id ";

?>


<br />
<section class="container-filtro">

    <?php
    require("./filtro.php");
    if (isset($_GET['pesquisa'])) {
        $sql =  buscaLike($_GET['pesquisa']);
    }

    $result = $conn->query($sql);


    ?>
</section>
<section class="container_rel">

    <div class="col-11 m-auto">
        <h3>Clientes<?= $aviso ?></h3>
        <hr>
        <br>


        <div class="col-12 m-auto text-center"> <!-- temos que centrarlizar direito -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Pedidos</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data Nasc.</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">WhatsApp</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">


                    <?php

                    while ($data = mysqli_fetch_array($result)) {
                        $id = $data['cli_id'];
                    ?>
                        <tr>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#modal<?= $data['cli_id'] ?>">
                                    <?= $data['pedidos'] ?>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal<?= $data['cli_id'] ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                    Pedidos por Cliente: </h1> &nbsp;<h5 class="modal-title text-primary"> <?= $data['nome'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">

                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Número</th>
                                                            <th scope="col">Data / hora</th>
                                                            <th scope="col" colspan="3">Local de entrega</th>

                                                            <th scope="col" colspan="2">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-group-divider">
                                                        <?php

                                                        $my_query = "SELECT p.ped_num, c.nome,e.logradouro, ped_data,e.numero,e.comp,s.status FROM ";
                                                        $my_query .= " pedido p inner join cliente c on p.cliente_cli_id = c.cli_id ";
                                                        $my_query .= " inner join endereco e on c.cli_id = e.cliente_cli_id ";
                                                        $my_query .= " inner join status_pedido s on s.status_id  = p.status ";
                                                        $my_query .= " where p.cod_entrega = e.end_cod and c.cli_id = {$id} order by p.ped_num desc";

                                                        $result1 = $conn->query($my_query);
                                                        while ($row = mysqli_fetch_array($result1)) { ?>
                                                            <tr>
                                                                <th scope="row"><?= $row['ped_num'] ?></th>
                                                                <td><?= date("d/m/Y H:i:s", strtotime($row['ped_data'])) ?></td>
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
                                                            <!-- div class="modal-footer">
                                                    <button type="button" class="btn btn-link-dark" data-bs-dismiss="modal">Fechar</button>
                                                  
                                                </div> -->

                                                        <?php
                                                        } ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


                            </td>




                            <td><?= $data['cpf'] ?></td>
                            <td><?= $data['nome'] ?></td>
                            <td><?= date("d/m/Y", strtotime($data['dt_nasc'])) ?></td>
                            <td><?= $data['nickname'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['whatsapp'] ?></td>

                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>



</section>
<script src="../bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js"></script>


<?php require_once("../footer.php");
mysqli_close($conn);
?>