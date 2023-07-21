<?php
    require "./connect.php";
    session_start();

    $userID = $_GET['user'] ?? $_SESSION['id'];
    $furnitureID = $_GET['produk'];

    $query = $conn->query("DELETE FROM pilihan WHERE pengguna = $userID and produk = $furnitureID;");

    if (!$query) alertError("Penghapusan pilihan gagal, ".$conn->errno);
?>

<script>
    history.back()
</script>