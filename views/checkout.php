<?php

session_start();

$total_checkout = isset($_SESSION['total_checkout']) ? $_SESSION['total_checkout'] : 0;
$stripePublicKey = 'pk_test_51ORhQRG2Ki4fw9xAE22KbE2VI5RaObo6zDGRx4rq9WbuP2KhNWu7ZJPW3SAdYDYY4rYQxHvON9K7ZXRMKVqdLspi00DGGEj5Lq';


$token = uniqid();

$_SESSION['form_token'] = $token;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
</head>

<body style="background-color: rgb(238, 238, 238);">
    <?php require "../inc/navbar.php"; ?>
    <div class="col-lg-8 mx-auto my-4">
        <div class="card bg-light rounded-3">
            <div class="card-body">
                <h5 class="mb-4">Informações de Entrega</h5>
                <form id="cepForm" action="../inc/viacep.php" method="post">

                    <div class="form-outline mb-4">
                        <input type="text" name="cep"  id="zipCode" class="form-control" placeholder="CEP (apenas números)" maxLength="9"
                            value="<?php 
                                if(isset($_GET['address']) && $_GET['address'] == "success"){ 
                                    echo htmlspecialchars($_SESSION['address']['cep']);
                                }?>">
                        <div id="cepError" class="text-danger font-weight-bold ">
                            <?php 
                                if(isset($_GET['address']) && $_GET['address'] == "fail"){
                                    echo 'Erro ao obter dados do endereço';
                                }
                                else{
                                    echo '';
                                }
                            ?>
                        </div>
                        <label class="form-label" for="zipCode">CEP</label>
                        
                    </div>
                </form>


                <form action="../inc/pagamento.php" method="POST" id="delivery-form">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" name="nomeCompleto" id="fullName" class="form-control text-bold"
                                    placeholder="Nome completo" value="<?php echo $_SESSION['nome']; ?>" required/>
                                <label class="form-label" for="fullName">Nome completo</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="tel" name="telefone" id="phone" class="form-control"
                                    placeholder="Telefone" required />
                                <label class="form-label" for="phone">Telefone</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-4">
                        <div class="form-group col-md-10">
                        <input type="text" name="endereco" id="address" class="form-control"placeholder="Endereço completo" value="<?php 
                                if(isset($_GET['address']) && $_GET['address'] == "success"){ 
                                    echo htmlspecialchars($_SESSION['address']['logradouro'] . ', ' . $_SESSION['address']['bairro']);
                                }?>" required>
                        <label class="form-label" for="address">Endereço completo</label>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" name="numero" id="number" class="form-control" placeholder="Número" required/>
                            <label class="form-label" for="number">Nº</label>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" name="cidade" id="city" class="form-control" placeholder="Cidade" value="<?php 
                                if(isset($_GET['address']) && $_GET['address'] == "success"){ 
                                    echo htmlspecialchars($_SESSION['address']['localidade']);
                                }?>" required/>
                                <label class="form-label" for="city">Cidade</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" name="estado" id="state" class="form-control" placeholder="Estado" value="<?php 
                                if(isset($_GET['address']) && $_GET['address'] == "success"){ 
                                    echo htmlspecialchars($_SESSION['address']['uf']);
                                }?>" required/>
                                <label class="form-label" for="state">Estado</label>
                            </div>
                        </div>
                    </div>


                    <hr class="my-4 bg-dark mb-5">


                        <div class="card bg-primary text-white rounded-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0">Detalhes do cartão</h5>

                                </div>

                                <i class="fab fa-cc-mastercard fa-2x me-2 text-white"></i>
                                <i class="fab fa-cc-visa fa-2x me-2  text-white"></i>
                                <i class="fab fa-cc-amex fa-2x me-2  text-white"></i>
                                <i class="fab fa-cc-discover fa-2x me-2  text-white"></i>
                                <i class="fab fa-cc-diners-club fa-2x me-2  text-white"></i>


                                
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="nomeCartao" id="typeName"
                                            class="form-control form-control-lg" siez="17"
                                            placeholder="Nome presente no cartão" />
                                        <label class="form-label" for="typeName">Nome presente no
                                            cartão</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="nCartao" class="form-control form-control-lg" siez="17"
                                            placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                        <label class="form-label" for="typeText">N° do
                                            cartão</label>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="form-outline form-white">
                                                <input type="text" name="validadeCartao" id="validadeCartao"
                                                    class="form-control form-control-lg" placeholder="MM/YY" size="7"
                                                    id="exp" minlength="7" maxlength="7" />
                                                <label class="form-label" for="typeExp">Validade</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-outline form-white">
                                                <input type="password" name="cvvCartao" id="typeText"
                                                    class="form-control form-control-lg"
                                                    placeholder="&#9679;&#9679;&#9679;&#9679;" size="1" minlength="3"
                                                    maxlength="4" />
                                                <label class="form-label" for="typeText">Cvv</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="preco" value="<?php echo $total_checkout +20 ?>">
                                    <input type="hidden" id="bandeiraCartao" name="bandeiraCartao" value="">


                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Subtotal</p>
                                        <p class="mb-2">R$ <?php echo $total_checkout ?></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Taxa de envio + taxa do amor</p>
                                        <p class="mb-2">R$ 20.00</p>
                                    </div>

                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-2">Total(Incl. taxas)</p>
                                        <p class="mb-2">R$ <?php echo $total_checkout + 20 ?></p>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block btn-lg" id="checkout-button">
                                        <div class="d-flex justify-content-between">
                                            <span>R$ <?php echo $total_checkout ?></span>
                                            <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                        </div>
                                    </button>
                                
                            </div>
                        </div>

                    </div>


                    <input type="hidden" name="token" value="<?php echo $token; ?>">                
                </form>
            </div>
        </div>
    </div>


    <script>
    const cepForm = document.getElementById('cepForm');
    const cepInput = document.getElementById('zipCode');

    cepInput.addEventListener('input', function () {
        let cep = cepInput.value.replace(/\D/g, '');

        if (cep.length === 8) {
            cep = cep.slice(0, 5) + '-' + cep.slice(5);

            cepForm.submit();
        }

        cepInput.value = cep;
    });

    

    cepForm.addEventListener('submit', function () {
        console.log('Formulário enviado');
    });


    const phoneInput = document.getElementById('phone');

    phoneInput.addEventListener('input', function () {
        let phoneNumber = phoneInput.value.replace(/\D/g, ''); 

        if (phoneNumber.length >= 11) {
                                phoneNumber = `(${phoneNumber.substring(0, 2)}) ${phoneNumber.substring(2, 7)}-${phoneNumber.substring(7)}`;
        }

        phoneInput.value = phoneNumber;

        
    });

    phoneInput.addEventListener('blur', function () {
        // Remova caracteres não numéricos ao salvar no banco de dados
        const phoneSemFormatacao = phoneInput.value.replace(/\D/g, '');
        console.log('Número sem formatação:', phoneSemFormatacao);
    });
    
    </script>

</body>

</html>