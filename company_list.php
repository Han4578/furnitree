<?php
$conn = require('connect.php');

$query = $conn->query('SELECT logo FROM company');

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {

        $src = 'images/'.$row['logo'];

        echo "<img src='".$src."' >";
    }
}
?>