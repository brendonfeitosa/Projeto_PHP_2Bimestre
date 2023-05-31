<?php
require_once("header.php");

require_once("utils/connetion.php");

$email = "";
$nome = "";
$sexo = "";
$senha = "";
$username = "";
$whats = "";
$confirm_senha = "";
$login_err = "";
$email_err = "";
$data = "";
//print_r($_POST);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['email'])) || empty(trim($_POST['nickname']))) {
        $email_err = "Por favor, informe os dados necessarios";
    } else {

        $sql = "select count(*) as num_users from cliente ";
        $sql .= "where email = '{$email}' or nickname = '{$username}'";

        $result = $conn->query($sql);
        $data = mysqli_fetch_array($result);

        if ($data['num_users'] > 0) {
            $username_err = "usuário ja cadastrado";
        } else {
           
            $email = $_POST['email'];
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $data = $_POST['dt_nasc'];
            $username = $_POST['nickname'];
            $whats = $_POST['whatsapp'];
            $sexo = $_POST['genero'];
        }
    }

    if (empty($_POST['senha'] || empty($_POST['confirm_senha']))) {
        $password_err = " As senhas não podem ser vazia";
    } elseif (strlen(trim($_POST['senha'])) < 6) {
        $password_err = " A senha tem que conter no minimo 6 caracteres";
    } elseif (trim($_POST['senha'] != trim($_POST['confirm_senha']))) {
        $password_err = " As senhas não pdem ser vazia As senhas não coencidem";
    } else {
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    }
    if (empty($username_err) && empty($password_err)) {

        $sql = "insert into cliente (nome,sexo,dt_nasc, nickname,senha,whatsapp,email) ";
        $sql .= "values ('$nome','$sexo','$data','$username','$senha','$whats','$email');";
        //echo $sql;
        $result = $conn->query($sql);

        if (!$result) {

            $register_err = "não foi possivel registrar";
        }else{
            header("Location :login.php");
        }
    }
}
mysqli_close($conn);

?>

<form method="post">
    <div class="container-fluid col-11 m-auto">
        <h1>Registre-se</h1>
        <hr>

        <div class="col-4">
            <div class="mb-3">
                <label for="nomecontato" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" id="nomecontato" placeholder="Ex. João de Souza">
            </div>
            <div class="mb-3">
                <label for="nickname" class="form-label">Username:</label>
                <input type="text" name="nickname" class="form-control" id="nickname" placeholder="Ex. jsouza">
            </div>
            <div class="mb-3">
                <label for="dt_nasc" class="form-label">dt_nasc:</label>
                <input type="date" name="dt_nasc" class="form-control" id="dt_nasc" placeholder="Ex. jsouza">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Genero:</label>&nbsp;

                <input type="radio" class="" name="genero" id="M" value="M" />
                <label for="email" class="form-label">Masculino</label>&nbsp;&nbsp;&nbsp;

                <input type="radio" class="" name="genero" id="F" value="F" />

                <label for="email" class="form-label">Feminino: </label>

            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">Whatsapp:</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="(00) 00000-0000">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="text" name="senha" class="form-control" id="senha" placeholder="Ex. Silva">
            </div>
            <div class="mb-3">
                <label for="confirm_senha" class="form-label">Confirme a senha:</label>
                <input type="text" class="form-control" name="confirm_senha" id="confirm_senha" placeholder="Ex. Silva">
            </div>

            <button type="submit" class="btn btn-outline-success">Cadastrar</button>

        </div>
    </div>
</form>
<?php require_once("footer.php") ?>