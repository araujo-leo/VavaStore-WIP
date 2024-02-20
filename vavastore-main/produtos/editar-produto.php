<?php
session_start();
require "../inc/conexao.php";
require "../inc/navbar.php";

if (isset($_GET["id"])) {
    $produtoToEdit = $_GET["id"];
} else {
}

// Recupere as informações do produto a ser editado com base no ID
if (isset($produtoToEdit)) {
    $query = "SELECT * FROM produtos WHERE id = $produtoToEdit";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        $produto = mysqli_fetch_assoc($resultado);
    } else {
        // Lidar com erros na consulta
        echo "Erro na consulta: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
<div class="container">
    <form action="editar-produto-processar.php" class="my-4" method="POST">
        <input type="hidden" name="id" value="<?php echo $produtoToEdit; ?>">
        <div class="form-group">
            <label for="name">Nome do Produto</label>
            <input type="text" name="name" class="form-control" value="<?php echo $produto['nome']; ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição do Produto</label>
            <textarea name="descricao" class="form-control" rows="5"><?php echo $produto['descricao']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria do Produto</label>
            <select name="categoria" class="form-control">
                <option value="ghost" <?php echo ($produto['categoria'] === 'ghost') ? 'selected' : ''; ?>>Ghost</option>
                <option value="vandal" <?php echo ($produto['categoria'] === 'vandal') ? 'selected' : ''; ?>>Vandal</option>
                <option value="faca" <?php echo ($produto['categoria'] === 'faca') ? 'selected' : ''; ?>>Faca</option>
                <option value="operator" <?php echo ($produto['categoria'] === 'operator') ? 'selected' : ''; ?>>Operator</option>
                <option value="phantom" <?php echo ($produto['categoria'] === 'phantom') ? 'selected' : ''; ?>>Phantom</option>
                <option value="sheriff" <?php echo ($produto['categoria'] === 'sheriff') ? 'selected' : ''; ?>>Sheriff</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Nome do Produto</label>
            <input type="number" name="preco" class="form-control" value="<?php echo $produto['preco']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
</body>
</html>
