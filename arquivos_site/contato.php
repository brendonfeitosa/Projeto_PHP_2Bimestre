<?php require_once("header.php"); 
?>

<form method="post">
    <div class="container-fluid col-11 m-auto">
        <h1>Fale conosco</h1>
        <hr>

        <div class="col-4">
            <div class="mb-3">
                <label for="nomecontato" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nomecontato" placeholder="Ex. João">
            </div>
            <div class="mb-3">
                <label for="sobrenomecontato" class="form-label">Sobrenome:</label>
                <input type="text" class="form-control" id="sobrenomecontato" placeholder="Ex. Silva">
            </div>
            <div class="mb-3">
                <label for="telcontato" class="form-label">Telefone:</label>
                <input type="text" class="form-control" id="telcontato" name="telcontato" placeholder="(00) 00000-0000">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Qual o motivo do seu contato?</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="button" class="btn btn-outline-success">Enviar</button>
            <a href="contato.php"><button type="button" class="btn btn-outline-secondary">Limpar</button></a>
        </div>
    </div>
</form>
<?php require_once("footer.php") ?>