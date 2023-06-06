<?php
    $name = $_POST['name'];
    $password = $_POST['password'];
    $pnumber = $_POST['pnumber'];
    $email = $_POST['email'];
    $aras = 'user';
    $picture = 'placeholder.jpg';
    $img = 'default-icon.webp';

    require "../require/connect.php";

    $stmt = $conn->prepare("INSERT INTO pengguna(name, password, aras, nomhp, email, picture) VALUES (?, ?, ?, ?, ?, ?);");
    $stmt->bind_param('sssiss', $name, $password, $aras, $pnumber, $email, $img);
    $result = $stmt->execute();

    if ($result) {
        echo    "<script> 
                        window.location = '../sign in/signin.php'
                        alert('Pendaftaran berjaya, sila log masuk')
                    </script>";
    } else echo "<script> 
                        window.location = './user_register.php'
                        alert('Pendaftaran gagal, sila cuba sekali')
                    </script>";
    $conn->close();
    $stmt->close();
?>