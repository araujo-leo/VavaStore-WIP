<?php

require "../inc/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $perfil = $_POST['perfil'];


    $query = "UPDATE usuarios SET nome = '$nome', email = '$email', perfil = '$perfil' WHERE id = $id";

    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: usuarios.php?sucesso-editar-usuario=1" );
        exit;
    } else {
        // Lidar com erros na consulta
        echo "Erro na atualização: " . mysqli_error($conexao);
    }


}