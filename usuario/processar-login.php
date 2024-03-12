<?php
session_start();


require '../inc/conexao.php';

// Obter os dados do formulário
$email = $_POST["email"];
$senha = $_POST["senha"];



// Comparar dados da tabela usuário
$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha';";

if ($results = $conn->query($sql)) {
    if ($results->num_rows > 0) {
        foreach ($results as $result) {
            $_SESSION['idUsuario'] = $result['id'];
            $_SESSION['nome'] = $result['nome'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['perfil'] = $result['perfil'];
        }
        header("Location: ../views/login.php?login-sucesso=1");
        exit();
    } else {
        // Se não houver resultados, exiba uma mensagem de erro
        header("Location: ../views/login.php?login-sucesso=0");
        exit();
    }
} else {
    echo "Erro na consulta: " . $conn->error;
}

$conn->close();
?>
