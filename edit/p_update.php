<?php
    require "../require/connect.php";
    session_start();

    $id = $_GET['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $password = $conn->real_escape_string($_POST['password']);
    $email = $conn->real_escape_string($_POST['email']);
    $pnumber = $_POST['pnumber'];
    $image = $_FILES['image'];
    $aras = $_POST['aras'] ?? $_SESSION['level'];
    
    $imgTempName = $image['tmp_name'];
    
    if ($image['error'] !== 4) {
        $imageType = (explode('.', $image['name']))[1];
        $imageName = date('YmdHis');
        $newName = $imageName.'.'.$imageType;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) alertError('Format e-mel tidak betul, sila cuba sekali');

    $EmailQuery = $conn->query("SELECT * FROM pengguna WHERE email = '$email' AND id != $id");
    if ($EmailQuery->num_rows > 0) alertError('E-mel sudah digunakan, sila mengguna e-mel yang lain');
    
    $NameQuery = $conn->query("SELECT * FROM pengguna WHERE name = '$name' AND id != $id");    
    if ($NameQuery->num_rows > 0) alertError('Nama sudah digunakan, sila mengguna nama yang lain');
    
    $pNumQuery = $conn->query("SELECT * FROM pengguna WHERE nomhp = '$pnumber' AND id != $id");    
    if ($pNumQuery->num_rows > 0) alertError('Nombor telefon sudah digunakan, sila mengguna nombor lain yang lain');
    
    
    
    if ($imgTempName !== "") {
        if (!exif_imagetype($imgTempName)) alertError("Fail yang dimuat naik bukan imej");
        $delete = $conn->query("SELECT picture FROM pengguna WHERE id = $id")->fetch_assoc()['picture'];
        $path = realpath("../images/$delete");
        unlink($path);

        $query = "UPDATE pengguna SET name = '$name', password = '$password', nomhp = $pnumber, aras = $aras, email = '$email', picture = '$newName' WHERE id = $id";
    } else $query = "UPDATE pengguna SET name = '$name', password = '$password', nomhp = $pnumber, aras = $aras, email = '$email' WHERE id = $id";


    $stmt = $conn->query($query);
    
    if ($stmt) {
        if ($imgTempName !== "") {
            move_uploaded_file($imgTempName, '../images/' . $newName);
        }
        
        echo "<script>
        alert('Profil berjaya dikemas kini');
        history.go(-2)
        </script>";
        
        if ($_SESSION['id'] == $id) {   
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['level'] = $aras;

            if ($imgTempName !== "") {
                $_SESSION['pfp'] = $newName;
            }
        }
    }

?>