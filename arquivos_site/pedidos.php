<?php
require_once("header.php");
$display = "";
$aviso="";
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {

  header("Location: login.php");
}

$sql ="SELECT p.ped_num, c.nome,e.logradouro, ped_data,e.numero,e.comp,s.status FROM ";
$sql .= " pedido p inner join cliente c on p.cliente_cli_id = c.cli_id ";
$sql .= " inner join endereco e on c.cli_id = e.cliente_cli_id ";
$sql .= " inner join status_pedido s on s.status_id  = p.status ";
$sql .= " where p.cod_entrega = e.end_cod and c.cli_id = {$_SESSION['id']};";

$result = $conn->query($sql);


mysqli_close($conn);
?>
<section class="container_card">


<div class="col-11 m-auto" style="display: <?=$display?>;">
    <h1>Histórico de Pedidos</h1>
    <hr>
    <br>
    <div class="col-8 m-auto text-center"> <!-- temos que centrarlizar direito -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Data / hora</th>
                    <th scope="col" colspan="3">Local de entrega</th>
                    
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

            <?php 
               while($data = mysqli_fetch_array($result)) {
                    
            ?>
                <tr>
                    <th scope="row"><?=$data['ped_num']?></th>
                    <td><?=date("d/m/Y H:i:s",strtotime($data['ped_data']))?></td>
                    <td><?=$data['logradouro']?></td>
                    <td><?=$data['numero']?></td>
                    <td><?=$data['comp']?></td>
                    <td><?=$data['status']?></td>
                    
                </tr>

                <?php }?>
               
            </tbody>
        </table>
    </div>
</div>
</section>

<?php require_once("footer.php") ?>