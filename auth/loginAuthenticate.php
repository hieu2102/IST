<?php
include '../common/connect.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

//query to db
$query = mysqli_query($conn, "SELECT email, password, id, level FROM users WHERE email = '$email'");
$rows = mysqli_num_rows($query);
//check if email exist in db
if ($rows == 0) {
    $_SESSION['message'] = alert_msg('danger', 'Invalid Email');
    header('location: login.php');
} else {
//get result of $query as an object
    $object = mysqli_fetch_object($query);
//get hashed password
    $hashedP = $object->password;
//verify if input password == hashed password
    if (password_verify($password, $hashedP)) {
        $_SESSION['login_user'] = $email;
        $_SESSION['id'] = $object->id;
        $_SESSION['level'] = $object->level;
        $_SESSION['message'] = alert_msg('success', 'Logged In');
        header('location: ../index.php?page=forum');
    } else {

        $_SESSION['message'] = alert_msg('danger', 'Wrong Password');
        header('location: login.php');
    }
}
mysqli_close($conn);
