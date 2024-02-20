<?php
session_start();
require "../produtos/processar-produtos.php";

$infoProdutos = processar_produtos();

// Inicializar a quantidade no carrinho como 0
$_SESSION['Q'] = 0;

// Calcular a quantidade com base no conteúdo do carrinho
if (isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $item) {
        $_SESSION['Q'] += $item['quantidade'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<body style="background-color: rgb(238, 238, 238);">
    <?php
    include "../inc/navbar.php";


    require "../alerts/alerts.php";
    ?>
    <style>
    body {
        background: #e2eaef;
        font-family: "Open Sans", sans-serif;
    }

    h2 {
        color: #000;
        font-size: 26px;
        font-weight: 300;
        text-align: center;
        text-transform: uppercase;
        position: relative;
        margin: 30px 0 60px;
    }

    h2::after {
        content: "";
        width: 100px;
        position: absolute;
        margin: 0 auto;
        height: 4px;
        border-radius: 1px;
        background: #7ac400;
        left: 0;
        right: 0;
        bottom: -20px;
    }

    .thumb-wrapper {
        padding: 25px 15px;
        background: #fff;
        border-radius: 6px;
        text-align: center;
        position: relative;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
    }

    .thumb-wrapper .img-box {
        height: 120px;
        margin-bottom: 20px;
        width: 100%;
        position: relative;
    }

    .thumb-wrapper img {
        max-width: 100%;
        max-height: 100%;
        display: inline-block;
        position: absolute;
        bottom: 0;
        margin: 0 auto;
        left: 0;
        right: 0;
    }

    .thumb-wrapper h4 {
        font-size: 18px;
    }

    .thumb-wrapper h4,
    .thumb-wrapper p,
    .thumb-wrapper ul {
        margin-bottom: 5px;
    }

    .thumb-wrapper .btn {
        color: #7ac400;
        font-size: 11px;
        text-transform: uppercase;
        font-weight: bold;
        background: none;
        border: 1px solid #7ac400;
        padding: 6px 14px;
        margin-top: 5px;
        line-height: 16px;
        border-radius: 20px;
    }

    .thumb-wrapper .btn:hover,
    .thumb-wrapper .btn:focus {
        color: #fff;
        background: #7ac400;
        box-shadow: none;
    }

    .thumb-wrapper .btn i {
        font-size: 14px;
        font-weight: bold;
        margin-left: 5px;
    }

    .thumb-wrapper .item-price {
        font-size: 13px;
        padding: 2px 0;
    }

    .thumb-wrapper .item-price strike {
        opacity: 0.7;
        margin-right: 5px;
    }

    .wish-icon {
        position: absolute;
        right: 10px;
        top: 10px;
        z-index: 99;
        cursor: pointer;
        font-size: 16px;
        color: #abb0b8;
    }

    .wish-icon .fa-heart {
        color: #ff6161;
    }


    .card-link {
        color: black;
        transition: color 0.3s ease, background-color 0.3s ease;
        background-color: white;
    }

    .card-link:hover {
        color: darkgrey !important;
        background-color: #333 !important;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) !important;
    }
    </style>
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <?php
                        $first = true; // Variável para controlar o primeiro item ativo
                        foreach ($infoProdutos as $produto) {
                        ?>
                        <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                            <img class="d-block w-100"
                                src="../produtos/imagens/skins/<?php echo $produto['categoria']; ?>/<?php echo $produto['nome']; ?>.png"
                                alt="<?php echo $produto['id'] ?> slide" style="max-height:190px">
                        </div>
                        <?php
                            $first = false; // Define o primeiro item como inativo após o primeiro loop
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Section-->



    <section class="py-5 " style="background-color: rgb(238, 238, 238);">
        <div class="container">
            <div class="d-flex flex-wrap">

                <?php
                foreach ($infoProdutos as $produto) {

                    $nomeProduto = ucwords($produto['nome']); // Converte a primeira letra de cada palavra para maiúscula
                    $categoriaProduto = ucwords($produto['categoria']); // Converte a primeira letra de cada palavra para maiúscula
                    
                    ?>
                <a href="show.php?id=<?php echo $produto['id']; ?>" class="card-link">
                    <div class="col-sm-3 mt-2 mb-2">

                        <div class="thumb-wrapper">
                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                            <div class="img-box">
                                <img src="../produtos/imagens/skins/<?php echo $produto['categoria']; ?>/<?php echo $produto['nome']; ?>.png"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="thumb-content">
                                <h4><?php echo $nomeProduto; ?></h4>
                                <p class="text-muted"><?php echo $categoriaProduto; ?></p>
                                <p class="item-price"><b><?php echo $produto['preco']; ?></b></p>
                                <a href="?adicionar=<?php echo $produto["id"]?>" class="btn btn-primary">Add to
                                    Cart</a>
                            </div>
                        </div>

                    </div>
                </a>



                <?php                                        

                }

                ?>
            </div>
        </div>
        </div>
        </div>
        <?php
                    if (isset($_GET["adicionar"])) {
                        if (isset($_SESSION['nome'])){

                            $_SESSION['Q']++;

                            $idProduto = (int) $_GET["adicionar"];
                           
                            if ($idProduto >= 1 && $idProduto <= count($infoProdutos)) {
                                $produto = $infoProdutos[$idProduto - 1]; // Subtrai 1 para obter o índice correto
                                
                        
                                if (isset($_SESSION['carrinho'][$idProduto])) {
                                    $_SESSION['carrinho'][$idProduto]['quantidade']++;
                                } else {
                                    $_SESSION['carrinho'][$idProduto] = array(
                                        'quantidade' => 1,
                                        'nome' => $produto['nome'],
                                        'descricao' => $produto['descricao'],
                                        'categoria' => $produto['categoria'],
                                        'preco' => $produto['preco']
                                    );
                                }
                        
                                // Exibir SweetAlert
                                echo '<script>
                                    Swal.fire({
                                        title: "Produto adicionado ao carrinho com sucesso!",
                                        text: "",
                                        icon: "success",
                                        showCancelButton: true,
                                        confirmButtonColor: "#3085d6",
                                        cancelButtonColor: "#008000",
                                        confirmButtonText: "Ir para o Carrinho",
                                        cancelButtonText: "Continuar Comprando"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "carrinho.php";
                                        } else{
                                            window.location.href = "index.php";
                                        }
                                    })
                                </script>';
                            } else {
                                die("Produto não encontrado.");
                            }
                        }else{
                            echo '<script>
                                    Swal.fire({
                                        title: "Acesso Restrito!",
                                        text: "É preciso estar logado para adicionar o produto ao carrinho",
                                        icon: "error",
                                        showCancelButton: false,
                                        confirmButtonColor: "#3085d6",
                                        confirmButtonText: "OK!",
    
                                    })
                                </script>';
                        }
                    }
                    ?>
        </div>
        </div>
    </section>
    <?php include "../inc/footer.php"; ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>