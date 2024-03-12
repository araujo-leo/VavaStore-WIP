<?php
session_start();
include "../inc/adminIncs.php";
require "../inc/conexao.php";

if(isset($_GET['id'])){
    $idToEdit = $_GET['id'];
}else{
    //redirecioanr para algum lugar (ver depois)
}

if(isset($idToEdit)){
    $sql = "SELECT * FROM usuarios WHERE id = $idToEdit;";
    $resultado = mysqli_query($conn, $sql);


    if ($resultado) {
        $usuario = mysqli_fetch_assoc($resultado);
    } else {
        // Lidar com erros na consulta
        echo "Erro na consulta: " . mysqli_error($conexao);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<body>
<div class="container" style="margin-top: 100px;">
    <form action="editar-usuario-processar.php" class="my-4" method="POST">
        <input type="hidden" name="id" value="<?php echo $idToEdit; ?>">
        <div class="form-group">
            <label for="name">Nome do usuário:</label>
            <input type="text" name="name" class="form-control" value="<?php echo $usuario['nome'] ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Email do usuário:</label>
            <input type="text" name="email" class="form-control" value="<?php echo $usuario['email'] ?>">
        </div>
        <div class="form-group">
            <label for="categoria">Senha do usuário:</label>
            <input type="text" name="senha" class="form-control" value="<?php echo $usuario['senha'] ?>" disabled="">
        </div>
        <div class="form-group ">
            <label for="Perfil">Tipo de conta:</label>
            <select name="perfil" style="width: 100%" class="custom-select">
                <option value="1">
                        Administrador
                </option>
                <option value="0">
                        Usuário
                </option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
</body>
</html>