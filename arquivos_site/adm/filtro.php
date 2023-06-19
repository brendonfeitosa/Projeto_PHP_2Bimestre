<section class="cl_filtro">
    <form class="justify-content-center justify-content-md-start" method="GET" action="">
        <!--faz alinhamento  -->

        <div class="input-group input-group-sm"><!-- BUSCA  -->
            <input type="text" class="form-control" placeholder="Digite aqui o que procura" name="pesquisa">
            <button class="btn btn-danger" name="buscar">
                Buscar
            </button>
            <a class="btn btn-secondary" href="cliente.php">Limpar</a>
        </div>
    </form>
</section>
<?php
// Verificar se o botão de busca foi clicado
function buscaLike($nome)
{

    $sql = "SELECT count(p.ped_num) pedidos,c.nome,c.cpf,dt_nasc,nickname,c.email,c.whatsapp,c.cli_id ";
    $sql .= "FROM pedido p inner join cliente c on c.cli_id = p.cliente_cli_id  where p.status <> 3 ";
    $sql .= " and c.email LIKE '%$nome%' ";
    $sql .= "group by c.nome,c.cpf,dt_nasc,c.nickname, c.email,c.whatsapp,c.sexo ,c.cli_id ";
    return $sql;
}

if (isset($_GET['buscar'])) {

    if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
        $nome = $_GET['pesquisa'];

        buscaLike($nome);
    }
}
?>

