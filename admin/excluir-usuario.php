<?php

require "../inc/conexao.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
    $userToRemove = $_GET['id'];
    $sql = "DELETE FROM usuarios WHERE id = $userToRemove;";
    $resultado = $conn->query($sql);

    if(!empty($resultado)){
        Header('Location: usuarios.php?excluir-user=1');
    }else{
        echo "erro!";
    }
}