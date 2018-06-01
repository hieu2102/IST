<?php
include 'connect.php';
session_start();
if ($_SESSION['level'] != 'admin'){
  $_SESSION['message'] = alert_msg('warning', 'Unauthorized Access');
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href='index.php'>Forum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=usersManage">Users List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=content">Content Manage</a>
      </li>
      <li class = "nav-item">
        <a class = "nav-link" href="index.php?page=banlist">Banlist</a>
      </li>
      <li class = "nav-item">
        <a class = "nav-link" href="index.php?page=archiveList">Archived Category</a>
      </li>
    </ul>
    <a class = 'nav-link' href="../index.php" ><button class = 'btn btn-dark'>To Index</button></a>
      <a class="btn btn-primary" href ="../auth/logout.php">Log Out</a>
  </div>
</nav>
</body>