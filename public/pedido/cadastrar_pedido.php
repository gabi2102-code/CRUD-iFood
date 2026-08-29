<?php 
 
include '../../infra/conexao.php'; 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $data_pedido = $_POST['data_pedido']; 
    $valor = $_POST['valor']; 
    $status_pedido = $_POST['status_pedido']; 
    $restaurante_id= $_POST['restaurante_id']; 
    $cliente_id = $_POST['cliente_id']; 
 
    $sql = "INSERT INTO pedidos (data_pedido, valor, status_pedido, restaurante_id, cliente_id) 
            VALUES ('$data_pedido', '$valor', '$status_pedido', '$restaurante_id', '$cliente_id')"; 
 
    if ($conn->query($sql) === TRUE) { 
        echo "Novo pedido cadastrado com sucesso!"; 
    } else { 
        echo "Erro: " . $sql . "<br>" . $conn->error; 
    } 
} 
?> 
 
<!DOCTYPE html> 
<html lang="pt-BR"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Adicionar Novo Pedido</title> 
</head> 
 
<body> 
    <h2>Adicionar Novo Pedido</h2> 
 
    <form method="POST"> 
 
        <label for="data_pedido">Data do Pedido:</label> 
        <input type="date" id="data_pedido" name="data_pedido" required> 
        <br><br> 
 
        <label for="prato">Valor:</label> 
        <input type="text" id="valor" name="valor" required> 
        <br><br> 
 
        <label for="status_pedido">status_pedido:</label> 
        <input type="number" id="status_pedido" name="status_pedido" min="1" required> 
        <br><br> 
 
        <label for="restaurante_id">Restaurante:</label> 
        <input type="number" id="restaurante_id" name="restaurante_id" required> 
        <br><br> 
 
        <label for="cliente_id">Cliente:</label> 
        <select name="cliente_id" required> 
            <option value="">Selecione o Cliente</option> 
 
            <?php 
                $sql = "SELECT id, nome FROM clientes"; 
                $clientes = $conn->query($sql); 
                while ($cliente = $clientes->fetch_assoc()) { 
            ?> 
 
            <option value="<?php echo $cliente['id']; ?>">
                <?php echo $cliente['nome']; ?>
            </option> 
            <?php 
                } 
            ?> 
            
        </select> 
         <select name= "restaurante_id" required>
            <option value="">selecione o restaurante desejado</option>
            <?php
             $sql = "SELECT id, nome FROM restaurantes";
             $restaurantes = $conn->query($sql);
             while ($restaurante = $restaurantes->fetch_assoc()) {
            ?>
            <option value="<?php echo $restaurante['id']; ?>">
                <?php echo $restaurante['nome']; ?>
            </option>
            <?php
             }
            ?>
         </select>
        <br><br> 
 
        <button type="submit">Cadastrar Pedido</button> 
 
    </form> 
 
    <br> 
 
    <button type="button" onclick="window.location.href='../../index.php'">
        Voltar
    </button> 
 
</body> 
 
</html>