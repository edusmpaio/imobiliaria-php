<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'imobiliaria';

$conn = mysqli_connect("$host", "$user", "$password", "$database");

// Verificar conexão
if (!$conn) {
  die('Conexão falhou: ' . mysqli_connect_error());
}
?>
