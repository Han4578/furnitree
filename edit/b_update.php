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

    if ($_FILES['image']['error'] !== 4) {
        $image = date('YmdHis');
        $imgType = explode('.', $_FILES['image']['name'])[1];
        $newName = $image.'.'.$imgType;
    
        $imgTempName = $_FILES['image']['tmp_name'];
    }
    
    
    if ($_FILES['image']['error'] !== 4) {
        $delete = $conn->query("SELECT logo FROM brand WHERE id = $brandID")->fetch_assoc()['logo'];
        $path = realpath("../images/$delete");
        unlink($path);

        $query = "UPDATE brand SET name='$name', logo='$newName', description='$description', fb='$fb', twitter='$twitter', instagram='$insta',yt='$yt',official='$official' WHERE id = $brandID";
        move_uploaded_file($imgTempName, '../images/' . $newName);
    } else $query = "UPDATE brand SET name='$name', description='$description', fb='$fb', twitter='$twitter', instagram='$insta',yt='$yt',official='$official' WHERE id = $brandID";

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