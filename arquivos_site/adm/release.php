<?php
$fundacao = "";
$deonde = "";
$cidade = "";
$data = null;
require_once("./header.inc.php");
if (!isset($_SESSION['login_adm']) || $_SESSION['login_adm'] != true) {
    header("Location: login_adm.php");
}

if (isset($_POST['gravar'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql3 = "SELECT * FROM historia;";
        $result3 = $conn->query($sql3);
        $data3 = mysqli_fetch_array($result3);
        
        $fundacao = $_POST['fundacao'];
        $deonde = $_POST['deonde'];
        $cidade = $_POST['cidade'];
        $curiosidades = $_POST['curiosidades'];
        //print_r($_POST);
        if ($data3 == null) {
            $sql = "INSERT INTO historia (fundacao, de_onde_viemos, porque_cidade, curiosidades) VALUES ('{$fundacao}', '{$deonde}', '{$cidade}', '{$curiosidades}');";
            $result = $conn->query($sql);
        } else {
            $sql2 = "UPDATE historia SET fundacao = '{$fundacao}', de_onde_viemos = '{$deonde}', porque_cidade = '{$cidade}', curiosidades = '{$curiosidades}';";
            $result2 = $conn->query($sql2);
        }
    }
}
$sql1 = "SELECT * FROM historia;";

$result1 = $conn->query($sql1);

$data = mysqli_fetch_array($result1);

mysqli_close($conn);

?>
<div class="col-11 m-auto">
    <h1>Cadastre sua história</h1>
    <hr>

    <form action="" method="post">
        <div class="mb-3">
            <h2><label for="fundacao" class="form-label"><strong>Fundação?</strong></label></h2>
            <textarea class="form-control" id="fundacao" name="fundacao" rows="3"><?= $data['fundacao'] ?></textarea>
            <br>
            <h2><label for="deonde" class="form-label"><strong>De onde vieram?</strong></label></h2>
            <textarea class="form-control" id="deonde" name="deonde" rows="3"><?= $data['de_onde_viemos'] ?></textarea>
            <br>
            <h2><label for="cidade" class="form-label"><strong>Porque escolheram esta cidade?</strong></label></h2>
            <textarea class="form-control" id="cidade" name="cidade" rows="3"><?= $data['porque_cidade'] ?></textarea>
            <br>
            <h2><label for="curiosidades" class="form-label"><strong>Curiosidades?</strong></label></h2>
            <textarea class="form-control" id="curiosidades" name="curiosidades" rows="3"><?= $data['curiosidades'] ?></textarea>
        </div>
        <input type="submit" class="btn btn-outline-success" name="gravar" id="gravar" value="Gravar">
    </form>
</div>