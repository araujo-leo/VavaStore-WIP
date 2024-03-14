<?php
require "../inc/conexao.php";
session_start();

include "../inc/navbar.php";

$idProduto = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id=$idProduto;";

if ($resultado = $conn->query($sql)) {
    $produto = $resultado->fetch_assoc();
} else {
    // Trate erros de consulta
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 0;
}

.product-container {
    max-width: 900px;
    margin: 0 auto;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    display: flex;
}

.product-image {
    margin-top: 10%;
    max-width: 50%;
    max-height: 50%;
    padding: 20px;
}

.product-details {
    padding: 20px;
}

.product-title {
    font-size: 28px;
    margin: 10px 0;
    color: #333;
}

.product-description {
    font-size: 18px;
    margin: 10px 0;
    color: #555;
}

.product-category {
    font-size: 20px;
    font-weight: bold;
    margin: 10px 0;
    color: #007bff;
}

.product-availability {
    font-size: 20px;
    font-weight: bold;
    margin: 10px 0;
    color: #28a745;
}

.product-price {
    font-size: 36px;
    font-weight: bold;
    color: #ff5733;
}

.back-link {
    text-decoration: none;
    font-size: 16px;
    color: #007bff;
}

.back-link:hover {
    text-decoration: underline;
}
</style>


<body>
<div class="product-container">
        <img class="product-image" src="../produtos/imagens/skins/<?php echo $produto['categoria'];?>/<?php echo $produto['nome']?>.png" alt="Nome do Produto">
        <div class="product-details">
            <h1 class="product-title"><?php echo $produto['nome']; ?></h1>
            <p class="product-description"><strong>Descrição:</strong> <?php echo $produto['descricao']; ?></p>
            <p class="product-category"><strong>Categoria:</strong> <?php echo $produto['categoria']; ?></p>
            <p class="product-availability"><strong>Disponibilidade:</strong> <?php echo $produto['disponibilidade']; ?></p>
            <p class="product-price"><strong>Preço:</strong> R$99.99</p>
            <a class="back-link" href="../views/index.php">Voltar para a lista de produtos</a>
        </div>
    </div>
</body>


<?php include "../inc/footer.php";?>

</html>