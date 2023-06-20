<?php
require("header.inc.php");
require_once("../utils/connection.php");
if (!isset($_SESSION['login_adm']) || $_SESSION['login_adm'] != true){
    header("Location: login_adm.php");
}

$email = "";
$nome = "";
$senha = "";
$confirm_senha = "";
$login_err ="?";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['email']))) {
        $username_err = "Por favor, digite o Email";
   // } elseif (trim($_POST['email'])) {
       
       $username_err = "erro";
    } else {
        
        $sql = "select count(*) as num_users from user where email = '{$email}'";
        
        $result = $conn->query($sql);
        $data = mysqli_fetch_array($result);
        
        if ($data['num_users'] > 0) {
            $username_err = "usuário ja cadastrado";
        } else {
            //print_r($_POST);
            $email = $_POST['email'];
            $nome= $_POST['nome'];
            $tipo = "adm";
            $senha = $_POST['senha'];
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

        $sql = "insert into user(nome,email,senha,user_tipo) values ('{$nome}','{$email}', '{$senha}','{$tipo}');";
        //echo $sql;
        $result = $conn->query($sql);

        if (!$result) {

            $register_err = "não foi possivel registrar";
        }
    }
}
mysqli_close($conn);
?>

<div class="container-sm">
    <h2>Registro de Usuário Administrador</h2>
    <p>Por favor, preencha os campos do formulário para criar a sua conta.</p>
    <hr>
    <div class="wrapper">
        <?php
        if (!empty($username_err) || !empty($senha_err) || !empty($register_err)) {
            echo '<div class="alert alert-danger">'.$login_err.'</div>';
        }
        ?>
        <section class="col-8">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Usuário:</label>
                    <input type="text" name="nome" class="form-control " placeholder="Ex.: João da Silva" value="<?=$nome?>">
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="email" class="form-control " placeholder="Ex.: joao.silva@teste.com" value="<?=$email?>">
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" placeholder="****" value="">
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group">
                    <label>Confirmação da senha</label>
                    <input type="password" name="confirm_senha" placeholder="****" class="form-control " value="">
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group">
                    <br />
                    <input type="submit" class="btn btn-primary" value="Enviar">
                    <input type="reset" class="btn btn-secondary ml-2" value="Limpar">
                </div>
            </form>
        </section>
    </div>
</div>

<?php require("../footer.php"); ?>