<?php
$userID = $_GET['userID'];
mysqli_query($conn, "UPDATE users set level = 'normal' where id = '$userID'");
$_SESSION['message'] = alert_msg('success', 'Set ID='.$userID.' to normal user');
header("location:".$_SERVER['HTTP_REFERER']);
?>