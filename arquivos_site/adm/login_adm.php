<?php
require("header.inc.php");


$username = $password = $login_err = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['email']) || empty($_POST['senha'])) {

        $login_err = "Usário ou senha invalidos";
    } else {
        $email = $_POST['email'];
        $password = $_POST['senha'];


        $sql = "select adm_id, nome,senha from user where email = '{$email}'";

        //echo $sql;
        $result = $conn->query($sql);
        $data = mysqli_fetch_array($result);

        if (!$data) {
            $login_err = "ususario não encontrado";
        } else {


            if (password_verify($password, $data['senha'])) {
                session_start();
                $_SESSION['login_adm'] = true;
                $_SESSION['id'] = $data['adm_id'];
                $_SESSION['nome'] = $data['nome'];
                $_SESSION['email'] = $email;
                mysqli_close($conn);

                header("Location: admin.php");
            } else {

                $login_err = "usuário não encontrado";
            }
        }
    }
}
?>

<body>
    <main><br />
        <span><?= $login_err ?></span>
        <h2>Login Administrativo</h2>
        <p>Por favor insira os dados pra realizar o Login</p>
        <hr>
        <section class="form_adm">
            <form ation="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="email" required class="form-control">
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="senha" required class="form-control">
                    <span class="invalid-feedback"></span>
                </div><br />
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
               
            </form>

        </section>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
    </main>

  
    <script src="../bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js"></script>

    <?php require("../footer.php"); ?>
</body>

</html>