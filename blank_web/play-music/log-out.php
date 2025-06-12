<?php
    include ("config/connect.php");
    session_unset();
    session_destroy();
    setcookie('role', '', time() - 3600, "/");
    header("Location: index.php");
    exit;
?>