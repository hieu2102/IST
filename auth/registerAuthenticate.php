<?php
include '../common/connect.php';

session_start();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$email = $_POST['email'];
$id = $_POST['ID'];

//check passwords input
if ($password !== $re_password) { //fail passwords input check
    $_SESSION['message'] = alert_msg('danger', 'Password and re-Password does not match');
    header('location: register.php');
} else {
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
        $nameOK = true;

        //split name into strings with " " (space) as limitter
        $name = explode(" ", strtolower($fname . $lname));
        foreach ($name as $string) {

            //check if substring is not alphabetic
            if (!ctype_alpha($string)) {
                $nameOK = false;
                break;
            }

        }if (!$nameOK) { //fail name check
            $_SESSION['message'] = alert_msg('danger', 'Name contains special characters');
            header('location: register.php');
        } else { //passed all check, proceed to account creation
            //hash password using bcrypt
            $hashedP = password_hash($password, PASSWORD_BCRYPT);

            //store input data to database
            mysqli_query($conn, "INSERT INTO users
            (id, first_name, last_name, password, email)
            VALUES ('$id', '$fname', '$lname', '$hashedP', '$email')");

            $_SESSION['message'] = alert_msg('success', 'Account Created');
            header('location: login.php');
        }
    }
}
