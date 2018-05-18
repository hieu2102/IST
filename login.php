<?php
include 'loginAuthenticate.php';
include './common/sidebar.php';
if (isset($_SESSION['login_user'])){
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>
<div class = 'content'>
  <div class = 'container'>
    <div class = 'row justify-content-center'>
      <div class = 'col-md-8'>
        <div class = 'card'>
          <div class = 'card-header'>Login</div>

          <div class = 'card-body'>
            <form method = "POST" action="login.php">
              <div class = 'form-group row'>
                <label for="email" class ='col-sm-4 col-form-label text-md-right'>Email</label>
                
                <div class = 'col-md-6'>
                  <input id = 'email' type="email" class = 'form-control' name = 'email' required>
                </div>
              </div>

              <div class = 'form-group row'>
                <label for = "password" class = 'col-md-4 col-form-label text-md-right'>Password</label>
                <div class = 'col-md-6'>
                  <input id = 'password' type="password" class = 'form-control' name = 'password' required>
                </div>
              </div>
              
              <div class = 'form-group row mb-0'>
                <div class = 'col-md-8 offset-md-4'>
                  <button type = 'submit' class = 'btn btn-primary' name = 'submit'>Login</button>

                  <a  class ='btn btn-link' href="register.php">Register</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>