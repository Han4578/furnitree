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
                $name = $row['name'];
                $image = $row['image'];
                $price = $row['price'];
                $company = $row['company_name'];

                echo "  <script>
                                displayItems($container, '$name', '$image', $price, '$company', $template, $id);
                            </script>";
            }
        }
     }

     function displayRows($container, $stmt) {
        global $conn;
        $query = $conn->query($stmt);
        $no = 1;
        
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $password = $row['password'];
                $nomhp = $row['nomhp'];
                $aras = $row['aras'];
                $email = $row['email'];
                $image = $row['picture'];

                echo "  <script>
                            displayRows($container, '$name', '$password', $nomhp, $aras, '$email', '$image', $no, $id);
                        </script>";

                $no++;
            }
        }
     }
?>