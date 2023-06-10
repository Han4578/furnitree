<?php
    $conn = new mysqli('localhost', 'root', '', 'furnitree');

    if($conn->connect_error) {
        die('Connection error'.$conn->connect_error);
     } 

     function displayItems($container, $template, $stmt) {
        global $conn;
        $query = $conn->query($stmt);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['furniture_name'];
                $image = $row['image'];
                $price = $row['price'];
                $company = $row['company_name'];

                echo "  <script>
                                displayItems($container, '$name', '$image', $price, '$company', $template, $id);
                            </script>";
            }
        }
     }

     function displayFurniture($container, $stmt) {
        global $conn;
        $query = $conn->query($stmt);
        $no = 1;
        
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['furniture_name'];
                $color = $row['name'];
                $company = $row['pengguna_name'];
                $price = $row['price'];
                $image = $row['image'];

                echo "  <script>
                            displayFurniture($container, '$name', '$color', '$company', $price, '$image', $no, $id);
                        </script>";

                $no++;
            }
        }
     }

     function displayUsers($container, $stmt) {
        global $conn;
        $query = $conn->query($stmt);
        $no = 1;
        
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['pengguna_name'];
                $password = $row['password'];
                $nomhp = $row['nomhp'];
                $aras = $row['aras'];
                $email = $row['email'];
                $image = $row['picture'];

                echo "  <script>
                            displayUsers($container, '$name', '$password', $nomhp, $aras, '$email', '$image', $no, $id);
                        </script>";

                $no++;
            }
        }
     }

    function displayOptions($stmt, $container, $selected = '') {
        global $conn;

        $query = $conn->query($stmt);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $name = $row['name'];
                $value = $row['id'];
                echo "<script>
                            displayOptions('$name',$container, '$value', $selected);
                        </script>";
            }
        }
     }
?>