<?php
include '.  /common/connect.php';
session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE password ='$password' AND email = '$email'");
    $rows = mysqli_num_rows($query);
    if (!$query || $rows == 0)
    {
        $_SESSION['message'] = 
        "<div class = 'alert alert-danger' role = 'alert'> 
            <p style='text-align:center'>
                Invalid Email or Password
            </p>
        </div>";
        header('location: login.php');
    }else{
        
        $_SESSION['login_user'] = $email;
        header('location: index.php');

    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
You are now logged in <?php echo $email ?>
</html>