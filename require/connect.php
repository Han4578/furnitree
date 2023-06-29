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
                $company = $row['company'];

                echo "  <script>
                                displayItems($container, '$name', '$image', $price, '$company', $template, $id);
                            </script>";
            }
        } else echo "<div style='margin: 0 auto;'>Tiada perabot yang bersetuju dengan kriteria yang diberikan</div>";
    }

    function displayFurniture($container, $stmt) {
        global $conn;
        $query = $conn->query($stmt);
        $no = 1;
        
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $color = $row['color'];
                $company = $row['company'];
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
                $name = $row['name'];
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

    function displayBrands($container, $stmt) {
        global $conn;
        $query = $conn->query($stmt);
        $no = 1;
        
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $image = $row['logo'];

                echo "  <script>
                            displayBrands($container, '$name', '$image', $no, $id);
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

    function displaySelections($container, $stmt, $n, $id, $idname, $checked) {
        global $conn;

        $query = $conn->query($stmt);
        $i = 1;
        $checked = str_replace(' ', '', $checked);
        
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                
                $name = $row[$n];
                $value = $row[$id];

                echo "<script>
                            displaySelections('$name',$container, '$value', $i, '$idname', '$checked');
                        </script>";
                $i++;
            }
        }
    }

    function displayPrice($num, $price) {
        echo "<script>
                $price.innerText = 'RM' + displayPrice($num);
            </script>";
    }

    function checkLogin() {
        return key_exists('isLoggedIn' , $_SESSION);
    }
?>