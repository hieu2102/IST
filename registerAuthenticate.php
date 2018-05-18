<?php
include './common/connect.php';
function has_numbers( $string ) {
    return preg_match( '/\d/', $string );
}
// Does string contain special characters?
function has_special_chars( $string ) {
    return preg_match('/[^a-zA-Z\d]/', $string);
}
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

if ($password !== $re_password){
    $_SESSION['message'] = 
    "<div class = 'alert alert-danger' role = 'alert'>
        <p style = 'text-align:center'>
            Password and re-Password does not match
        </p>
    </div>";
    header('location:register.php');
}
if (has_numbers($fname) || has_special_chars($fname)){
    header('location: register.php');
}
$checkEmail = mysqli_query($conn, "SELECT email FROM users WHERE email LIKE '$email'");
if (mysqli_num_rows($checkEmail) >0){
    $_SESSION['message'] = 
    "<div class = 'alert alert-danger' role = 'alert'>
        <p style = 'text-align:center'>
            Email already Registered!
        </p>
    </div>";
    header('location:register.php');
}
$create = "INSERT INTO users (first_name, last_name, password, email)
            VALUES ('$fname', '$lname', '$password', '$email')";
if ($conn->query($create) === TRUE) {
    $_SESSION['message'] = 
    "<div class = 'alert alert-success' role = 'alert'>
        <p style = 'text-align:center'>
            Account Successfully Created
        </p>
    </div>";
    header('location: login.php');
}
mysqli_close($conn);
?>