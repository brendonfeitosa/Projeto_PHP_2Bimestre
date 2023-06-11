<?php

require("./header.php");
require_once("./utils/connetion.php");
require_once("./utils/buscarCep.php");
$cep = "";
$bairro = "";
$numero = "";
$compl = "";
$cidade = "";
$rua = "";
$id = "";
$msg = "";
$endereco = null;
$msg_err = "";
$endcod = "";
if (isset($_GET['id'])) {

    $id = $_GET['id'];
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $cep = $_POST['cep'];
    $endcod = $_POST['endcod'];
    // print_r($_POST);
    if ($cep != "" && $endcod == "") {
        //  echo "??";
        try {

            if (!validaCep($cep)) {
                $msg_err = "CEP Inválido!";
                $cep = "";
            } else {
                //echo "?? porque?";
                $endereco = get_endereco($cep);
                if (count($endereco) > 2) {
                    $rua = $endereco['logradouro'];
                    $bairro = $endereco['bairro'];
                    $cidade = $endereco['localidade'];
                    $numero = $_POST['numero'];
                } else {
                    $msg_err = "não encontrado";
                }
            }
        } catch (Exception $e) {
            $msg_err = $e->getMessage();
        }


        $numero = $_POST['numero'];

        if ($cep != "" && $numero != "") {
            $id = $_SESSION['id'];
            $compl = $_POST['compl'];
            $rua = $_POST['rua'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];

            $sql = "insert into endereco(cliente_cli_id,cep,logradouro,numero,comp,bairro,cidade) ";
            $sql .= " values($id, '$cep', '$rua', '$numero', '$compl', '$bairro', '$cidade');";
            //  $sql;

            $result = $conn->query($sql);

            if (!$result) {
                $msg_err = "Erro o cadastrar endereço";
            } else {

                $compl = "";
                $cep = "";
                $rua = "";
                $bairro = "";
                $cidade = "";
                $numero = "";
            }
        }
    } else if ($endcod != "") {
        $endcod = $_POST['endcod'];
        $compl = $_POST['compl'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $numero = $_POST['numero'];
        $sql = "update endereco set cep = '$cep' ,logradouro= '$rua' ,numero = '$numero' , comp = '$compl' ,bairro = '$bairro' ,cidade = '$cidade'  ";
        $sql .= " where end_cod = $endcod ;";

        //echo "aqui " . $sql;
        $result  = $conn->query($sql);

        $compl = "";
        $cep = "";
        $rua = "";
        $bairro = "";
        $cidade = "";
        $numero = "";
        if (!$result) {

            $msg_err = "Erro ao inserir o endereço.";
        } else {
            $msg = "Atualização realizado com sucesso";

            header("Location:endereco.php?msg=$msg");
        }
    } else {
        $msg_err = "Informe o seu CEP";
    }
}

if (isset($_GET['ecod'])) {

    $endcod = $_GET['ecod'];
    $sql = "select * from endereco e ";
    $sql .= " where e.end_cod = $endcod ";
    //echo $sql;
    $result = $conn->query($sql);
    $end  = mysqli_fetch_assoc($result);

    $compl = $end['comp'];
    $cep = $end['cep'];
    $rua = $end['logradouro'];
    $bairro = $end['bairro'];
    $cidade = $end['cidade'];
    $numero = $end['numero'];
}
//print_r($_SESSION);

?>

<form method="post">
    <input type="hidden" name="endcod" value="<?= $endcod ?>">
    <h3>Cadastrado de Endereços</h3>
    <hr>

    <section class="forms">
        <h6> <?= ($cep == "") ? 'Informe seu CEP:' : '' ?></h6>
        <?php

        if ($cep != "" && $numero == "") { ?>
            <br />
            <span class="alert alert-warning">Informe o número ou correspondente Ex: km, s/n..</span>
            <br />
            <br />

        <?php }
        if ($msg_err != "") { ?>
            <br />
            <span class="alert alert-danger">
                <?= $cep ?> : <?= $msg_err ?>

            </span>
            <br /><br />
        <?php
            $cep = "";
        } else if ($msg != "") { ?>
            <br />

            <span class="alert alert-success sm-4">
                <?= $msg ?>
            </span>
            <br />
            <br />
        <?php } ?>


        <table class="table">

            <thead>
                <tr>
                    <td scope="col">
                        <div class="input-group input-group-sm-3 mb-3">
                            <label for="Input1" class="form-label"><?= ($cep == "") ? '' : 'Cep' ?>
                                <input type="text" id="Input1" name="cep" value="<?= $cep ?>" class="form-control" maxlength="15">
                            </label>
                        </div>
                    </td>
                    <td scope="col" class="sm-5" style="<?= ($cep == "") ? 'display: none;' : '' ?>">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input2" class="form-label">Bairro
                                <input type="text" id="Input1" name="bairro" value="<?= $bairro ?>" class="form-control" size="10">
                            </label>
                        </div>
                    </td>
                    <td scope="col" style="<?= ($cep == "") ? 'display: none;' : '' ?>">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input3" class="form-label">Rua
                                <input type="text" id="Input1" name="rua" value="<?= $rua ?>" class="form-control" size="10">
                            </label>
                        </div>
                    </td>
                    <td scope="col" style="<?= ($cep == "") ? 'display: none;' : '' ?>">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input4" class="form-label">Número
                                <input type="text" id="Input1" name="numero" value="<?= $numero ?>" class="form-control" size="10">
                            </label>
                        </div>
                    </td>
                    <td scope="col" style="<?= ($cep == "") ? 'display: none;' : '' ?>">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input5" class="form-label">Complemento
                                <input type="text" id="Input1" name="compl" value="<?= $compl ?>" class="form-control" size="10">
                            </label>
                        </div>
                    </td>
                    <td scope="col" style="<?= ($cep == "") ? 'display: none;' : '' ?>">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input6" class="form-label">Cidade
                                <input type="text" id="Input1" name="cidade" value="<?= $cidade ?>" class="form-control" size="10">
                            </label>
                        </div>
                    </td>

                    <?php
                    if ($cep == "" && $endcod == "") {
                        $class = 'class="col-10"';
                        $btn = "Buscar";
                    } else if ($endcod != "") {
                        $btn = "Atualizar";
                    } else {
                        $btn = "Adicionar";
                    }

                    ?>

                    <td scope="col" <?= ($cep == "") ? 'class="col-10"' : '' ?>>
                        <div class="input-group input-group mb-2">
                            <button type="submit" class="btn btn-primary mb-3">
                                <?= $btn ?></button>
                        </div>
                    </td>


                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>


    </section>

    
    <a href="cadastro.php?id=<?= $id ?>"  style="margin-left: 15px; text-decoration: none;" class="">
        <i class="bi bi-arrow-left-square"></i>
       voltar
    </a>

    <hr>
    <section id="container">


        <table class="table">

            <thead>
                <tr>

                    <th scope="col">Cep</th>
                    <th scope="col">Rua</th>
                    <th scope="col">Número</th>
                    <th scope="col">Compl.</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col" class="text-start">Editar/Excluir</th>
                </tr>
            </thead>

            <tbody class="scroll_pro">
                <?php
                $sql = "select * from endereco e, cliente c where ";
                $sql .= "e.cliente_cli_id = c.cli_id and c.cli_id = " . $_SESSION['id'];
                ".";
                $result = $conn->query($sql);
                while ($end  = mysqli_fetch_array($result)) {
                    $endcod = $end['end_cod'];
                ?>
                    <tr class="">

                        <td><?= $end['cep'] ?></td>
                        <td><?= $end['logradouro'] ?></td>
                        <td><?= $end['numero'] ?></td>
                        <td><?= $end['comp'] ?></td>
                        <td><?= $end['bairro'] ?></td>
                        <td><?= $end['cidade'] ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button class="btn btn-primary">
                                    <a style="color:white; text-decoration: none;" href="endereco.php?id=<?= $id ?>&ecod=<?= $endcod ?>">
                                        Editar</a>
                                </button>
                                <button class="btn btn-danger" onclick="conirm('Deseja excluir o registro?')">
                                    <a style="color:white; text-decoration: none;" href="delete_endereco.php?ecod=<?= $endcod ?>">Excluir</a>

                                </button>

                            </div>

                        </td>
                    </tr>

                <?php } ?>


            </tbody>
        </table>

    </section>
</form>


<?php
require("./footer.php")
?>