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
    $imageType = (explode('.', $image['name']))[1];
    $imageName = date('YmdHis');
    $newName = $imageName.'.'.$imageType;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> 
                        window.location = './profile.php'
                        alert('Format e-mel tidak betul, sila cuba sekali')
                    </script>";
    }
    
    
    if ($imgTempName !== "") {
        $delete = $conn->query("SELECT picture FROM pengguna WHERE id = $id")->fetch_assoc()['picture'];
        $path = realpath("../images/$delete");
        unlink($path);

        $query = "UPDATE pengguna SET name = '$name', password = '$password', nomhp = $pnumber, aras = $aras, email = '$email', picture = '$newName' WHERE id = $id";
        if (!exif_imagetype($imgTempName)) die("Fail yang dimuat naik bukan imej");
    } else $query = "UPDATE pengguna SET name = '$name', password = '$password', nomhp = $pnumber, aras = $aras, email = '$email' WHERE id = $id";


    $stmt = $conn->query($query);
    
    if ($stmt) {
        if ($imgTempName !== "") {
            move_uploaded_file($imgTempName, '../images/' . $newName);
            $_SESSION['pfp'] = $newName;
        }

        echo "<script>
        alert('Profil berjaya dikemas kini');
        window.location = '../main_pages/profile.php?id=$id'
        </script>";

        if ($imageName == '') $imageName = $_SESSION['pfp'];

        if ($_SESSION['id'] == $id) {   
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            $_SESSION['pnumber'] = $pnumber;
            $_SESSION['level'] = $aras;
        }
    }

?>