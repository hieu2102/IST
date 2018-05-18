<?php
include './common/connect.php';
session_start();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$email = $_POST['email'];
$id = $_POST['ID'];

if ($password !== $re_password) {
    $_SESSION['message'] = alert_msg('danger', 'Password and re-Password does not match');
    header('location: register.php');
}

$check = mysqli_query($conn, "SELECT * FROM users WHERE
            email = '$email' or
            id = '$id'
            ");
if (mysqli_num_rows($check) > 0) {
    $_SESSION['message'] = alert_msg('danger', 'Email or ID already registered');
    header('location: register.php');
}
//hash password using bcrypt
$hashedP = password_hash($password, PASSWORD_BCRYPT);

//store input data to database
mysqli_query($conn, "INSERT INTO users
            (id, first_name, last_name, password, email)
            VALUES ('$id', '$fname', '$lname', '$hashedP', '$email')");

$_SESSION['message'] = alert_msg('success', 'Account Created');
header('location: login.php');
