<?php require_once("header.php"); ?>
<div class="col-11 m-auto">
    <h1>Validar Pedido</h1>
    <hr>
    <br>
    <div class="col-2 m-auto text-center"> <!-- temos que centrarlizar direito -->
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
        </form>
    </div>
</div>


<?php require_once("footer.php") ?>