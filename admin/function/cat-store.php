<?php 
$catName = $_POST['catName'];
$catName = mysqli_real_escape_string($conn,$catName);
$description = $_POST['description'];
$description = mysqli_real_escape_string($conn,$catName);
mysqli_query($conn, "INSERT INTO categories (name, description) values ('$catName', '$description')");
$_SESSION['message'] = alert_msg('success', 'Category Created');
header("location: index.php?page=content");
?>