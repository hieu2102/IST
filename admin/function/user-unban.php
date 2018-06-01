<?php
$userID = $_GET['userID'];
if (!ctype_digit($userID)){
    $_SESSION['message'] = alert_msg("danger", "Invalid ID");
    header("location: index.php?page=userManage");
}
mysqli_query($conn, "UPDATE users set level = 'normal' where id = '$userID'");
$_SESSION['message'] = alert_msg('success', 'Set ID='.$userID.' to normal user');
header("location:".$_SERVER['HTTP_REFERER']);
?>