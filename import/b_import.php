<?php
    require "../require/connect.php";

    $fileName = $_FILES['import']["tmp_name"];
    $images = $_FILES['images'];
    $numRow = 1;
    $error = '';

    $csv_mimetypes = array(
        'text/csv',
        'text/plain',
        'application/csv',
        'text/comma-separated-values',
        'application/excel',
        'application/vnd.ms-excel',
        'application/vnd.msexcel',
        'text/anytext',
        'application/octet-stream',
        'application/txt',
    );
    
    if (!in_array($_FILES['import']['type'], $csv_mimetypes)) alertError("Fail yang dimasukkan bukan fail csv");

    $file = fopen($fileName, 'r');
    
    while ($row = fgetcsv($file)) {
        if ($numRow == 1)  {
            $numRow++;
            continue;
        }

        if (count($row) != 4) {
            $error .= "Format fail tidak betul di baris $numRow \\n";
            $numRow++;
            continue;
        }
        
        $name = $conn->real_escape_string(trim($row[0]));
        $imgName = trim($row[1]);
        $description = $conn->real_escape_string(trim($row[2]));
        $account = trim($row[3]);
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
            $userQuery = $conn->query("SELECT id FROM pengguna WHERE name = '$account' AND aras = 2");

            if($userQuery->num_rows == 0) {
                $error .= "Penjual $account tidak wujud dalam pangkalan data di baris $numRow \\n";
                $numRow++;
                continue;
            } else $userID = $userQuery->fetch_assoc()['id'];

            $accountCheck = $conn->query("SELECT id FROM brand WHERE account = $userID");

            if ($accountCheck->num_rows > 0) {
                $error .= "Penjual $account sudah memiliki jenama sendiri di baris $numRow";
                $numRow++;
                continue;
            }

            $nameCheck = $conn->query("SELECT * FROM brand WHERE name = '$name'");

            if ($nameCheck->num_rows > 0) {
                $error .= "Nama $name sudah digunakan di baris $numRow";
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
            
            $stmt1 = $conn->query("INSERT INTO brand(name, logo, description, account)
            VALUES ('$name', '$newName', '$description', $userID)");
        
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
    alert('Semua jenama berjaya dimasukkan');
    window.location = '../manage/brand.php';
    </script>";
?>