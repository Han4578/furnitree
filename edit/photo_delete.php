<?php
    session_start();

    $name = $_GET['name'];

    $path = realpath("../images/$name");

    unlink($path);

    echo "<script>".$_SESSION['script']."</script>"
?>