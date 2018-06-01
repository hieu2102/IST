<?php
$catID = $_GET['catID'];
if (!ctype_digit($catID)){
    $_SESSION['message'] = alert_msg("danger", "Invalid ID");
    header("location: index.php?page=userManage");
}
mysqli_query($conn, "UPDATE categories set state = 'archived' where id = '$catID'");
$_SESSION['message'] = alert_msg('success', 'Category Archived');
header("location:".$_SERVER['HTTP_REFERER']);
?>