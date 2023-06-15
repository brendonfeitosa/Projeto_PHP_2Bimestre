<?php
ob_start();
require_once("header.php");
require_once("utils/connetion.php");

$id = $_SESSION['id'];
$nome = "";
$username = "";
$whats = "";
$sexo = "";
$email = "";
$data = "";
$password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['email'])) || empty(trim($_POST['nickname']))) {
        $email_err = "Por favor, informe os dados necessários";
    } else {
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $username = $_POST['nickname'];
        $whats = $_POST['whatsapp'];
        $sexo = $_POST['genero'];
        $data = $_POST['dt_nasc'];
    }

    if (isset($_POST['senha']) && isset($_POST['confirm_senha'])) {
        if (trim($_POST['senha'] != trim($_POST['confirm_senha']))) {
            $password_err = "As senhas não coincidem";
        } elseif (strlen(trim($_POST['senha'])) < 6) {
            $password_err = "A senha deve ter pelo menos 6 caracteres";
        } else {
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        }
    }

    if (empty($password_err)) {
        $sql = "UPDATE cliente SET ";
        $sql .= "nome = '$nome', sexo = '$sexo', dt_nasc = '$data', nickname = '$username', ";
        $sql .= "senha = '$senha', whatsapp = '$whats', email = '$email' WHERE cli_id = $id";

        $result = $conn->query($sql);

        if (!$result) {
            $register_err = "Não foi possível atualizar os dados";
        } else {
            header("Location: login.php");
            exit();
        }
    }
}

$sql = "SELECT * FROM cliente WHERE cli_id = $id";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

$nome = $row['nome'];
$username = $row['nickname'];
$whats = $row['whatsapp'];
$sexo = $row['sexo'];
$email =  $row['email'];
$data = $row['dt_nasc'];

mysqli_close($conn);
?>

<form method="post" action="">
    <?php if ($password_err != "") { ?>
        <br />
        <span class="alert alert-danger">
            <?= $password_err ?>
        </span>

        <br />
        <br />
    <?php } ?>
    <input type="hidden" name="cliId" value="<?= $id ?>">
    <div class="container-fluid col-11 m-auto">
        <h1>Editar Cadastro</h1>
        <hr>

        <div class="col-4">
            <div class="mb-3">
                <label for="nomecontato" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" value="<?= $nome ?>" id="nomecontato" placeholder="Ex. João de Souza">
            </div>
            <div class="mb-3">
                <label for="nickname" class="form-label">Username:</label>
                <input type="text" name="nickname" class="form-control" value="<?= $username ?>" id="nickname" placeholder="Ex. jsouza">
            </div>
            <div class="mb-3">
                <label for="dt_nasc" class="form-label">Data nasc.:</label>
                <input type="date" name="dt_nasc" class="form-control" value="<?= $data ?>" id="dt_nasc" placeholder="Ex. jsouza">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" value="<?= $email ?>" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Gênero:</label>&nbsp;
                <input type="radio" class="" <?= ($sexo == 'M' ? 'checked' : '') ?> name="genero" id="M" value="M" />
                <label for="email" class="form-label">Masculino</label> &nbsp; &nbsp;&nbsp;
                <input type="radio" <?= ($sexo == 'F' ? 'checked' : '') ?> class="" name="genero" id="F" value="F" />
                <label for="email" class="form-label">Feminino: </label>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">Whatsapp:</label>
                <input type="text" class="form-control" id="whatsapp" value="<?= $whats ?>" name="whatsapp" placeholder="(00) 00000-0000">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Nova senha:</label>
                <input type="password" name="senha" class="form-control" min="6" id="senha" placeholder="Ex. Silva">
            </div>
            <div class="mb-3">
                <label for="confirm_senha" class="form-label">Confirme a senha:</label>
                <input type="password" class="form-control" min="6" name="confirm_senha" id="confirm_senha" placeholder="Ex. Silva">
            </div>
            <button type="submit" class="btn btn-outline-success">Atualizar Cadastro</button>
            
        
                <a href="cadastro.php?id=<?=$id?>">
                <button type="button" class="btn btn-outline-primary" >Voltar</button></a>
    


        </div>
    </div>
</form>

<?php require_once("footer.php") ?>
