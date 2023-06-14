<?php
    require "../require/connect.php";
    session_start();

    $id = $_GET['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $color = $conn->real_escape_string($_POST['color']);
    $company = $conn->real_escape_string($_POST['company']);
    $price = $_POST['price'];
    $image = $_FILES['image'];
    
    $imgTempName = $image['tmp_name'];
    $imageName = $image['name'];
    
    $query = "UPDATE pengguna SET name = '$name', password = '$password', nomhp = $pnumber, email = '$email', picture = '$imageName' WHERE id = $id";

    if ($imgTempName !== "") {
        if (!exif_imagetype($imgTempName)) die("Fail yang dimuat naik bukan imej");
    } else $query = "UPDATE pengguna SET name = '$name', password = '$password', nomhp = $pnumber, email = '$email' WHERE id = $id";


    $stmt = $conn->query($query);

    if ($stmt) {
        if ($imgTempName !== "") move_uploaded_file($imgTempName, '../images/' . $imageName);

        echo "<script>
        alert('Profil berjaya dikemas kini');
        window.location = '../main_pages/profile.php?id=".$id."';
        </script>";

        if ($_SESSION['id'] == $id) {   
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            $_SESSION['pnumber'] = $pnumber;
            $_SESSION['pfp'] = $imageName;
        }
    }

?>