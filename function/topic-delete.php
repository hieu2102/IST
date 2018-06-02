<?php
$topicID = $_POST['topicID'];
$catID = $_POST['catID'];
checkID($topicID);
if ($_SESSION['level'] != 'admin'){
    $_SESSION['message'] = alert_msg('danger', "Unauthorized Action");
}
//only admin can delete 
  mysqli_query($conn, "DELETE from topics where id = '$topicID'");
    $_SESSION['message'] = alert_msg('success', 'Topic Deleted');
    header("location:index.php?page=category&ID=".$catID);
