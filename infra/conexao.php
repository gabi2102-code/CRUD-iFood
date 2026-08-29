<?php 
$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'restaurante';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn-> connect_error){
    die("falha na conexão: " . $conn->connect_error);

}
?>
