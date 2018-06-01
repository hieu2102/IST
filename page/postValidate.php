<?php
$content = $_POST['content'];
$user = $_POST['userID'];
$topic = $_POST['topicID'];

if (strlen(strip_tags($content)) < 20) {
    $_SESSION['message'] = alert_msg('danger', 'Post too short');
    header("location:" . $_SERVER['HTTP_REFERER']);
} else {

    $content = mysqli_real_escape_string($conn, $content);
    //wrapping content
    $content = wordwrap($content, 100, "\n", true);
    $query = "INSERT INTO posts (content, post_by, post_topic) values ('$content', '$user', '$topic')";
    $sql = mysqli_query($conn, $query);
    $_SESSION['message'] = alert_msg('success', 'Post Submitted');
    header('location:index.php?page=topics&topicID=' . $topic);
}
