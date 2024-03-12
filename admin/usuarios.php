<?php
session_start();
include "../inc/adminIncs.php";
require "../inc/conexao.php";

if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 1) { 
    $sql = "SELECT * FROM usuarios;";

 require "../alerts/alerts.php";

    ?>

<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container text-center mt-lg-5">
        <table class="table table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($results = $conn->query($sql)) {
                        $resultArray = $results->fetch_all(MYSQLI_ASSOC);

                        if (!empty($resultArray)) {
                            foreach ($resultArray as $result) {
                                $nomeUsuario = $result['nome'];
                                $emailUsuario = $result['email'];
                                $senhaUsuario = $result['senha'];
                                $perfilUsuario = $result['perfil'];
                                ?>
                <tr>
                    <td><?= $nomeUsuario; ?></td>
                    <td><?= $emailUsuario; ?></td>
                    <td><?= $senhaUsuario; ?></td>
                    <td><?php
                                        if ($perfilUsuario == 1) {
                                            echo "Administrador";
                                        } else {
                                            echo "Usuário";
                                        };
                                        ?>
                    </td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <form action="editar-usuario.php" method="GET" class="form-inline">
                                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                                <button type="submit" class="btn btn-primary btn-action btn-block botao">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </form>
                            <button class="btn btn-danger btn-action botao"
                                onclick="confirmarExclusao(<?= $result['id'] ?>)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php
                            }
                        }
                    }
                    ?>
            </tbody>
        </table>
    </div>
    <script>
    function confirmarExclusao(id) {
        Swal.fire({
            title: 'Você tem certeza?',
            text: 'Você deseja excluir este usuário?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, eu quero',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'excluir-usuario.php?id=' + id;
            }
        });
    }
    </script>
</body>

</html>
<?php
} else{ echo'
    <script>
     window.location.href = "../index.php?AcessoNegado";
    </script>';
}
?>