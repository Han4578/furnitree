<?php
    require "../require/connect.php";

    $fileName = $_FILES['import']["tmp_name"];
    $images = $_FILES['images'];
    $numRow = 1;
    $error = '';

    $file = fopen($fileName, 'r');
    
    while ($row = fgetcsv($file)) {
        if ($numRow == 1)  {
            $numRow++;
            continue;
        }

        if (count($row) != 6) {
            $error .= "Format fail tidak betul di baris $numRow \\n";
            $numRow++;
            continue;
        }
        
        $name = $conn->real_escape_string(trim($row[0]));
        $password = $conn->real_escape_string(trim($row[1]));
        $aras = trim($row[2]);
        $nomhp = trim($row[3]);
        $email = $conn->real_escape_string(trim($row[4]));
        $imgName = trim($row[5]);
        $img = '';
        $i = 0;
        $imgFound = false;
        
        foreach ($images['name'] as $n) {
            if (strcmp($n, $imgName) == 0) {
                $img = $n;
                $imgFound = true;
                break;
            }
            $i++;
        }

        if ($imgFound) {
            $checkName = $conn->query("SELECT id FROM pengguna WHERE name = '$name'");
            
            if ($checkName->num_rows > 0) {
                $error .= "Pengguna dengan nama yang sama sudah wujud dalam pengkalan data di baris $numRow \\n";
                $numRow++;
                continue;
            }

            $checkName = $conn->query("SELECT id FROM pengguna WHERE email = '$email'");
            
            if ($checkName->num_rows > 0) {
                $error .= "Pengguna dengan email yang sama sudah wujud dalam pengkalan data di baris $numRow \\n";
                $numRow++;
                continue;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error .= "Format e-mel tidak betul di baris $numRow \\n";
                $numRow++;
                continue;
            }

            $imgName =  date('YmdHis').$numRow;
            $imgType =  (explode('.', $images['name'][$i]))[1];
        
            $imgTempName =  $images['tmp_name'][$i];
        
            $newName = $imgName.'.'.$imgType;
        
            if (!exif_imagetype($imgTempName)) {
                $error .= "Fail yang dimasukkan bukan gambar di baris $numRow \\n";
                $numRow++;
                continue;
            }
            
            $stmt1 = $conn->query("INSERT INTO pengguna(name, password, aras, nomhp, email, picture)
            VALUES ('$name', '$password', $aras, '$nomhp', '$email', '$newName')");
        
            if (!(move_uploaded_file($imgTempName, '../images/' . $newName) and $stmt1)) 
            $error .= "Produk tidak berjaya dimasukkan di baris $numRow \\n";
        } else $error .= "Gambar $imgName tidak dapat ditemui di baris $numRow \\n";

        $numRow++;
    }

    if ($error != '') {
        echo "<script>
            alert(\"$error\")
            history.back()
        </script>";
    } else echo "<script>
    alert('Semua pengguna berjaya dimasukkan');
    window.location = '../manage/user.php';
    </script>";
?>