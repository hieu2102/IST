<?php
$postID = $_POST['postID'];

$sql = mysqli_query($conn, "SELECT post_by, post_topic from posts where id = '$postID'");
$post = mysqli_fetch_object($sql);
//check permission
  mysqli_query($conn, "DELETE from posts where id = '$postID'");
    $_SESSION['message'] = alert_msg('success', 'Post Deleted');
    header("location:".$_SERVER['HTTP_REFERER']);
