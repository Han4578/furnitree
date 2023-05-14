<?php
require "../require/connect.php";

$query = $conn->query('SELECT * FROM company');

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $src = '../images/' . $row['logo'];
        $name = $row['name'];

        echo "<div>$name</div>
            <img src='$src' />
            <br />
            <br />";
    }
}
