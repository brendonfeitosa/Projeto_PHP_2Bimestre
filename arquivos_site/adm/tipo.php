<?php
require_once("../utils/connetion.php");

require("./header.inc.php");
if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
    header("Location: login_adm.php");
}
$tpId = "";
$tpNome = "";
$row = "";
$stp = "";
$snm = "";
$stp2 = "";
$snm2 = "";
$cadastro_err = null;
$disabled = 'disabled';
$disabled2 = 'disabled';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $id = $_POST['selTpPro'];
 // ---------------------- Cadastro de tipos de produtos -----------------------// 
    if ($_POST['selTpPro'] == "") {
        $tpNome = $_POST['tpPro'];
        if (trim($tpNome) != '') {

            // verifica se existe o nome ja cadastrado //

            $sql = "select count(*) as tipos from tipo_produto where tipo_nome = lower('{$tpNome}');";

            $result = $conn->query($sql);
            $data = mysqli_fetch_array($result);
            
            if ($data['tipos'] > 0) {
                $msg_err = "Tipo ja cadastrado";
            } else {

                $sql = "insert into tipo_produto(tipo_nome) values('{$tpNome}');";
                $result = $conn->query($sql);
                if (!$result) {
                    $cadastro_err = "<span class='alert alert-warning'> não foi possivel cadastro</span>";
                }
            }
        } else {
            
            $cadastro_err = "<span class='alert alert-warning'> não foi possivel cadastrar $tpNome</span>";
        
        }
        // ------------------------ update de tipos de pagamentos -------------------------//
    } else if ($_POST['selTpPro'] != "") {
        $disabled = '';
        $tpId = $_POST['selTpPro'];
        $tpNome = $_POST['tpPro'];

        if (trim($tpNome) != "") {

            $sql = "update tipo_produto set tipo_nome = '{$tpNome}' where tipo_cod = {$tpId};";

            $result = $conn->query($sql);
            $disabled ="disabled";
            if (!$result) {

                $cadastro_err = "<span class='alert alert-warning'> não foi possivel alterar o registro</span>";
            }
        } else {
            $cadastro_err = "";
            $sql = "select tipo_cod, tipo_nome from tipo_produto where  tipo_cod = {$tpId};";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            $stp = $row['tipo_cod'];
            $snm = $row['tipo_nome'];
        }
        ////------------------ fim tipo produto ----------------///
    }
    
    $cadastro_err = "";
    // --------------------------- cadastro de tipo de pagamento ------------------------//
    if ($_POST['selTpPgt'] == "" && $_POST['selTpPro'] == "" && $_POST['tpPro'] == "") {
      
        $tpNome = $_POST['tpPag'];
        if (trim($tpNome) != '') {
            // verifica se ja esta cadastrado tipo //
            $sql = "select count(*) as tipos from tipo_pagamento where nome = lower('{$tpNome}');";

            $result = $conn->query($sql);
            $data = mysqli_fetch_array($result);
            
            if ($data['tipos'] > 0) {
                $msg_err = "Tipo ja cadastrado";
            } else {
                
                $sql = "insert into tipo_pagamento(nome) values('{$tpNome}');";
                $result = $conn->query($sql);
                if (!$result) {
                    $cadastro_err = "<span class='alert alert-warning'> não foi possivel cadastro</span>";
                }
            }
        } else {
            $cadastro_err = "<span class='alert alert-warning'> não foi possivel cadastrar.</span>";
        }
    }else if($_POST['selTpPgt'] != ""){

        $disabled2 = '';
        $tpId = $_POST['selTpPgt'];
        $tpNome = $_POST['tpPag'];
        
        if (trim($tpNome) != "") {
        
    // ------------------------ update de tipo de pagamento ----------------------- //        
            $sql = "update tipo_pagamento set nome = '{$tpNome}' where cod = {$tpId};";
            
            $result = $conn->query($sql);
            $disabled2 ="disabled";
            if (!$result) {
                
                $cadastro_err = "<span class='alert alert-warning'> não foi possivel alterar o registro</span>";
            }
        } else {
            $cadastro_err = "";
            $sql = "select cod, nome from tipo_pagamento where  cod = {$tpId};";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            $stp2 = $row['cod'];
            $snm2 = $row['nome'];
           
        }
       
    }
  }

?>

<hr>
<section class="form_tp">
    <h3>Gerenciamento de tipos</h3>

    <?php require_once("../utils/connetion.php") ?>
    <form action="" method="post">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sessão</th>
                    <th scope="col">Nome</th>

                    <th scope="col">Tipos </th>
                    <th scope="col" class="text-center">Ação</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Produto</td>
                    <td>
                        <input class="form-control" name="tpPro" id="tpPro" value="<?= $snm ?>" type="text" placeholder="" />

                    </td>


                    <td>
                        <?php
                        $sql = "select tipo_cod, tipo_nome from tipo_produto";
                        $resp = $conn->query($sql);

                        ?>
                        <select name="selTpPro" class="form-select form-select-sm" aria-label=".form-select-sm example">

                            <option value="">-----</option>
                            <?php while ($data = mysqli_fetch_array($resp)) {  ?>

                                <option value="<?= $data['tipo_cod'] ?>" <?= ($stp == $data['tipo_cod'] ? 'selected' : '') ?>>
                                    <?= $data['tipo_nome'] ?>


                                </option>

                            <?php } ?>
                        </select>
                         
                    </td>
                    <td class="text-center">

                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <input type="submit" name="btn_act" class="btn btn-success" value="Inserir/Editar" />
                            <!-- <input type="submit" name="btn_act" class="btn btn-primary" value="Editar" /> -->
                            <button class="btn btn-danger" <?=$disabled?>>
                             <a style="color:white; text-decoration: none;" 
                                href="delete.php?id=<?=$stp?>&tb=tipo_produto&field=0">Excluir
                            </a>

                           </button>
                           <!--  <input type="submit" name="btn_del" <$disabled ?> class="btn btn-danger" value="Excluir" /> -->
                        </div>

                    </td>

                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Pagamento</td>
                    <td>

                        <input class="form-control" name="tpPag" value="<?=$snm2?>" type="text" placeholder="">
                    </td>
                    <td>
                        <?php 
                              $sql = "select cod, nome from tipo_pagamento";
                              $resp = $conn->query($sql);
                        ?>
                                
                        <select name="selTpPgt" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="">--------</option>
                            <?php while ($data = mysqli_fetch_array($resp)) {  ?>

                                <option value="<?= $data['cod'] ?>"
                                <?= ($stp2 == $data['cod'] ? 'selected' : '') ?>
                                >
                                    <?= $data['nome'] ?>


                                </option>

                            <?php } ?>
                        </select>
                        <input type="hidden" name="del2" value="<?= $stp2 ?>">
                    </td>
                    <td class="text-center">

                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <input type="submit" name="pro" class="btn btn-success" value="Inserir/Editar" />
                            <!--    <input type="submit" name="pro" class="btn btn-primary" value="Editar" /> -->
                           
                           <button class="btn btn-danger" <?=$disabled2?>>
                             <a style="color:white; text-decoration: none;"
                              href="delete.php?id=<?=$stp2?>&tb=tipo_pagamento&field=1">Excluir</a>

                           </button>
                           <!--  <input type="submit" id="dl" name="btn_del" <$disabled2 ?> class="btn btn-danger" value="Excluir" /> -->
                        </div>

                    </td>

                </tr>

            </tbody>


        </table>
        <br />

        <?= $cadastro_err ?>
    </form>
</section>




</main>
<?php
mysqli_close($conn);
require_once("../footer.php");
?>
</body>

</html>