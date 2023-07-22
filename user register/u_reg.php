<?php
    #Fail ini adalah wajib
    require "../require/connect.php";

    #Terima Fail POST
    $name = $conn->real_escape_string($_POST['name']);
    $password = $conn->real_escape_string($_POST['password']);
    $email = $conn->real_escape_string($_POST['email']);
    $pnumber = $_POST['pnumber'];
    $aras = $_GET['aras'];
    $img = date('YmdHis').'.jpg';

    #Mengenal pasti format e-mel sebelum daftar
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) alertError('Format e-mel tidak betul, sila cuba sekali');

    #Mengenal pasti E-mel tidak sudah digunakan
    $EmailQuery = $conn->query("SELECT * FROM pengguna WHERE email = '$email'");
    if ($EmailQuery->num_rows > 0) alertError('E-mel sudah digunakan, sila mengguna e-mel yang lain');
    
    #Mengenal pasti nama tidak sudah digunakan
    $NameQuery = $conn->query("SELECT * FROM pengguna WHERE name = '$name'");    
    if ($NameQuery->num_rows > 0) alertError('Nama sudah digunakan, sila mengguna nama yang lain');

        
    $pNumQuery = $conn->query("SELECT * FROM pengguna WHERE nomhp = '$pnumber'");    
    if ($pNumQuery->num_rows > 0) alertError('Nombor telefon sudah digunakan, sila menggunakan nombor lain yang lain');

    #Mencipta gambar profil
    copy("../images/default-icon.jpg", "../images/".$img);

    #Daftar pengguna dalam pangkalan data
    $result = $conn->query("INSERT INTO pengguna(name, password, aras, nomhp, email, picture) VALUES ('$name', '$password', $aras, '$pnumber', '$email', '$img');");

    if ($result) {
        echo    "<script> 
                        window.location = '../sign in/signin.php'
                        alert('Pendaftaran berjaya, sila log masuk')
                    </script>"; #Papar mesej jika berjaya
    } else alertError('Pendaftaran gagal, sila cuba sekali'); #Papar mesej jika gagal
?>