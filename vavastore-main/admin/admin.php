<?php
session_start();
include "../inc/adminIncs.php";
require "../produtos/processar-produtos.php";

$infoProdutos = processar_produtos();
if (isset($_SESSION['nome'])){
?>

<!DOCTYPE html>
<html lang="pt-br">
<style>
.botao {
    width: 40px;
    height: 40px;
}
</style>
<?php
if (isset($_GET['sucesso-editar']) && $_GET['sucesso-editar'] == 1) {
?>
<script>
Swal.fire({
    title: 'Sucesso',
    text: 'Produto editado com sucesso',
    icon: 'info',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'OK'
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = 'admin.php';
    }
});
</script>
<?php }
?>



<body style="background-color: rgb(238, 238, 238);">
    <?php
    if (!empty($infoProdutos)) {
    ?>
    <div class="container text-center mt-lg-5">
        <table class="table table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Nome do Produto</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($infoProdutos as $produto) {
                        $nomeProduto = $produto['nome'];
                        $categoriaProduto = $produto['categoria'];
                        $precoProduto = $produto['preco'];
                        $descricaoProduto = $produto['descricao'];
                    ?>
                <tr>
                    <td><?= $nomeProduto ?></td>
                    <td><?= $categoriaProduto ?></td>
                    <td>R$ <?= $precoProduto ?></td>
                    <td><?= $descricaoProduto ?></td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <form action="../produtos/editar-produto.php" method="GET" class="form-inline">
                                <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                                <button type="submit" class="btn btn-primary btn-action btn-block botao">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
    <?php
    } else {
        echo 'Não há produtos disponíveis.';
    }
    ?>
</body>

</html>
<?php } else{ echo'
    <script>
     window.location.href = "../index.php?AcessoNegado";
    </script>';
    

    } 


?>