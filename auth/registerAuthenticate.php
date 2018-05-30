<?php
include '../common/connect.php';

session_start();
$name = $_POST['name'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$email = $_POST['email'];
$id = $_POST['ID'];

//check passwords input
if ($password !== $re_password) { //fail passwords input check
    $_SESSION['message'] = alert_msg('danger', 'Password and re-Password does not match');
    header('location: register.php');
} else {
    if (strlen($name)<6 ||strlen($name>30)){
        $_SESSION['message'] = alert_msg('danger', 'Username must be 6-30 characters long');
    }
    //check for existing email or id
    $check = mysqli_query($conn, "SELECT * FROM users WHERE
            email = '$email' or
            id = '$id'
            ");
    $rows = mysqli_num_rows($check);
    if ($rows >= 1) { //fail email or id check
        $_SESSION['message'] = alert_msg('danger', 'Email or ID already registered');
        header('location: register.php');
    } else {
        //check name contains illegal characters
        //fail name check
        if (!(ctype_alnum($name))) {
            $_SESSION['message'] = alert_msg('danger', 'Name contains special characters \n' . $name);
            header('location: register.php');
        }
        //passed all check, proceed to account creation
        else {
            //hash password using bcrypt
            $hashedP = password_hash($password, PASSWORD_BCRYPT);

            //store input data to database
            mysqli_query($conn, "INSERT INTO users
            (id, username, password, email)
            VALUES ('$id', '$name', '$hashedP', '$email')");

            $_SESSION['message'] = alert_msg('success', 'Account Created ');
            header('location: login.php');
        }
    }
}
