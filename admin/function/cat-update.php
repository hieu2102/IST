<?php 
$catName = $_POST['catName'];
$description = $_POST['description'];
$catID = $_POST['catID'];
checkID($catID);
$catName = mysqli_real_escape_string($conn,$catName);
$description = mysqli_real_escape_string($conn,$description);
mysqli_query($conn, "UPDATE categories set name = '$catName', description = '$description' where id = '$catID'");
$_SESSION['message'] = alert_msg('success', 'Category Updated');
header("location: index.php?page=content");
?>