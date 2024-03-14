<?php
session_start();
include "../inc/adminIncs.php";
require "../produtos/processar-produtos.php";
require_once "../inc/conexao.php";

$resultado = $conn->query("SELECT * FROM vendas");

$totalCompras = $conn->query("SELECT COUNT(*) AS total FROM vendas;");
$row = $totalCompras->fetch_assoc();
$totalCompras = $row['total'];

$totalVendido = $conn->query("SELECT SUM(total) AS total_vendido FROM vendas;");
$row = $totalVendido->fetch_assoc();
$totalVendido = $row['total_vendido'];

$totalLucro = $totalVendido * (80 / 100);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/style4.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    // Função para exibir ou ocultar o formulário de edição
    function toggleForm(id) {
        $('#form_' + id).toggle();
    }
    </script>
</head>

<body>
    <div class="container">
        <div class="estatisticas">
            <div class="head-estatisticas">
                <h2>Estatisticas</h2>
            </div>
            <div class="body-estatiticas">
                <div class="estatistica total-vendas">
                    <p>Total Vendas</p>
                    <h4><?php echo $totalCompras;
if ($totalCompras == 1) {
    echo " Venda";
} else {
    echo " Vendas";
}
?></h4>
                </div>
                <div class="estatistica total-vendido">
                    <p>Total Vendido</p>
                    <h4>$ <?php echo $totalVendido; ?></h4>
                </div>
                <div class="estatistica total-lucro">
                    <p>Total Lucro</p>
                    <h4>$ <?php echo $totalLucro; ?></h4>
                </div>
            </div>
        </div>
        <div class="vendas">
            <div class="head-vendas">
                <h2>Vendas</h2>
            </div>
            <div class="body-vendas">
                <table class="table table-striped table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome do Comprador</th>
                            <th>Status</th>
                            <th style="font-size:0.8em;">Quantidade <br> de produtos</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr <?php if ($resultado->num_rows > 0) {
                                echo 'class="table-striped"';
                            }
                            ?>>
                                                        <?php
                            if ($resultado) {
                                while ($vendas = $resultado->fetch_assoc()) {
                                    $idVenda = $vendas['id'];

                                    $quantidadeProdutosVenda = $conn->query("SELECT COUNT(*) AS quantidade_produtos FROM itens_venda WHERE venda_id=$idVenda;");

                                    if ($quantidadeProdutosVenda) {
                                        $row = $quantidadeProdutosVenda->fetch_assoc();
                                        $quantidadeProdutosVenda = $row['quantidade_produtos'];
                                    }
                                    ?>
                            <td><?php echo $vendas['id']; ?></td>
                            <td><?php echo $vendas['comprador_nome']; ?></td>
                            <td><?php echo ucwords($vendas['situacao']); ?></td>
                            <td><?php echo $quantidadeProdutosVenda; ?></td>
                            <td>$ <?php echo $vendas['total']; ?></td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <!-- Botão de editar com evento onclick para chamar a função toggleForm() -->
                                    <button onclick="toggleForm(<?php echo $vendas['id']; ?>)"
                                        class="btn btn-primary btn-action btn-block botao">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr id="form_<?php echo $vendas['id']; ?>" style="display:none;">
                        <form action="editar-situacao-processar.php" method="POST">
                                <td colspan="1"></td>
                                <td colspan="1"></td>
                                <td colspan="1">
                                    <select name="select_situacao">
                                        <?php
                                            $situacao = $conn->query("SELECT situacao FROM vendas WHERE id = $idVenda;");
                                            if($situacao){
                                                $row = $situacao->fetch_assoc();
                                                $situacao = $row['situacao'];           
                                            }

                                            $opcoes = array ('pendente','processando', 'concluido');

                                            foreach($opcoes as $opcao){
                                                echo $opcao;
                                                if ($opcao == $situacao){
                                                    echo "<option value=\"$opcao\" selected disabled>" . ucwords($opcao) . "</option>";
                                                }else{
                                                    echo "<option value=\"$opcao\" >". ucwords($opcao) ." </option>";
                                                }

                                        
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td colspan="1"></td>
                                <td colspan="1">
                                    <input type="hidden" value="<?php echo $vendas['id'] ?>" name="venda_id">
                                </td>
                                <td colspan="1">
                                <button type="submit"
                                        class="btn btn-success btn-action btn-block botao">
                                        <i class="fa-solid fa-floppy-disk"></i>                                    
                                    </button>

                                </td>
                            </form>
                        </tr>
                        <?php
}
}
?>
                        </tr>




                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>