<?php
    session_start();
    $_SESSION["user_id"];
    $_SESSION["user_username"];

    unset($_SESSION["user_id"]);
    unset($_SESSION["user_username"]);

    session_unset();
    session_destroy();

    header("location:index.php?logout");
?>