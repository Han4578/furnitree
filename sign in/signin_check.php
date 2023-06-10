<?php
require "../require/connect.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$user = $conn->real_escape_string($email);
$pass = $conn->real_escape_string($password);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script> 
                    window.location = './signin.php'
                    alert('Format e-mel tidak betul, sila cuba sekali')
                </script>";
}

$query = $conn->query("SELECT * FROM pengguna WHERE email = '$user' AND password = '$password';");
$row = $query->fetch_assoc();

if ($query->num_rows == 0) {
    echo    "<script>
                    window.location = 'signin.php';
                    alert('Nama atau kata laluan salah'); 
                </script>";
} else {
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['pengguna_name'];
    $_SESSION['password'] = $password;
    $_SESSION['email'] = $user;
    $_SESSION['pnumber'] = $row['nomhp'];
    $_SESSION['level'] = $row['aras'];
    $_SESSION['pfp'] = $row['picture'];
    $_SESSION['isLoggedIn'] = true;
    header("location: ../main_pages/main_page.php");
}
