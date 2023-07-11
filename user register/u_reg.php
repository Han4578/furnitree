<?php
    require "../require/connect.php";

    $name = $conn->real_escape_string($_POST['name']);
    $password = $conn->real_escape_string($_POST['password']);
    $email = $conn->real_escape_string($_POST['email']);
    $pnumber = $_POST['pnumber'];
    $aras = $_GET['aras'];
    $img = date('YmdHis').'.jpg';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) alertError('Format e-mel tidak betul, sila cuba sekali');

    $EmailQuery = $conn->query("SELECT * FROM pengguna WHERE email = '$email'");

    if ($EmailQuery->num_rows > 0) alertError('E-mel sudah digunakan, sila mengguna e-mel yang lain');

    $NameQuery = $conn->query("SELECT * FROM pengguna WHERE name = '$name'");

    if ($NameQuery->num_rows > 0) alertError('Nama sudah digunakan, sila mengguna nama yang lain');

    copy("../images/default-icon.jpg", "../images/".$img);

    $stmt = $conn->prepare("INSERT INTO pengguna(name, password, aras, nomhp, email, picture) VALUES (?, ?, ?, ?, ?, ?);");
    $stmt->bind_param('sssiss', $name, $password, $aras, $pnumber, $email, $img);
    $result = $stmt->execute();

    if ($result) {
        echo    "<script> 
                        window.location = '../sign in/signin.php'
                        alert('Pendaftaran berjaya, sila log masuk')
                    </script>";
    } else alertError('Pendaftaran gagal, sila cuba sekali');

    $conn->close();
    $stmt->close();
?>