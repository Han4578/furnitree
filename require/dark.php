<?php
    session_start();

    $_SESSION['darkMode'] = !$_SESSION['darkMode'];
?>

<script>
    history.back()
</script>