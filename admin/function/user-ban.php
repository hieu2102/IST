<?php
$userID = $_GET['userID'];
checkID($userID);
mysqli_query($conn, "UPDATE users set level ='banned' where id = '$userID'");
$_SESSION['message'] = alert_msg('success', 'User Banned');
header("location:".$_SERVER['HTTP_REFERER']);
?>