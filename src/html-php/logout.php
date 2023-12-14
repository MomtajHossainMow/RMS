<?php
session_start();
unset($_SESSION['UserName']);
unset($_SESSION['password']);
header("location:login.php");
?>