<?php
session_start(); 

if (isset($_POST['cep'])) {
    $CEP = $_POST['cep'];

    $url = "https://viacep.com.br/ws/" . $CEP . "/json/";

    $address = json_decode(file_get_contents($url), true);


    if ($address && !isset($address['erro'])) {

        $_SESSION['address'] = [
            'cep' => $address['cep'],
            'logradouro' => $address['logradouro'],
            'complemento' => $address['complemento'],
            'bairro' => $address['bairro'],
            'localidade' => $address['localidade'],
            'uf' => $address['uf'],
        ];


        
        header('Location: ../views/checkout.php?address=success');
    } else {
        header('Location: ../views/checkout.php?address=fail');
    }
} else {
    echo "CEP não fornecido na solicitação.";
}
?>



