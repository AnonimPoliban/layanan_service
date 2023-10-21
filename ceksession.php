<?php
session_start();
    if (empty($_SESSION['user']) OR empty($_SESSION['pass'])) {
        header("Location:index.php");
        exit;
    }
?>