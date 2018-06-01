<?php 
$catName = $_POST['catName'];
$description = $_POST['description'];
$catID = $_POST['catID'];
mysqli_query($conn, "UPDATE categories set name = '$catName', description = '$description' where id = '$catID'");
$_SESSION['message'] = alert_msg('success', 'Category Updated');
header("location: index.php?page=content");
?>