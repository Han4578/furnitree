<?php
    require "../require/connect.php";
    session_start();

    $brandID = $_GET['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $official = $conn->real_escape_string($_POST['official']);
    $description = $conn->real_escape_string($_POST['description']);
    $fb = $conn->real_escape_string($_POST['fb']);
    $insta = $conn->real_escape_string($_POST['insta']);
    $twitter = $conn->real_escape_string($_POST['twitter']);
    $yt = $conn->real_escape_string($_POST['yt']);
    $image = $_FILES['image']['name'];
    $imgTempName = $_FILES['image']['tmp_name'];
    $count = 0;
    
    
    if ($imgTempName !== "") {
        $query = "UPDATE company SET name='$name', logo='$image', description='$description', fb='$fb', twitter='$twitter', instagram='$insta',yt='$yt',official='$official' WHERE id = $brandID";
        move_uploaded_file($imgTempName, '../images/' . $image);
    } else $query = "UPDATE company SET name='$name', description='$description', fb='$fb', twitter='$twitter', instagram='$insta',yt='$yt',official='$official' WHERE id = $brandID";

    $stmt = $conn->query($query);
        
    echo "<script>
        if ($stmt) {
            alert('Jenama berjaya dikemas kini.');
            history.go(-2);
        } else {
            alert('Jenama tidak berjaya dikemas kini, ".$conn->errno."');
            window.location = '../main_pages/brand.php?id=".$brandID."';
        }
    </script>";

?>