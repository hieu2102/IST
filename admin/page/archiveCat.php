<?php
$catID = $_GET['catID'];
mysqli_query($conn, "UPDATE categories set state = 'archived' where id = '$catID'");

$_SESSION['message'] = alert_msg('success', 'Category Archived');
header("location:".$_SERVER['HTTP_REFERER']);
?>