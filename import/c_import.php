<?php
    require "../require/connect.php";
    session_start();

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

        if (count($row) != 3) {
            $error .= "Format fail tidak betul di baris $numRow \\n";
            $numRow++;
            continue;
        }
        
        $name = trim($row[0]);
        $color = trim($row[1]);
        $imgName = trim($row[2]);
        $brandID = $_SESSION['brandID'];
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
            $produkQuery = $conn->query("SELECT id FROM furniture_info WHERE name = '$name' AND brand = $brandID");
            
            if($produkQuery->num_rows == 0) {
                $error .= "Produk $name tidak wujud dalam pangkalan data di baris $numRow \\n";
                $numRow++;
                continue;
            } else $info = $produkQuery->fetch_assoc()['id'];
            
            $colorQuery = $conn->query("SELECT id FROM color WHERE name = '$color'");
            
            if($colorQuery->num_rows == 0) {
                $error .= "Warna tidak wujud dalam pangkalan data di baris $numRow \\n";
                $numRow++;
                continue;
            } else $colorID = $colorQuery->fetch_assoc()['id'];

            $colorExistsQuery = $conn->query("SELECT id FROM furniture WHERE color = $color AND info = $id");

            if ($colorExistsQuery->num_rows > 0) {
                $error .= "Warna ini sudah wujud untuk produk ini di baris $numRow \\n";
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

            $stmt1 = $conn->query("INSERT INTO furniture(color, image, info) 
            VALUES ($colorID, '$newName', $info)");
        
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
    alert('Semua warna berjaya dimasukkan');
    window.location = '../manage/furniture.php';
    </script>";
?>