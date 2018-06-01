<?php 
$catName = $_POST['catName'];
$description = $_POST['description'];
mysqli_query($conn, "INSERT INTO categories (name, description) values ('$catName', '$description')");
$_SESSION['message'] = alert_msg('success', 'Category Created');
header("location: index.php?page=content");
?>