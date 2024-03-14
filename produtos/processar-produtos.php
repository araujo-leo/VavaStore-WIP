<?php

function processar_produtos()
{
    require "../inc/conexao.php";

    $sql = "SELECT * FROM produtos";

    if ($resultado = $conn->query($sql)) {
        return $resultado->fetch_all(MYSQLI_ASSOC);
    } else {
        return -1;
    }

    
}