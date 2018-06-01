<?php
$catID = $_GET['catID'];
checkID($catID);

mysqli_query($conn, "DELETE from categories where id = '$catID'");

$_SESSION['message'] = alert_msg('success', 'Category Deleted');
header("location:".$_SERVER['HTTP_REFERER']);
?>