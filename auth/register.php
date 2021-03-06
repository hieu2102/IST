
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<title>Registration</title>
</head>
<body>
<div class = 'content'>
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
          <div class = 'card-header'>Registration</div>
          <div class = 'card-body'>
            <form method = "POST" action="registerAuthenticate.php">
              <div class = 'form-group row'>
                <label for= "name" class = 'col-md-4 col-form-label text-md-right'>Username</label>
                <div class = 'col-md-6'>
                  <input id = 'name' type="text" class = 'form-control' placeholder = 'Input username' name = 'name' required>
                </div>
              </div>
              <div class = 'form-group row'>
                <label for = "password" class = 'col-md-4 col-form-label text-md-right'>Password</label>
                <div class = 'col-md-6'>
                  <input id = 'password' type="password" class = 'form-control' 
                  placeholder = 'Input Password'name = 'password' required>
                </div>
              </div>
              <div class = 'form-group row'>
                <label for = "re_password" class = 'col-md-4 col-form-label text-md-right'>Re-type Password</label>
                <div class = 'col-md-6'>
                  <input id = 're_password' type="password" class = 'form-control' 
                  placeholder = 'Re-type Password' name = 're_password' required>
                </div>
              </div>
              <div class = 'form-group row'>
                <label for = "email" class = 'col-md-4 col-form-label text-md-right'>Email</label>
                <div class = 'col-md-6'>
                  <input id = 'email' type="email" class = 'form-control' 
                  placeholder = 'Input Email' name = 'email' required>
                </div>
              </div>  
              <div class = 'form-group row'>
                <label for = "ID" class = 'col-md-4 col-form-label text-md-right'>Student ID</label>
                <div class = 'col-md-6'>
                  <input id = 'ID' type="number" class = 'form-control' 
                  placeholder = 'Input Student ID' name = 'ID' required>
                </div>
              </div>              
              <div class = 'form-group row mb-0'>
                <div class = 'col-md-8 offset-md-4'>
                  <button type = 'submit' class = 'btn btn-primary' name = 'submit'>Register</button>

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