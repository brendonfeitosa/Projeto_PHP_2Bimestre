<?php require_once("header.php");?>
<?php 
$nome = "";
$sobrenome = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nomecontato'];
    $sobrenome = $_POST['sobrenomecontato'];
    $tel = $_POST['telcontato'];
    $email = $_POST['emailcontato'];
    $comentario = $_POST['comentario'];

    require_once("./utils/connetion.php");

    $sql = "INSERT INTO contato (nome, sobrenome, telefone, email, motivo_contato) 
                VALUES ('$nome', '$sobrenome', '$tel', '$email', '$comentario');";

    $result = $conn->query($sql);
}
mysqli_close($conn);
?>

<form method="post" action="contato.php">
    <div class="container-fluid col-11 m-auto">
        <h1>Fale conosco</h1>
        <hr>
        <div class="col-4">
            <div class="mb-3">
                <label for="nomecontato" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nomecontato"  name="nomecontato" placeholder="Ex. João">
            </div>
            <div class="mb-3">
                <label for="sobrenomecontato" class="form-label">Sobrenome:</label>
                <input type="text" class="form-control" id="sobrenomecontato" name="sobrenomecontato" placeholder="Ex. Silva">
            </div>
            <div class="mb-3">
                <label for="telcontato" class="form-label">Telefone:</label>
                <input type="text" class="form-control" id="telcontato" name="telcontato" placeholder="(00) 00000-0000">
            </div>
            <div class="mb-3">
                <label for="emailcontato" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="emailcontato" name="emailcontato" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="comentario" class="form-label">Qual o motivo do seu contato?</label>
                <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
            </div>
            <input type="submit" class="btn btn-outline-success" value="Enviar">
            <a href="contato.php"><button type="button" class="btn btn-outline-secondary">Limpar</button></a>
        </div>
    </div>
</form>
<?php require_once("footer.php") ?>