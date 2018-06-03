<?php
include '../common/connect.php';

session_start();
$name = $_POST['name'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$email = $_POST['email'];
$id = $_POST['ID'];
$namecheck = str_replace(" ", "", $name);
$idcheck = substr($id, 0, 2);
//check passwords input
if (strlen($password) < 8) {
    $_SESSION['message'] = alert_msg('danger', 'Password must be longer than 8 characters');
    header('location: register.php');

} else {
    if ($password !== $re_password) { //fail passwords input check
        $_SESSION['message'] = alert_msg('danger', 'Password and re-Password does not match');
        header('location: register.php');
    } else {
        //name length check
        if (strlen($name) < 6 || strlen($name > 30)) {
            $_SESSION['message'] = alert_msg('danger', 'Invalid Username');
            header('location: register.php');
        } else {
            //check name contains illegal characters
            if (!(ctype_alnum($namecheck))) {
                $_SESSION['message'] = alert_msg('danger', 'Name contains special characters ' . $name);
                header('location: register.php');
            } else {
                //id check
                if ($idcheck > 18 || strlen($id) != 10) {
                    $_SESSION['message'] = alert_msg('danger', 'Invalid ID');
                    header('location: register.php');

                } else {
                    //hash password using bcrypt
                    $hashedP = password_hash($password, PASSWORD_BCRYPT);
                    //store input data to database
                    $name = mysqli_real_escape_string($conn, $name);
                    $email = mysqli_real_escape_string($conn, $email);
                    $insert = mysqli_query($conn, "INSERT INTO users (id, username, password, email) VALUES ('$id', '$name', '$hashedP', '$email')");
                    if ($insert == false) {
                        $_SESSION['message'] = alert_msg('danger', 'Duplicate Record');
                        header('location: register.php');
                    } else {
                        $_SESSION['message'] = alert_msg('success', 'Account Created ');
                        header('location: login.php');
                    }
                }
            }
        }
    }
}
