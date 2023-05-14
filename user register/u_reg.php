<?php
$name = $_POST['name'];
$password = $_POST['password'];
$pnumber = $_POST['pnumber'];
$aras = 'user';

require "../require/connect.php";

$stmt = $conn->prepare("INSERT INTO pengguna(name, password, aras, nomhp) VALUES (?, ?, ?, ?);");
$stmt->bind_param('sssi', $name, $password, $aras, $pnumber);
$result = $stmt->execute();

if ($result) {
    echo    "<script> 
                    window.location = 'signin.php'
                    alert('Pendaftaran berjaya, sila log masuk')
                </script>";
} else echo "<script> 
                    window.location = 'user_register.php'
                    alert('Pendaftaran gagal, sila cuba sekali')
                </script>";
$conn->close();
$stmt->close();
