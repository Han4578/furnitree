<?php
    require "../require/connect.php";

    $name = $conn->real_escape_string($_POST['name']);
    $password = $_POST['password'];
    $pnumber = $_POST['pnum'];
    $email = $conn->real_escape_string($_POST['email']);
    $aras = 2;
    $img = 'default-icon.webp';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> 
                        window.location = './user_register.php'
                        alert('Format e-mel tidak betul, sila cuba sekali')
                    </script>";
    }

    $query = $conn->query("SELECT * FROM pengguna WHERE email = '$email'");

    if ($query->num_rows > 0) {
        echo "<script> 
                window.location = './user_register.php'
                alert('E-mel sudah digunakan, sila mengguna e-mel yang lain')
            </script>";
    }

    $stmt = $conn->prepare("INSERT INTO pengguna(name, password, aras, nomhp, email, picture) VALUES (?, ?, ?, ?, ?, ?);");
    $stmt->bind_param('sssiss', $name, $password, $aras, $pnumber, $email, $img);
    $result = $stmt->execute();

    if ($result) {
        echo    "<script> 
                        window.location = '../sign in/signin.php'
                        alert('Pendaftaran berjaya, sila log masuk')
                    </script>";
    } else echo "<script> 
                        window.location = './company_register.php'
                        alert('Pendaftaran gagal, sila cuba sekali')
                    </script>";
    $conn->close();
    $stmt->close();
?>
