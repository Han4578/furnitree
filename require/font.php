<?php 
    session_start();

    $font = $_POST['font'];

    $_SESSION['font'] = $font;
?>

<script>
    history.back()
</script>