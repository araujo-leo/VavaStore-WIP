<?php
session_start();
require "../inc/conexao.php";

$idUsuario = $_SESSION['idUsuario'];

$resultado = $conn->query("SELECT * FROM vendas WHERE comprador_id = $idUsuario;");


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style3.css">

    <style>
    .container-principal {
        min-height: 80vh;
        margin-bottom: 3rem;
    }

    .center-btn-group {
        text-align: center;
    }

    .btn-selected {
        border-bottom: solid 2px #0d6efd !important;
        color: #0d6efd !important;
        transform: scale(1.05);
    }
    </style>
</head>

<body style="background-color: rgb(238, 238, 238);">
    <?php require_once "../inc/navbar.php"; ?>

    <div class="container container-principal">
        <div class="row">
            <div class="col-md-12 center-btn-group">
                <div class="btn-group mx-auto mt-lg-3">
                    <button type="button" class="btn btn-light filtro-btn btn-selected"
                        data-filter="todas">Todas</button>
                    <button type="button" class="btn btn-light filtro-btn" data-filter="pendente">Pendente</button>
                    <button type="button" class="btn btn-light filtro-btn"
                        data-filter="processando">Processando</button>
                    <button type="button" class="btn btn-light filtro-btn" data-filter="concluida">Concluída</button>
                </div>
            </div>
        </div>

        <div id="conteudoFiltrado">
            <?php

        if ($resultado) {
            while ($venda = $resultado->fetch_assoc()) {
                
                $idVenda = $venda['id'];
                $temItens = false;

                
        ?>
            <div class="compra item" data-status="<?php echo $venda['situacao']; ?>">
                <header class="header-venda">
                    <h1 class="preco">R$ <?php echo $venda['total'];?></h1>
                    <h1 class="status"><?php echo ucwords($venda['situacao']);?></h1>
                </header>

                <?php
                $itens_venda = $conn->query("SELECT * FROM itens_venda WHERE venda_id=$idVenda;");
                
                if ($itens_venda) {
                    while ($item_venda = $itens_venda->fetch_assoc()) {
                       
                        

                        
        ?>
                <div class="body-venda">
                    <div class="img-produto">
                        <img src="../produtos/imagens/skins/<?php echo $item_venda['produto_categoria']; ?>/<?php echo $item_venda['produto_nome']; ?>.png"
                            alt="">
                    </div>
                    <div class="info-produto">
                        <h2><?php echo $item_venda['produto_nome'];?></h2>
                        <h3><?php echo $item_venda['produto_categoria'];?></h3>
                    </div>
                    <div class="produto-preco">
                        <p><?php echo $item_venda['preco_unitario'];?></p>
                    </div>
                </div>






                <?php
                
                    }
        ?>
            </div>
            <?php
                }
                
            }

            $resultado->free();
        } else {
            echo "Erro na consulta: " . $conn->error;
        }
        $conn->close();

        ?>



        </div>

    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php include "../inc/footer.php"; ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll(".filtro-btn");
    const conteudoFiltrado = document.getElementById("conteudoFiltrado");

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(btn => btn.classList.remove('btn-selected'));
            this.classList.add('btn-selected');

            const filtro = this.getAttribute('data-filter');
            filtrarConteudo(filtro);
        });
    });

    function filtrarConteudo(filtro) {
        const items = conteudoFiltrado.querySelectorAll('.item');
        let algumItemVisivel = false;

        items.forEach(item => {
            const status = item.getAttribute('data-status');
            if (filtro === 'todas' || status === filtro) {
                item.style.display = 'block';
                algumItemVisivel = true;
            } else {
                item.style.display = 'none';
            }
        });

        if (algumItemVisivel) {
            removerMensagemNenhumPedido();
        } else {
            mostrarMensagemNenhumPedido();
        }
    }

    function mostrarMensagemNenhumPedido() {
        const mensagem = document.createElement('p');
        mensagem.textContent = 'Ainda não há pedidos.';
        mensagem.style.fontSize = '18px';
        mensagem.style.color = '#777';
        mensagem.id = 'nenhum-pedido-mensagem';

        // Verifica se a mensagem já existe antes de adicioná-la novamente
        const mensagemExistente = document.getElementById('nenhum-pedido-mensagem');
        if (!mensagemExistente) {
            conteudoFiltrado.appendChild(mensagem);
        }
    }

    function removerMensagemNenhumPedido() {
        // Remove o elemento de mensagem se existir
        const mensagem = document.getElementById('nenhum-pedido-mensagem');
        if (mensagem) {
            mensagem.remove();
        }
    }
});
    </script>

</body>

</html>