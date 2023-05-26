<?php
require_once("../utils/connetion.php");

require("./header.inc.php");
if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
    header("Location: login_adm.php");
}

$tpId = "";

$tpNome = "";

$row = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {



    if ($_POST['selPro'] == "") {
        $tpNome = $_POST['tpPro'];

        $sql = "select count(*) as tipos from tipo_produto where tipo_nome = '{$tpNome}';";

        $result = $conn->query($sql);
        $data = mysqli_fetch_array($result);

        if ($data['tipos'] > 0) {
            $msg_err = "Tipo ja cadastrado";
        } else {

            $sql = "insert into tipo_produto(tipo_nome) values('{$tpNome}');";
            $result = $conn->query($sql);

            if (!$result) {

                $cadastro_err = "não foi possivel cadastro";
            }
        }
    } else if ($_POST['selPro'] != "") {
        $tpId = $_POST['selPro'];

        $sql = "select tipo_cod, tipo_nome from tipo_produto where  tipo_cod = {$tpId};";

        $result = $conn->query($sql);

        $row = mysqli_fetch_assoc($result);

        echo $row['tipo_nome'] . "pp";
    }
}

?>
<hr>
<section class="form_tp">
    <?php require_once("../utils/connetion.php") ?>
    <h3>Gerenciamento de tipos</h3>
    <form action="" method="post">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sessão</th>
                    <th scope="col">Nome</th>
                    
                    <th scope="col">Tipos </th>
                    <th scope="col">Ação</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Produto</td>
                    <td>
                        <input class="form-control" required name="tpPro" id="tpPro" type="text" placeholder="">

                    </td>


                    <td>
                        <?php
                        $sql = "select tipo_cod, tipo_nome from tipo_produto";
                        $resp = $conn->query($sql);

                        ?>
                        <select name="selPro" id="tppro" class="form-select form-select-sm" aria-label=".form-select-sm example">

                            <option value="">-----</option>
                            <?php while ($data = mysqli_fetch_array($resp)) {  ?>

                                <option value="<?= $data['tipo_cod'] ?>"><?= $data['tipo_nome'] ?></option>

                            <?php } ?>
                        </select>
                    </td>
                    <td>

                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <input type="submit" name="pro" class="btn btn-success" value="Inserir" />
                            <input type="submit" name="pro" class="btn btn-primary" value="Atualizar" />
                            <button type="button" name="excpro" class="btn btn-danger">Excluir</button>
                        </div>

                    </td>

                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Pagamento</td>
                    <td>

                        <input class="form-control" name="tpPag" type="text" placeholder="">
                    </td>
                    <td>
                        
                        <select name="" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </td>
                    <td>

                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <input type="submit" name="pro" class="btn btn-success" value="Inserir" />
                            <input type="submit" name="pro" class="btn btn-primary" value="Atualizar" />
                            <button type="button" name="excpro" class="btn btn-danger">Excluir</button>
                        </div>

                    </td>
                    
                </tr>

            </tbody>


        </table>
    </form>
</section>




</main>
<?php
mysqli_close($conn);
require_once("../footer.php");
?>
</body>

</html>