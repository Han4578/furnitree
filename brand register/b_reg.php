<?php
    #Fail ini adalah wajib
    require "../require/connect.php";
    session_start();
    
    #Terima Fail POST
    $account = $_POST['account'];
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $img = $_FILES['image'];
    $imgTempName = $img['tmp_name'];
    $imgName = date('YmdHis');
    $imgType = (explode('.', $img['name']))[1];

    $newName = $imgName.'.'.$imgType;

    #Mengenal pasti fail yang dimasukkan ialah imej
    if (!exif_imagetype($imgTempName)) alertError('Fail yang dimuat naik bukan imej');
    
    #Mengenal pasti nama jenama tidak sudah digunakan
    $query = $conn->query("SELECT * FROM brand WHERE name = '$name'");
    if ($query->num_rows > 0) alertError("Nama sudah digunakan, sila mengguna nama yang lain");
    
    #Mengenal pasti penjual tidak sudah memiliki jenama sendiri
    $check = $conn->query("SELECT id FROM brand WHERE account = $account");
    if ($check->num_rows > 0) alertError('Penjual ini sudah memiliki jenama sendiri, sila memilih penjual yang lain');
    
    #Daftar penjual di dalam pangkalan data
    $result = $conn->query("INSERT INTO brand(name, logo, description, account) 
    VALUES ('$name', '$newName', '$description', $account);");

    move_uploaded_file($imgTempName, '../images/' . $newName);

    $id = $conn->query("SELECT id FROM brand WHERE name = '$name'")->fetch_assoc()['id'];
    
    $_SESSION['brandID'] = $id;

    echo "<script> 
        if ($result) {
            window.location = '../main_pages/brand.php?id=$id'
            alert('Pendaftaran berjaya')
        } else {
            alert('Pendaftaran gagal, sila cuba sekali')
            history.back()
        }
        </script>";#Papar mesej bergantung kepada kejayaan pendaftaran
?>