<?php
    require "./require/connect.php";

    $delete = $conn->query("SELECT picture FROM pengguna WHERE name = 'admin'")->fetch_assoc()['picture'];

    $path = realpath("images/$delete");

    unlink($path);
?>