<?php
session_start();
require "../inc/conexao.php";
require "../inc/navbar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Certifique-se de obter os dados do formulário
    $id = $_POST["id"];
    $nome = $_POST["name"];
    $descricao = $_POST["descricao"];
    $categoria = $_POST["categoria"];
    $preco = $_POST["preco"];

    // Consulta SQL para atualizar as informações do produto
    $query = "UPDATE produtos SET nome = '$nome', descricao = '$descricao', categoria = '$categoria', preco = '$preco' WHERE id = $id";

    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: ../admin/admin.php?sucesso-editar=1" );
        exit;
    } else {
        // Lidar com erros na consulta
        echo "Erro na atualização: " . mysqli_error($conexao);
    }
}
?>
