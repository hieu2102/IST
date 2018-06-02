<?php
$content = $_POST['content'];
$post_id = $_POST['postID'];
checkID($post_id);
$topicID = $_POST['topicID'];

if (strlen(strip_tags($content)) <20){
    $_SESSION['message'] = alert_msg('danger', 'Post too short');
    header("location:".$_SERVER['HTTP_REFERER']);
}else{
    $content = mysqli_real_escape_string($conn, $content);
    $content = wordwrap($content, 100, "\n", true);
    $query = "UPDATE posts set content = '$content' where id = '$post_id'";
    mysqli_query($conn, $query);
    $_SESSION['message'] = alert_msg('success', "Post Editted");
    header("location:index.php?page=topics&topicID=".$topicID);
}