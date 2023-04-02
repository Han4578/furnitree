<?php
    $conn = new mysqli('localhost', 'root', '', 'kedai perabot atas talian');

    if($conn->connect_error) {
        die('Connection error'.$conn->connect_error);
     } 

     return $conn
?>