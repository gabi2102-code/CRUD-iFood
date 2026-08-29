<?php

include '../../infra/conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM restaurantes WHERE id = $id";
$restaurante_editantes = $conn->query($sql);
$restaurante = $restaurante_editantes->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "UPDATE restaurantes SET nome='$nome', categoria='$categoria', telefone='$telefone', endereco='$endereco' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Restaurante atualizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Restaurante</title>
</head>
<body>
    <h2>Editar Cliente</h2>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $cliente['nome']; ?>" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>" required>
        <br><br>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo $cliente['categoria']; ?>" required>
        <br><br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo $cliente['telefone']; ?>">
        <br><br>
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" value="<?php echo $cliente['endereco']; ?>">
        <br><br>
        <button type="submit">Editar Restaurante</button>
    </form> 
    <br>  
    <button type="button" onclick="window.location.href='../../index.php'">Voltar</button>
</body>
</html>