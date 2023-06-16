<?php

require("./header.inc.php");
if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
    header("Location: login_adm.php");

}
?>
<!doctype html>
<html lang="pt-br">





</main>
<?php 
    require_once("../footer.php");
?>
</body>

</html>