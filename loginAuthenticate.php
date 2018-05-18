<?php
include './common/connect.php';
session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE 
            password ='$password' AND 
            email = '$email'");
    $rows = mysqli_num_rows($query);
    if ($rows == 0)
    {
        $_SESSION['message'] = alert_msg('danger', 'Invalid Email or Password');
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