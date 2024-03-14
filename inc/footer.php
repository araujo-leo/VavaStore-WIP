<!-- Footer-->
<style>
    
    <?php 
    $urlAtual = $_SERVER['REQUEST_URI'];
    if(strpos($urlAtual, "show")){
    ?>
    footer{
        margin-top:28.5vh;
    }
    
    <?php } ?>
    <?php
    $urlAtual = $_SERVER['REQUEST_URI'];
    if(strpos($urlAtual, "carrinho")){
    ?>
    footer{
        margin-top: 21vh;
    }
    <?php
    }
    ?>
</style>
<footer class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-white">Sobre Nossa Loja</h4>
                <p class="text-white">Somos a Valorant Skins, sua fonte confiável para as skins mais raras e exclusivas do jogo Valorant. Explore nossa coleção premium de skins e melhore sua experiência no jogo.</p>
            </div>
            <div class="col-md-6">
                <h4 class="text-white">Contate-Nos</h4>
                <p class="text-white">Telefone: (123) 456-7890<br>Email: contato@valorantskins.com<br>Endereço: 1234 Rua das Skins, Cidade Valorant, VA 12345</p>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-secondary mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center text-white">&copy; 2023 Valorant Skins - Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </div>
</footer>