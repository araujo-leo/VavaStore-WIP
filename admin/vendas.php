<?php
session_start();
include "../inc/adminIncs.php";
require "../produtos/processar-produtos.php";
require_once "../inc/conexao.php";

$resultado = $conn->query("SELECT * FROM vendas");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/style4.css">
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
                    <h4>30 Vendas</h4>
                </div>
                <div class="estatistica total-vendido">
                    <p>Total Vendido</p>
                    <h4>$30.00</h4>
                </div>
                <div class="estatistica total-lucro">
                    <p>Total Lucro</p>
                    <h4>$12.00</h4>
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
                            <th>Status</th>
                            <th style="font-size:0.8em;">Quantidade <br> de produtos</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                        if ($resultado) {
                            
                            while($vendas = $resultado->fetch_assoc()){

                            ?>
                            <td><?php echo $vendas['id']; ?></td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>
                        <div class="d-flex justify-content-around">
                            <form action="../produtos/editar-produto.php" method="GET" class="form-inline">
                                <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                                <button type="submit" class="btn btn-primary btn-action btn-block botao">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                            </tr>
                    
                    <?php
                                
                            }
                            
                        }
                    ?>
                            
                            
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>