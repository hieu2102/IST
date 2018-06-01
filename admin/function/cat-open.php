<?php
$catID = $_GET['catID'];
checkID($catID);

mysqli_query($conn, "UPDATE categories set state = 'open' where id = '$catID'");

$_SESSION['message'] = alert_msg('success', 'Category Opened');
header("location:".$_SERVER['HTTP_REFERER']);
?>