<?php
include 'conn.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT email, senha FROM user WHERE `email` = '$email' AND `senha`= '$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $_SESSION['email'] = $email;
  $_SESSION['senha'] = $password;
  header('location:admin.php');
} else {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('location:form-login.php');
}

mysqli_close($conn);
?>
