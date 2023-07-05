<?php

    require "../require/connect.php";
    
    $id = $_POST['id'];
    $account = $_POST['account'];
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $img = $_FILES['image'];
    $imgTempName = $img['tmp_name'];
    $imgName = date('YmdHis');
    $imgType = (explode('.', $image['name']))[1]
;

    $newName = $imgName.'.'.$imgType;

    if (!exif_imagetype($imgTempName)) {
        echo "<script> 
                alert('Fail yang dimuat naik bukan imej')
                history.back()
             </script>";
        die;
    }


    $query = $conn->query("SELECT * FROM brand WHERE name = '$name'");

    if ($query->num_rows > 0) {
        echo "<script> 
                alert('Nama sudah digunakan, sila mengguna nama yang lain')
                history.back()
            </script>";
        die;
    }

    $stmt = $conn->prepare("INSERT INTO company(name, logo, description, account) VALUES (?, ?, ?, ?);");
    $stmt->bind_param('sssi', $name, $newName, $description, $account);
    $result = $stmt->execute();

    move_uploaded_file($imgTempName, '../images/' . $newName);

    $id = $conn->query("SELECT id FROM brand WHERE name = '$name'")->fetch_assoc()['id'];
    
    $_SESSION['brand'] = $id;

    echo "<script> 
        if ($result) {
            window.location = '../main_pages/brand.php?id=$id'
            alert('Pendaftaran berjaya')
        } else
            alert('Pendaftaran gagal, sila cuba sekali')
            history.back()
        </script>";
    $conn->close();
    $stmt->close();
?>