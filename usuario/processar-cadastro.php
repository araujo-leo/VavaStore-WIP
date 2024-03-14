<?php

session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


var_dump($_POST);


require '../inc/conexao.php';

// Obter os dados do formulário
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$nome = ucwords($nome);

// Inserir os dados na tabela 'usuarios'
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

var_dump($_POST);
if ($conn->query($sql) === TRUE) {
    header("Location: ../views/cadastrar.php?cadastro-sucesso=1");
    exit();
} else {
    echo "Erro ao cadastrar o usuário: " . $conn->error;
}

$conn->close();
?>
