<?php
require_once("header.inc.php");
$display = "";
$aviso = "";
if (!isset($_SESSION['login_adm']) || $_SESSION['login_adm'] != true) {

    header("Location: login_adm.php");
}

$sql = "SELECT count(p.ped_num) FROM cliente c INNER JOIN pedido p on cliente_cli_id = cli_id ";
$sql .=" INNER JOIN endereco e on cliente_cli_id = cli_id group by p.ped_num ";

$result = $conn->query($sql);


mysqli_close($conn);
?>
<section class="container_rel">


    <div class="col-11 m-auto" style="display: <?= $display ?>;">
        <h3>Clientes</h3>
        <hr>
        <br>
        <div class="col-12 m-auto text-center bg-danger"> <!-- temos que centrarlizar direito -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data Nasc.</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">WhatsApp</th>
                        <th scope="col">Genero</th>
                        <th scope="col" >Locais</th>
                        <th scope="col">Pedidos</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    <?php
                    while ($data = mysqli_fetch_array($result)) {


                    ?>
                        <tr>
                            <th scope="row"><?= $data['cli_id'] ?></th>
                            <td><?= $data['cpf'] ?></td>
                            <td><?= $data['nome'] ?></td>
                            <td><?= date("d/m/Y", strtotime($data['dt_nasc'])) ?></td>
                            <td><?= $data['nickname'] ?></td>
                            <td ><?= $data['email'] ?></td>
                            <td ><?= $data['whatsapp'] ?></td>
                            <td ><?= $data['sexo'] ?></td>
                            
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once("../footer.php") ?>