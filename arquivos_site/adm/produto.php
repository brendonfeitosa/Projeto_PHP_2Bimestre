<?php
require_once("../utils/connetion.php");
require("./header.inc.php");
if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
    header("Location: login_adm.php");
    echo "logado";
}

$msg_err = "";
$sql = "";
$result = "";
$data = "";
$nome = "";
$cod = 0;
$nome = "";
$promo = 0;
$tp = "";
$desc = "";
$preco = "";
$img = "";
$peso = "";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // print_r($_POST);
    $cod = $_POST['cod'];
    $nome = $_POST['pnome'];
    $promo = 0;
    $tp = $_POST['ptipo'];
    $desc = $_POST['pdesc'];
    $preco = $_POST['preco'];
    $img = $_POST['iurl'];
    $peso = $_POST['peso'];
    if (isset($_POST['promo'])) {
        $promo = $_POST['promo'];
    }
    if ($cod === 0) {
        echo $cod." entro";
        //$sql = "insert into produto(tipo_cod,nome,descricao,preco,promo,image_url,peso) values($tp,'$nome','$desc',$preco,$promo,'$img',$peso);"; 
        $sql = "select count(*) as produtos from produto where nome = lower('{$nome}');";

        $result = $conn->query($sql);
        $data = mysqli_fetch_array($result);

        if ($data['produtos'] > 0) {
            $msg_err = "Produto ja cadastrado";
        } else {

            $sql = "insert into produto(tipo_cod,nome,descricao,preco,promo,image_url,peso) values($tp,'$nome','$desc',$preco,$promo,'$img',$peso);";
             echo $sql;
            $result = $conn->query($sql);
            if (!$result) {
                $msg_err = "<span class='alert alert-warning'> não foi possivel cadastro</span>";
                echo "erro";
            }
            header("Location: produto.php?msg=$msg_err");
        }

    }else if($cod > 1){
        
        

        $sql = "update produto set tipo_cod =$tp ,nome ='$nome' ,descricao = '$desc' ,preco = $preco ,promo = $promo,image_url = '$img', peso = $peso ";
        $sql .=" where tipo_cod = {$tp};";
         //echo $sql;   
            $result = $conn->query($sql);
          
            if (!$result) {
                
                $msg_err = "<span class='alert alert-warning'> não foi possivel alterar o registro</span>";
            }

            header("Location: produto.php?msg=$msg_err");

    }
}
if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    $sql = "select * from produto p, tipo_produto tp where tp.tipo_cod = p.tipo_cod and p.codigo = {$cod};";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $nome = $row['nome'];
    $promo = $row['promo'];
    $tp = $row['tipo_cod'];
    $desc = $row['descricao'];
    $preco = $row['preco'];
    $img = $row['image_url'];
    $peso = $row['peso'];
}

?>

<h3>Gerenciamento de Produtos</h3>
<form action="" method="post">

    <section class="reset_width">
        <h5>Informe os dados</h5>
        <table class="table">

            <thead>
                <tr>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input1" class="form-label">Nome
                                <input type="text" id="Input1" name="pnome" value="<?=$nome?>" class="form-control" size="10">
                                <input type="hidden" name="cod" value="<?=$cod?>">
                            </label>
                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input2" class="form-label">Tipo
                                <select class="form-select" name="ptipo" aria-label="Default select example">
                                    <option value=""> - - - </option>
                                    <?php

                                    $sql = "select tipo_cod,tipo_nome from tipo_produto;";

                                    $result = $conn->query($sql);


                                    while ($data  = mysqli_fetch_array($result)) { ?>

                                        <option value="<?= $data['tipo_cod'] ?>"
                                            <?=($data['tipo_cod'] == $tp? 'selected':'')?>
                                        >

                                            <?= $data['tipo_nome'] ?>
                                        </option>

                                    <?php } ?>
                                </select>
                            </label>
                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Inpunt3" class="form-label">Descrição
                                <input type="text" name="pdesc" id="Inpunt3" value="<?=$desc?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </label>
                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input4" class="form-label">Url Image
                                <input type="text" name="iurl" id="Input4" value="<?=$img?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </label>
                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input6" class="form-label">Peso
                                <input type="text" name="peso" value="<?=$peso?>" id="Input6" class="form-control" size="5">
                            </label>
                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input7" class="form-label">Preço
                                <input type="text" name="preco" id="Input7" value="<?=$preco?>" class="form-control" size="5">
                            </label>
                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input5" class="form-label">
                                <input class="form-check-input" type="checkbox"
                                     name="promo" value="1" <?=($promo == 1) ?'checked':''?>>
                                <label class="form-check-label" for="Input5">
                                    Promo
                                </label>


                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group mb-3">
                            <button type="submit" class="btn btn-primary mb-3">Gravar</button>


                        </div>
                    </td>


                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>


    </section>

<hr>
    <section id="container">


        <table class="table">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Promo</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Preço</th>
                    <th scope="col" class="text-center">Editar/Excluir</th>
                </tr>
            </thead>

            <tbody class="scroll_pro">
                <?php
                $sql = "select * from produto p, tipo_produto tp where tp.tipo_cod = p.tipo_cod;";

                $result = $conn->query($sql);


                while ($prod  = mysqli_fetch_array($result)) {

                    $pcod = $prod['codigo'];

                ?>

                    <tr class="">
                        <th scope="row"><?= $prod['codigo'] ?></th>
                        <td class=""><?= $prod['promo'] == 1 ? 'Sim' : 'Não' ?></td>
                        <td><?= $prod['nome'] ?></td>
                        <td><?= $prod['tipo_nome'] ?></td>
                        <td><?= $prod['descricao'] ?></td>
                        <td><img src="<?= $prod['image_url'] ?>" width="80px" height="60px" alt=""></td>
                        <td>R$ <?= number_format($prod['preco'], 2, ',', '.') ?></td>
                        <td><?= number_format($prod['peso'], 3, ',', '.'); ?>Kg</td>
                        <td >
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">


                                <button class="btn btn-primary">
                                    <a style="color:white; text-decoration: none;" href="produto.php?cod=<?= $pcod ?>">Editar</a>

                                </button>
                                <button class="btn btn-danger" onclick="confirm('Deseja excluir o registro?')">
                                    <a style="color:white; text-decoration: none;" href="delete.php?id=<?= $pcod ?>&tb=2">Excluir</a>

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
mysqli_close($conn);
require_once("../footer.php")
?>