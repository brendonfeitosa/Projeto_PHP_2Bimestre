<?php require_once("header.inc.php") ;
if (!isset($_SESSION['login_adm']) || $_SESSION['login_adm'] != true) {
    header("Location: login_adm.php");
   
}


$sql = "SELECT * FROM contato";
$result = $conn->query($sql);
//$dia_hora = date("d/m/Y H:i", strtotime($data['data_hora_contato']));

?>

<div class="col-11 m-auto">
    <h1>Contatos</h1>
    <hr>
    <br>
    <div class="col-10 m-auto text-center"> <!-- temos que centrarlizar direito -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Data do comentario</th>
                    <th scope="col">Nome do cliente</th>
                    <th scope="col">Sobrenome do cliente</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Comentário</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php while ($comentario = mysqli_fetch_array($result)) {
                    $dia_hora = date("d/m/Y H:i", strtotime($comentario['data_hora_contato']));
                ?>

                    <tr>
                        <td scope="row"><?= $dia_hora ?></td>
                        <td><?= $comentario['nome'] ?></td>
                        <td><?= $comentario['sobrenome'] ?></td>
                        <td><?= $comentario['telefone'] ?></td>
                        <td><?= $comentario['email'] ?></td>
                        <td><?= $comentario['motivo_contato'] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>






<?php require_once("../footer.php") ?>