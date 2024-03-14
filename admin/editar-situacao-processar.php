<?php
if (isset($_POST['select_situacao'])) {
    $situacao = $_POST['select_situacao'];
    $idVenda = $_POST['venda_id'];
    
    require_once "../inc/conexao.php";
    
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }
    
    $sql = "UPDATE vendas SET situacao = '$situacao' WHERE id = $idVenda;";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro ao atualizar o registro: " . $conn->error;
    }

    $conn->close();
} else {
    die('algo deu errado');
}
?>
