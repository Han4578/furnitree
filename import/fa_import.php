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

        if (count($row) != 7) {
            $error .= "Format fail tidak betul di baris $numRow \\n";
            $numRow++;
            continue;
        }
        
        $name = $conn->real_escape_string(trim($row[0]));
        $color = trim($row[1]);
        $brand = trim($row[2]);
        $category = trim($row[3]);
        $price = trim($row[4]);
        $imgName = trim($row[5]);
        $description = $conn->real_escape_string($row[6]);

        $img = '';
        $i = 0;
        $imgFound = false;

        if (!is_numeric($price)) {
            $error .= "Harga bukan nombor di baris $numRow \\n";
            $numRow++;
            continue;
        }

        if ($price <= 0) {
            $error .= "Harga mesti lebih daripada 0 di baris $numRow \\n";
            $numRow++;
            continue;
        }
        
        if ($price > 1000000) {
            $error .= "Harga tidak lebih daripada 1,000,000 di baris $numRow \\n";
            $numRow++;
            continue;
        }
        
        foreach ($images['name'] as $n) {
            if (strcmp($n, $imgName) == 0) {
                $img = $n;
                $imgFound = true;
                break;
            }
            $i++;
        }

        if ($imgFound) {
            $colorQuery = $conn->query("SELECT id FROM color WHERE name = '$color'");
            $brandQuery = $conn->query("SELECT id FROM brand WHERE name = '$brand'");
            $categoryQuery = $conn->query("SELECT id FROM category WHERE name = '$category'");

            if($colorQuery->num_rows == 0) {
                $error .= "Warna tidak wujud dalam pangkalan data di baris $numRow \\n";
                $numRow++;
                continue;
            } else $colorID = $colorQuery->fetch_assoc()['id'];

            if($brandQuery->num_rows == 0) {
                $error .= "Jenama tidak wujud dalam pangkalan data di baris $numRow \\n";
                $numRow++;
                continue;
            } else $brandID = $brandQuery->fetch_assoc()['id'];

            if($categoryQuery->num_rows == 0) {
                $error .= "Kategori tidak wujud dalam pangkalan data di baris $numRow \\n";
                $numRow++;
                continue;
            } else $categoryID = $categoryQuery->fetch_assoc()['id'];

            $imgName =  date('YmdHis').$numRow;
            $imgType =  (explode('.', $images['name'][$i]))[1];
        
            $imgTempName =  $images['tmp_name'][$i];
        
            $newName = $imgName.'.'.$imgType;
        
            if (!exif_imagetype($imgTempName)) {
                $error .= "Fail yang dimasukkan bukan gambar di baris $numRow \\n";
                $numRow++;
                continue;
            }
        
            $check = $conn->query("SELECT id FROM furniture_info WHERE name = '$name' AND brand = $brandID");
            
            if ($check->num_rows > 0) {
                $error .= "Produk dengan nama yang sama sudah wujud dalam pengkalan data di baris $numRow \\n";
                $numRow++;
                continue;
            }
            
            $stmt1 = $conn->query("INSERT INTO furniture_info(name, brand, price, category) 
            VALUES ('$name',$brandID,$price,'$categoryID')");
        
            $info = $conn->query("SELECT id FROM furniture_info WHERE name = '$name' AND brand = $brandID")->fetch_assoc();
        
            $id = $info['id'];
        
            $stmt2 = $conn->query("INSERT INTO furniture(color, image, info) 
            VALUES ($colorID, '$newName', $id)");
        
        
            if (!(move_uploaded_file($imgTempName, '../images/' . $newName) and $stmt1 and $stmt2)) 
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
    alert('Semua produk berjaya dimasukkan');
    window.location = '../manage/furniture.php';
    </script>";
?>