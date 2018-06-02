
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<title>Login</title>
</head>
<body>

  <div class = 'container'>
    <div class = 'row justify-content-center'>
      <div class = 'col-md-8'>
      <?php
            session_start();
            if (!empty($_SESSION['message'])) {
               echo $_SESSION['message'];
               //remove alert message after being read
               unset($_SESSION['message']);
            }
            ?>
        <div class = 'card'>
          <div class = 'card-header'>Login</div>

          <div class = 'card-body'>
            <form method = "POST" action="loginAuthenticate.php">
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
</body>
</html>