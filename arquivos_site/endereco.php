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
$msg_err = "";
if (isset($_GET['id'])) {

    $id = $_GET['id'];
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $cep = $_POST['cep'];
    // print_r( get_endereco($cep));
    $endereco = get_endereco($cep);
    $rua = $endereco['logradouro'];
    $bairro = $endereco['bairro'];
    $cidade = $endereco['localidade'];

    $numero = $_POST['numero'];

    if ($numero != "") {

        $compl = $_POST['compl'];
    
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];

        $sql = "insert into endereco(cliente_cli_id,cep,logradouro,numero,comp,bairro,cidade) ";
        $sql .= " values($id, '$cep', '$rua', '$numero', '$compl', '$bairro', '$cidade');";
        echo  $sql;
        $result  = $conn->query($sql);
        if (!$result) {

            $msg_err = "Erro ao inserir o endereço.";
        } else {
            $msg = "Cadastro realizado com sucesso";
        }
    }else{
        $numero ='0';
    }
}

?>
<form method="post">

    <h3>Cadastrado de Endereços</h3>
    <hr>


    <section class="reset_width">
        <h5>Informe os dados</h5>
        <table class="table">

            <thead>
                <tr>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input1" class="form-label">Cep
                                <input type="text" id="Input1" name="cep" value="<?= $cep ?>" class="form-control" size="10">
                            </label>
                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input2" class="form-label">Bairro
                                <input type="text" id="Input1" name="bairro" value="<?= $bairro ?>" class="form-control" size="10">
                            </label>
                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input3" class="form-label">Rua
                                <input type="text" id="Input1" name="rua" value="<?= $rua ?>" class="form-control" size="10">
                            </label>
                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input4" class="form-label">Número
                                <input type="text" id="Input1" name="numero" value="<?= $numero ?>" class="form-control" size="10">
                            </label>
                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input5" class="form-label">Complemento
                                <input type="text" id="Input1" name="compl" value="<?= $compl ?>" class="form-control" size="10">
                            </label>
                        </div>
                    </td>
                    <td scope="col">
                        <div class="input-group input-group-sm mb-3">
                            <label for="Input6" class="form-label">Cidade
                                <input type="text" id="Input1" name="cidade" value="<?= $cidade ?>" class="form-control" size="10">
                            </label>
                        </div>
                    </td>

                    <td scope="col">
                        <div class="input-group input-group mb-2">
                            <button type="submit" class="btn btn-primary mb-3">
                                <?=$rua == ""?'Buscar':'Adicionar'?></button>
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
                        <td>
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
require("./footer.php")
?>