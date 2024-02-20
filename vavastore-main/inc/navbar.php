<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Vava Store</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/0e/4d/fa/0e4dfa13eea59e804dc066948025f2b7.jpg"
        type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    
<!--     <link href="../css/style.css" rel="stylesheet" />
 -->    <link href="../css/style2.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    
</head>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container px-4 px-lg-5">
    <img src="https://i.pinimg.com/originals/0e/4d/fa/0e4dfa13eea59e804dc066948025f2b7.jpg" height="30" id="imagem" style="border-radius: 50px;"></img>
    <a class="navbar-brand" href="index.php">Vava store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Produtos</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#!"></a></li>
                    <li><a class="dropdown-item" href="#!"></a></li>
                </ul>
            </li>
        </ul>
        
        <a href="../views/carrinho.php" class="btn btn-outline-dark"><i class="bi-cart-fill me-1"></i>
                    Carrinho
                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $_SESSION['Q'];?></span></a>
                                                                                

   
    <?php
    if (isset($_SESSION["nome"])) { ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                <?= $_SESSION['nome'] ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="../usuario/logout.php">Logout</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <?php 
                        if(isset($_SESSION["perfil"] )){
                            if($_SESSION["perfil"] == 1){
                    ?>
                            <li><a class="dropdown-item" href="../admin/admin.php">Painel do ADM</a></li>
                            <li><hr class="dropdown-divider" /></li>
                          
                    <?php
                        }}
                    ?>
                </ul>
            </li>
        </ul>
    <?php
    } else { ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../views/login.php">Login</a>
            </li>
        </ul>

    <?php } ?>

</div>
</div>

</nav>