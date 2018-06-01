<?php
$userID = $_GET['userID'];
checkID($userID);
mysqli_query($conn, "UPDATE users set level = 'admin' where id = '$userID'");
$_SESSION['message'] = alert_msg('success', 'Set ID='.$userID.' to admin');
header("location:".$_SERVER['HTTP_REFERER']);
?>