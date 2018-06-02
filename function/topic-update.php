<?php
$topicID = $_POST['topicID'];
if (!ctype_digit($topicID)){
    $_SESSION['message'] = alert_msg('danger', "Invalid ID");
}
$subject = $_POST['subject'];
if (strlen(strip_tags($subject)) <20 || strlen(strip_tags($subject))>200){
    $_SESSION['message'] = alert_msg('danger', "Subject must be within 20-200 characters long");
}else{
    $subject = mysqli_real_escape_string($conn, $subject);
    mysqli_query($conn, "UPDATE topics set subject = '$subject' where id = '$topicID'");
    $_SESSION['message'] = alert_msg('success', 'Topic Editted');
    header('location:index.php?page=topics&topicID='.$topicID);
}