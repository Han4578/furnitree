<?php
    require "./connect.php";
    session_start();

    $userID = $_SESSION['id'];
    $furnitureID = $_GET['id'];
    $num = $_GET['num'];

    $query = $conn->query("INSERT INTO pilihan(pengguna, produk, bilangan) VALUES ($userID, $furnitureID, $num);");

    if (!$query) alertError("Penambahan pilihan gagal, ".$conn->errno);
?>

<script>
    history.back()
</script>