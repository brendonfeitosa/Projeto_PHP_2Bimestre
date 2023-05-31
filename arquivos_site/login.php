<?php
require("./header.php");
require_once("utils/connetion.php");


$username = $password = $login_err = $email = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['username']) || empty($_POST['senha'])) {

        $login_err = "Usário ou senha invalidos";
    } else {
        $username = $_POST['username'];
        $password = $_POST['senha'];


        $sql = "select cli_id, nome,nickname,email,senha from cliente ";
        $sql .= " where email = '{$username}';";
        
        $result = $conn->query($sql);
                
        $data = mysqli_fetch_array($result);
        
        if(!$data){
            $sql = "select cli_id, nome,nickname,email,senha from cliente ";
            $sql .= " where nickname = '{$username}' or email = '{$email}';";
           
            $result = $conn->query($sql);
                    
            $data = mysqli_fetch_array($result);

            print_r($data);
        }
        
        if (!$data) {
            $login_err = "ususario não encontrado";
        } else {

           /*  echo $_POST['senha']. " ".print_r($data); */

            if (password_verify($password, $data['senha'])) {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['id'] = $data['ci_id'];
                $_SESSION['nome'] = $data['nome'];
                $_SESSION['email'] = $data['email'];
                mysqli_close($conn);

                header("Location: index.php");
            } else {

                $login_err = "usuário não encontrado";
            } 
        }
    }
}
?>

<body>
    <main class="p-2"><br />
        <span><?= $login_err ?></span>
        <h2>Login</h2>
        <p>Por favor insira os dados pra realizar o Login</p>
        <hr>
        <section class="form_login">
            <form ation="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Email ou Email:</label>
                    <input type="text" name="username" required class="form-control">
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
                <p>Não possui uma conta? <a href="cadastro.php">Registre-se agora</a>.</p>
            </form>

        </section>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
    </main>

      <?php require("footer.php"); ?>
</body>

</html>