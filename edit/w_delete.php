<?php
    require "../require/connect.php";

    $id = $_GET['id'];

    $conn->query("DELETE FROM furniture WHERE id = $id");

?>

<script>
    history.back()
</script>