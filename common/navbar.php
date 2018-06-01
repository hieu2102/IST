<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['login_user'])){
  $_SESSION['message'] = alert_msg('warning', 'Please log in first');
  header('location: ./auth/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php?page=forum">Forum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=profile&userID=<?=$_SESSION['id']?>">Profile</a>
      </li>
      <li class="nav-item">
        <form class = 'form-inline' method = "POST" action="index.php?function=search">
          <input type="number" class = 'form-control' name = 'queryID' placeholder = 'Search User ID' required>
          <input type="submit" class = 'btn btn-info' name = 'submit' value = 'Search'>
        </form>
      </li>
    </ul>
        <?php if ($_SESSION['level'] =='admin'){ ?>
          <a class = 'nav-link' href='./admin/index.php?page=usersManage'> <button class = 'btn btn-light'>Admin Panel</button></a>
        <?php }?>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-primary" href ="./auth/logout.php">Log Out</a>
    </form>
  </div>
</nav>
</body>