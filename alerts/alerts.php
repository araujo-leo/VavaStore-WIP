<?php

if(isset($_GET['login-sucesso']) && $_GET['login-sucesso'] == 1) {?>
    <script>
        Swal.fire({
            title: 'Sucesso',
            text: 'Login feito com sucesso',
            icon: 'success', 
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../views/index.php'; 
            }
        });
    </script>
<?php
} else if(isset($_GET['login-sucesso']) && $_GET['login-sucesso'] == 0){ ?>
    <script>
        Swal.fire({
            title: 'Erro',
            text: 'Email ou senha incorretos',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.php'; 
            }
        });
    </script>
<?php
}
?>









<?php
if(isset($_GET['cadastro-sucesso']) && $_GET['cadastro-sucesso'] == 1) {?>
    <script>
         Swal.fire({
        title: 'Sucesso',
        text: 'Cadastro realizado com sucesso',
        icon: 'sucess',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../views/login.php'; 
        }
    });
    </script>
<?php	
    }
?>




<?php 
if (isset($_GET['logout-sucesso']) && $_GET['logout-sucesso'] == 1) {
    ?>
    <script>
    Swal.fire({
        title: 'Sucesso',
        text: 'Logout feito com sucesso',
        icon: 'info',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php';
        }
    });
    </script>

    <?php }
        if(isset($_GET['AcessoNegado'])){
    ?>
    <script>
    Swal.fire({
        title: 'Acesso Negado',
        text: 'Você não é um administrador!',
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php';
        }
    });
    </script>
    <?php
        }
    ?>



<?php 
        if(isset($_GET['login']) && $_GET['login'] == 0){
    ?>
    <script>
    Swal.fire({
        title: 'Acesso Negado',
        text: 'É preciso estar logado!',
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php';
        }
    });
    </script>
    <?php
        }
    ?>





<?php
if (isset($_GET['sucesso-editar-usuario']) && $_GET['sucesso-editar-usuario'] == 1){
    echo   '<script>
                Swal.fire({
                    title: "Usuário editado com sucesso!",
                    text: "",
                    icon: "success",
                })
            </script>';
}

if (isset($_GET['excluir-user']) && $_GET['excluir-user'] == 1){
    echo   '<script>
                Swal.fire({
                    title: "Usuario excluído com sucesso!",
                    text: "",
                    icon: "success",
                })
            </script>';
}   

?>