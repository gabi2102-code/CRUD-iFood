<?php 
 
include '../../infra/conexao.php'; 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $cliente = $_POST['cliente']; 
    $prato = $_POST['prato']; 
    $quantidade = $_POST['quantidade']; 
    $valor = $_POST['valor']; 
    $garcom_id = $_POST['garcom_id']; 
 
    $sql = "INSERT INTO pedidos (cliente, prato, quantidade, valor, garcom_id) 
            VALUES ('$cliente', '$prato', '$quantidade', '$valor', '$garcom_id')"; 
 
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
 
        <label for="cliente">Nome do Cliente:</label> 
        <input type="text" id="cliente" name="cliente" required> 
        <br><br> 
 
        <label for="prato">Prato:</label> 
        <input type="text" id="prato" name="prato" required> 
        <br><br> 
 
        <label for="quantidade">Quantidade:</label> 
        <input type="number" id="quantidade" name="quantidade" min="1" required> 
        <br><br> 
 
        <label for="valor">Valor (R$):</label> 
        <input type="number" step="0.01" id="valor" name="valor" required> 
        <br><br> 
 
        <label for="garcom_id">Garçom:</label> 
        <select name="garcom_id" required> 
            <option value="">Selecione o Garçom</option> 
 
            <?php 
                $sql = "SELECT id, nome FROM garcons"; 
                $garcons = $conn->query($sql); 
 
                while ($garcom = $garcons->fetch_assoc()) { 
            ?> 
 
            <option value="<?php echo $garcom['id']; ?>">
                <?php echo $garcom['nome']; ?>
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