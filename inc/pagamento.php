<?php

require_once '../inc/conexao.php';


session_start();


if (isset($_POST['token']) && $_POST['token'] === $_SESSION['form_token']) {
    $compradorId = $_SESSION['idUsuario'];
    $nome = $_SESSION['nome'];
    $telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_STRING);
    $endereco = filter_var($_POST['endereco'], FILTER_SANITIZE_STRING);
    $nCasa = filter_var($_POST['numero'], FILTER_SANITIZE_STRING);
    $cidade = filter_var($_POST['cidade'], FILTER_SANITIZE_STRING);
    $estado = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
    $totalCompra = floatval($_POST['preco']);  

    $endereco_completo = $endereco .", ". $nCasa;

    $stmtVenda = $conn->prepare("INSERT INTO vendas (comprador_id, comprador_nome, comprador_telefone, comprador_endereco, total) VALUES (?, ?, ?, ?, ?)");
    $stmtVenda->bind_param("ssssd",$compradorId, $nome, $telefone, $endereco_completo, $totalCompra);
    $stmtVenda->execute();

    $vendaId = $conn->insert_id;

    $conn->begin_transaction();

    try {
        if (isset($_SESSION['carrinho'])) {
            $stmtItemVenda = $conn->prepare("INSERT INTO itens_venda (venda_id, produto_nome, produto_categoria, quantidade, preco_unitario) VALUES (?, ?, ?, ?,?)");

            foreach ($_SESSION['carrinho'] as $produto) {
                $produto_nome = $produto['nome'];
                $quantidade = $produto['quantidade'];
                $preco_unitario = floatval($produto['preco']);  
                $produto_categoria = $produto['categoria'];

                $stmtItemVenda->bind_param("issdd", $vendaId, $produto_nome, $produto_categoria, $quantidade, $preco_unitario);
                $stmtItemVenda->execute();
            }

            $stmtItemVenda->close();
        }

        $conn->commit();

        header('Location: ../views/index.php');
    } catch (Exception $e) {
        $conn->rollback();
        echo "Erro: " . $e->getMessage();
    }


    $_SESSION['carrinho'] = [];
    $_SESSION['Q'] = 0;
    $_SESSION['form_token'] = uniqid();

    $conn->close();
    

} else {
    header('Location: ../views/index.php?token_invalido');
    exit();
}



?>

