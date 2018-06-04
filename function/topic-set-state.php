<?php
$topicID = $_POST['topicID'];
$catID = $_POST['catID'];
$state = $_POST['state'];
if ($_SESSION['level'] != 'admin') {
    $_SESSION['message'] = alert_msg('danger', "Unauthorized Action");
    header("location:".$_SERVER['HTTP_REFERER']);
}
//only admin can change state
$states = array('open', 'closed');
$valid_state = false;
for ($i = 0; $i < sizeof($states); $i++) {
    if ($state == $states[$i]) {
        $valid_state = true;
    }
}
if (!$valid_state){
    $_SESSION['message'] = alert_msg('danger', "Invalid Topic State");
    header("location:".$_SERVER['HTTP_REFERER']);
}else{
    mysqli_query($conn, "UPDATE topics set state = '$state' where id = '$topicID'");
    $_SESSION['message'] = alert_msg('success', 'Topic State Changed');
    header("location:".$_SERVER['HTTP_REFERER']);

}
