<?php
include './common/connect.php';
function has_specchar($x,$excludes=array()){
    if (is_array($excludes)&&!empty($excludes)) {
        foreach ($excludes as $exclude) {
            $x=str_replace($exclude,'',$x);        
        }    
    }    
    if (preg_match('/[^a-z0-9 ]+/i',$x)) {
        return true;        
    }
    return false;
}

session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$id = $_POST['ID'];


if ($password !== $re_password){
    $_SESSION['message'] = alert_msg('danger',"Password and re-Password does not match");
    header('location:register.php');
}
if (has_specchar($lname)){
    $_SESSION['message'] = alert_msg('danger',"Name contains special character(s)");
    header('location:register.php');    
}
$checkEmail = mysqli_query($conn, "SELECT email FROM users WHERE email LIKE '$email'");
if (mysqli_num_rows($checkEmail) >0){
    $_SESSION['message'] = alert_msg('danger',"Email already Registered");
    header('location:register.php');
}
$create = "INSERT INTO users (first_name, last_name, password, email, id)
            VALUES ('$fname', '$lname', '$password', '$email', '$id')";
if ($conn->query($create) === TRUE) {
    $_SESSION['message'] = alert_msg('success', 'Account Successfully Created');
    header('location: login.php');
}
mysqli_close($conn);
?>