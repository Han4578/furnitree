<?php
    require "./connect.php";
    session_start();

    $userID = $_SESSION['id'];
    $furnitureID = $_GET['id'];

    $query = $conn->query("DELETE FROM pilihan WHERE pengguna = $userID and produk = $furnitureID;");

    if (!$query) die("Penghapusan pilihan gagal, ".$conn->errno);
?>

<script>
    history.back()
</script>