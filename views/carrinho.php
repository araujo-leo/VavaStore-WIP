<?php
    session_start();
    
    
        if (isset($_SESSION['nome'])){
        $total = 0;
        
        
        // Função para atualizar a quantidade de um item no carrinho
        function updateQuantity($produtoId, $quantidade) {
            if (isset($_SESSION['carrinho'][$produtoId])) {
              
                $_SESSION['carrinho'][$produtoId]['quantidade'] = $quantidade;
            }
        }

        // Função para remover um item do carrinho
        if (isset($_POST['removeItem'])) {
          $produtoId = $_POST['produtoId'];
          if (isset($_SESSION['carrinho'][$produtoId])) {
              unset($_SESSION['carrinho'][$produtoId]);
          }
        }

        if (isset($_POST['update'])) {
          $produtoId = $_POST['produto_id'];
          $acao = $_POST['update'];

          if ($acao === 'decrement') {
              if ($_SESSION['carrinho'][$produtoId]['quantidade'] > 1) {
                  $_SESSION['carrinho'][$produtoId]['quantidade']--;
              } else {
                  // Se a quantidade for 1, remova o item do carrinho.
                  unset($_SESSION['carrinho'][$produtoId]);
              }
          } elseif ($acao === 'increment') {
              // Se o botão de "+" foi clicado, aumente a quantidade em 1.
              $_SESSION['carrinho'][$produtoId]['quantidade']++;
          }
        }

        $totalItens = 0;

        if (isset($_SESSION['carrinho'])) {
            $total = 0; // Variável para armazenar o valor total

            foreach ($_SESSION['carrinho'] as $key => $value) {
                $totalItens++; // Incrementa a quantidade de itens no carrinho
                $_SESSION['totalItens'] = $totalItens;
            }
        }else{
          $_SESSION['totalItens'] = $totalItens;
        }


        ?>
<!DOCTYPE html>
<html lang="pt-br">
<style>
body {
    min-height: 100vh;
}
</style>

<body style="background-color: rgb(238, 238, 238);">
    <?php require "../inc/navbar.php"; ?>

    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">

                                <div class="col-lg-12">
                                    <h5 class="mb-3">Carrinho de compras
                                    </h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-0">Você tem <?php echo $totalItens ?> itens no carrinho
                                            </p>
                                        </div>
                                        <div>
                                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                                    class="text-body">price <i class="fas fa-angle-down mt-1"></i></a>
                                            </p>
                                        </div>
                                    </div>

                                    <?php
                          if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
                          foreach ($_SESSION['carrinho'] as $key => $value) {

                            $nome = $value['nome'];
                            $quantidade = $value['quantidade'];
                            $preco = $value['preco'];
                    
                            // Calcula o subtotal para cada item
                            $subtotal = $quantidade * $preco;
                    
                            // Adiciona o subtotal ao total
                            $total += $subtotal; 
                            
                            $_SESSION['total_checkout'] = $total;
                            
                        ?>


                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div>
                                                        <img src="../produtos/imagens/skins/<?php echo $value['categoria']?>/<?php echo $value['nome'];?>.png"
                                                            class="img-fluid rounded-3" alt="Shopping item"
                                                            style="width: 65px;">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5><?php echo  ucwords($value['nome'])?></h5>
                                                        <p class="small mb-0">
                                                            <?php echo ucwords($value['descricao'])?> </p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <form method="post">
                                                        <input type="hidden" name="produto_id"
                                                            value="<?php echo $key; ?>">
                                                        <input type="hidden" name="update" value="decrement">
                                                        <button type="submit" class="btn btn-link">
                                                            <i class="fas fa-minus"
                                                                style="color: #cecece; font-size: 20px;"></i>
                                                        </button>
                                                    </form>
                                                    <h5 class="fw-normal mb-0" style="margin: 0 10px;">
                                                        <?php echo $value['quantidade']?></h5>
                                                    <form method="post">
                                                        <input type="hidden" name="produto_id"
                                                            value="<?php echo $key; ?>">
                                                        <input type="hidden" name="update" value="increment">
                                                        <button type="submit" class="btn btn-link">
                                                            <i class="fas fa-plus"
                                                                style="color: #cecece; font-size: 20px;"></i>
                                                        </button>
                                                    </form>
                                                </div>



                                                <div class="d-flex flex-row align-items-center ">
                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">R$<?php echo $value['preco']?></h5>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } }?>


                                    <?php 
                                if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
                            ?>
                                    <a href=" <?php if($total > 0){ echo 'checkout.php';}?>"
                                        class="btn btn-info btn-block btn-lg col-lg-12" id="submit-button">
                                        <div class="d-flex justify-content-between">
                                            <span>R$ <?php echo $total ?></span>
                                            <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                        </div>
                                    </a>
                            <?php
                                } else {

                            ?>

                                    <a href=" <?php if($total > 0){ echo 'checkout.php';}?>"
                                        class="btn btn-info btn-block btn-lg col-lg-12" id="submit-button" disabled style="opacity: 0.7; cursor: not-allowed;">
                                        <div class="d-flex justify-content-between">
                                            <span>R$ <?php echo $total ?></span>
                                            <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                        </div>
                                    </a>
                                    
                            <?php
                                } 
                            ?>

                    



                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "../inc/footer.php"; ?>

    <script>
    const inputCartao = document.getElementById('typeText');

    inputCartao.addEventListener('input', function(e) {
        let trimmedValue = e.target.value.replace(/\s+/g, '');
        trimmedValue = trimmedValue.replace(/[^0-9]/gi, '');

        let formattedValue = '';
        for (let i = 0; i < trimmedValue.length; i++) {
            if (i > 0 && i % 4 === 0) {
                formattedValue += ' ';
            }
            formattedValue += trimmedValue[i];
        }

        e.target.value = formattedValue;
        detectarCartao(e.target.value);
    });

    const inputValidadeCartao = document.getElementById('validadeCartao');

    inputValidadeCartao.addEventListener('input', function() {
        let valorAtual = inputValidadeCartao.value.replace(/\D/g, '');
        if (valorAtual.length > 4) {
            valorAtual = valorAtual.slice(0, 4);
        }

        let valorFormatado = '';
        for (let i = 0; i < valorAtual.length; i++) {
            if (i === 2 && valorAtual.length > 2) {
                valorFormatado += '/' + valorAtual[i];
            } else {
                valorFormatado += valorAtual[i];
            }
        }

        inputValidadeCartao.value = valorFormatado;
    });

    const inputCVV = document.getElementById('cvvCartao');

    inputCVV.addEventListener('input', function(event) {
        let valorAtual = event.target.value.replace(/\D/g, ''); // Remove caracteres não numéricos
        const cvvMaxLength =
            4; // Defina o comprimento máximo do CVV (por exemplo, 4 dígitos para a maioria dos cartões)

        if (valorAtual.length > cvvMaxLength) {
            valorAtual = valorAtual.slice(0, cvvMaxLength);
        }

        event.target.value = valorAtual;
    });

    inputCVV.addEventListener('keypress', function(event) {
        const key = event.key;
        const isNumber = /^\d$/.test(key); // Verifica se o caractere digitado é um número

        if (!isNumber) {
            event.preventDefault(); // Impede a inserção de caracteres que não sejam números
        }
    });


    function detectarCartao(nCartao) {
        const visaPadrao = /^4/;
        const mastercardPadrao = /^5/;
        const amexPadrao = /^3[47]/;
        const discoverPadrao = /^6(?:011|4[4-9]|5)/;
        const dinersClubPadrao = /^3(?:0[0-5]|[68])/;

        const cardIcons = document.querySelectorAll('.fab'); // Seleciona todos os ícones de cartão
        let bandeira = "";
        cardIcons.forEach(icon => {
            if (visaPadrao.test(nCartao) && icon.classList.contains('fa-cc-visa')) {
                icon.classList.remove('text-white');
                icon.classList.add('text-success');
                bandeira = "visa";
            } else if (mastercardPadrao.test(nCartao) && icon.classList.contains('fa-cc-mastercard')) {
                icon.classList.remove('text-white');
                icon.classList.add('text-success');
                bandeira = "mastercard";
            } else if (amexPadrao.test(nCartao) && icon.classList.contains('fa-cc-amex')) {
                icon.classList.remove('text-white');
                icon.classList.add('text-success');
                bandeira = "amex";
            } else if (discoverPadrao.test(nCartao) && icon.classList.contains('fa-cc-discover')) {
                icon.classList.remove('text-white');
                icon.classList.add('text-success');
                bandeira = "discover";
            } else if (dinersClubPadrao.test(nCartao) && icon.classList.contains('fa-cc-diners-club')) {
                icon.classList.remove('text-white');
                icon.classList.add('text-success');
                bandeira = "diners";
            } else {
                icon.classList.remove('text-success');
                icon.classList.add('text-white');
            }
        });
        const bandeiraCartaoInput = document.getElementById('bandeiraCartao');
        bandeiraCartaoInput.value = bandeira;
    }
    </script>
    <!-- Bootstrap core JS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <?php 
}else{
    header('Location: index.php?login=0');
}
            ?>
</body>

</html>