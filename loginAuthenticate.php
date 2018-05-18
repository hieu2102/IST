<?php
session_start();
$error = '';
if (isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = mysqli_connect('localhost', 'root', '', 'forum');
    // $username = mysqli_real_escape_string($username);
    // $password = mysqli_real_escape_string($password);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE password ='$password' AND email = '$email'");
    $rows = mysqli_num_rows($query);
    if (!$query || $rows == 0)
    {
        $error = "Invalid Email or Password";
    }else{
        
        $_SESSION['login_user'] = $email;
        header('location: index.php');

    }
    mysqli_close($conn);
}
?>