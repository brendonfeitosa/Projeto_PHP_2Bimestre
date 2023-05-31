<?php
require_once("header.php");
$display = "";
$aviso="";
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {

  $display = "none";

  
}


?>
<div style="height: 73.5vh;">
    <p>

        Para visualizar os pedidos voce precisa fazer o <a href="login.php">login...</a>
    </p>

</div>
<div class="col-11 m-auto" style="display: <?=$display?>;">
    <h1>Histórico de Pedidos</h1>
    <hr>
    <br>
    <div class="col-8 m-auto text-center"> <!-- temos que centrarlizar direito -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Número do pedido</th>
                    <th scope="col">Data do pedido</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Jacob</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php require_once("footer.php") ?>