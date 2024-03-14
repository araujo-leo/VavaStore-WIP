<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vava Store</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/0e/4d/fa/0e4dfa13eea59e804dc066948025f2b7.jpg"
        type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link href="../css/style2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    :root {
        --header-height: 3rem;
        --nav-width: 68px;
        --first-color: #4723D9;
        --first-color-light: #AFA5D9;
        --white-color: #F7F6FB;
        --body-font: 'Nunito', sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100;
    }

    *,
    ::before,
    ::after {
        box-sizing: border-box;
    }

    body {
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: .5s;
    }

    a {
        text-decoration: none;
    }

    .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: var(--white-color);
        z-index: var(--z-fixed);
        transition: .5s;
    }

    .header_toggle {
        color: var(--first-color);
        font-size: 1.5rem;
        cursor: pointer;
        border: none;
    }

    .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden;
    }

    .header_img img {
        width: 40px;
    }

    .l-navbar {
        position: fixed;
        top: 0;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color: var(--first-color);
        padding: .5rem 1rem 0 0;
        transition: .5s;
        z-index: var(--z-fixed);
    }

    .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
    }

    .nav_logo,
    .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: .5rem 0 .5rem 1.5rem;
    }

    .nav_logo {
        margin-bottom: 2rem;
    }

    .nav_logo-icon {
        font-size: 1.25rem;
        color: var(--white-color);
    }

    .nav_logo-name {
        color: var(--white-color);
        font-weight: 700;
    }

    .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 1.5rem;
        transition: .3s;
    }

    .nav_link:hover {
        color: var(--white-color);
    }

    .nav_icon {
        font-size: 1.25rem;
    }

    .show {
        left: 0;
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 1rem);
    }

    .active {
        color: var(--white-color);
    }

    .active::before {
        content: '';
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: var(--white-color);
    }

    .height-100 {
        height: 100vh;
    }

    .navbar-brand {
        margin-left: 20vw;
        color: #000;
    }

    @media screen and (min-width: 768px) {
        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem);
        }

        .header {
            height: calc(var(--header-height) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
        }

        .header_img {
            width: 40px;
            height: 40px;
        }

        .header_img img {
            width: 45px;
        }

        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0;
        }

        .show {
            width: calc(var(--nav-width) + 156px);
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 188px);
        }
    }
    </style>
</head>

<body>

    <div class="header" id="header">
    <img src="https://i.pinimg.com/originals/0e/4d/fa/0e4dfa13eea59e804dc066948025f2b7.jpg" width="40" height="40" id="imagem" style="border-radius: 50%;" ></img>
        <a class="navbar-brand text-center" href="../views/index.php">Vava store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button class="header_toggle" id="header-toggle">
            <!-- Ícone ou conteúdo do botão para revelar o sidebar -->
            <i class="bx bx-menu"></i> <!-- Exemplo de ícone usando Boxicons, você pode personalizar o ícone aqui -->
        </button>
    </div>

    <div class="l-navbar" id="nav-bar">
    <nav class="nav">
    <div>
        <a href="../views/index.php" class="nav_logo">
            <i class='bx bx-layer nav_logo-icon'></i>
            <span class="nav_logo-name">VavaStore</span>
        </a>
        <div class="nav_list">
            <a href="../admin/admin.php" class="nav_link">
                <i class='bx bx-grid-alt nav_icon'></i>
                <span class="nav_name">Dashboard</span>
            </a>
            <a href="../admin/usuarios.php" class="nav_link">
                <i class='bx bx-user nav_icon'></i>
                <span class="nav_name">Usuários</span>
            </a>
            <a href="../admin/vendas.php" class="nav_link">
                <i class='bx bx-shopping-bag nav_icon'></i>
                <span class="nav_name">Vendas</span>
            </a>
            <a href="#" class="nav_link">
                <i class='bx bx-bookmark nav_icon'></i>
                <span class="nav_name">Bookmark</span>
            </a>
            <a href="#" class="nav_link">
                <i class='bx bx-folder nav_icon'></i>
                <span class="nav_name">Files</span>
            </a>
            <a href="#" class="nav_link">
                <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                <span class="nav_name">Stats</span>
            </a>
        </div>
    </div>
    <a href="../usuario/logout.php" class="nav_link">
        <i class='bx bx-log-out nav_icon'></i>
        <span class="nav_name">SignOut</span>
    </a>
</nav>
    </div>

    <!-- Conteúdo do corpo aqui -->

    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        const toggleButton = document.getElementById('header-toggle');
        const navbar = document.getElementById('nav-bar');

        toggleButton.addEventListener('click', function() {
            navbar.classList.toggle('show');
        });
    });
    document.addEventListener("DOMContentLoaded", function(event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)

            // Valide se todas as variáveis existem
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    // Mostra a barra de navegação
                    nav.classList.toggle('show');
                    // Muda o ícone
                    toggle.classList.toggle('bx-x');
                    // Adiciona preenchimento ao corpo
                    bodypd.classList.toggle('body-pd');
                    // Adiciona preenchimento ao cabeçalho
                    headerpd.classList.toggle('body-pd');
                });
            }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
            if (linkColor) {
                linkColor.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))
    });

    
    </script>
</body>

</html>