<?php
$userID = $_GET['userID'];
if (!ctype_digit($userID)){
    $_SESSION['message'] = alert_msg("danger", "Invalid ID");
    header("location: index.php?page=userManage");
}
$level = $_POST['level'];
$level_List = ['admin', 'normal','banned'];
$valid_level = false;
for ($i=0; $i< sizeof($level_List);$i++){
    if ($level ==$level_List[$i]){
        $valid_level = true;
        break;
    }
}
if (!$valid_level){
    $_SESSION['message'] = alert_msg('danger', "Invalid Permission Level");
    header("location:".$_SERVER['HTTP_REFERER']);
}else{ 
mysqli_query($conn, "UPDATE users set level = '$level' where id = '$userID'");
$_SESSION['message'] = alert_msg('success', 'Permission Change Completed for ID = '.$userID);
header("location:".$_SERVER['HTTP_REFERER']);
}
?>