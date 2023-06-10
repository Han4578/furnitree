<?php
    $name = $_POST['name'];
    $password = $_POST['password'];
    $pnumber = $_POST['pnumber'];
    $email = $_POST['email'];
    $aras = 'user';
    $img = 'default-icon.webp';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> 
                        window.location = './user_register.php'
                        alert('Format e-mel tidak betul, sila cuba sekali')
                    </script>";
    }

    require "../require/connect.php";

    $query = $conn->query("SELECT * FROM pengguna WHERE email = $email");

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
                        window.location = './user_register.php'
                        alert('Pendaftaran gagal, sila cuba sekali')
                    </script>";
    $conn->close();
    $stmt->close();
?>