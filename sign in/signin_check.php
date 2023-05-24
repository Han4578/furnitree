<?php
require "../require/connect.php";
session_start();

$name = $_POST['name'];
$password = $_POST['password'];
$user = $conn->real_escape_string($name);
$pass = $conn->real_escape_string($password);

$query = $conn->query("SELECT * FROM pengguna WHERE name = '$user' AND password = '$password';");
$row = $query->fetch_assoc();

if ($query->num_rows == 0) {
    echo    "<script>
                    window.location = 'signin.php';
                    alert('Nama atau kata laluan salah'); 
                </script>";
} else {
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['name'];
    $_SESSION['level'] = $row['aras'];
    $_SESSION['isLoggedIn'] = true;
    header("location: ../main_pages/main_page.php");
}
