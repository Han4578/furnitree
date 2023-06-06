<?php
    require "../require/connect.php";
    session_start();

    $id = $_SESSION['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $password = $conn->real_escape_string($_POST['password']);
    $email = $conn->real_escape_string($_POST['email']);
    $pnumber = $_POST['pnumber'];
    $image = $_FILES['image'];
    
    $imgTempName = $image['tmp_name'];
    $imageName = $image['name'];

    if ($imgTempName !== "") {
        if (!exif_imagetype($imgTempName)) die("Fail yang dimuat naik bukan imej");
    } else $imageName = $_SESSION['pfp'];


    $stmt = $conn->query("UPDATE pengguna SET name = '$name', password = '$password', nomhp = $pnumber, email = '$email', picture = '$imageName' WHERE id = $id");

    if ($stmt) {
        if ($imgTempName !== "") move_uploaded_file($imgTempName, '../images/' . $imageName);

        echo "<script>
        alert('Profil berjaya dikemas kini');
        window.location = '../main_pages/profile.php';
        </script>";

        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['pnumber'] = $pnumber;
        $_SESSION['pfp'] = $imageName;
    }

?>