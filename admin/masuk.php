<?php
/**
 * Membuat Session untuk Login ke Halaman Administrator jika Username
 * dan Password cocok dalam database.
 */
require 'inc/Autoloader.php';
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$admin = new Admin($database->conn);
$admin->masuk($username);

if ($admin->password == $password) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    header('location:index.php');
} else {
echo '
    <script type="text/javascript">
        window.alert("Username dan Password Salah !!!");
        window.location=("index.php")
    </script>';
}
?>