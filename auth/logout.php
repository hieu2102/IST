<?php
include "../common/connect.php";
session_start();
unset($_SESSION['login_user']);
unset($_SESSION['level']);
header('location: login.php');
session_destroy();
?>