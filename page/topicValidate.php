<?php
$userID = $_POST['userID'];
$catID = $_POST['catID'];
$subject = $_POST['subject'];
$content = $_POST['content'];

if (strlen($subject) < 20) {
    $_SESSION['message'] = alert_msg('danger', 'Subject length too short');
    header("location:" . $_SERVER['HTTP_REFERER']);
} elseif (strlen(strip_tags($content)) < 20) {
    $_SESSION['message'] = alert_msg('danger', 'Post too short');
    header("location:" . $_SERVER['HTTP_REFERER']);
} else {
    $content = mysqli_real_escape_string($conn, $content);
    //wrapping content
    $content = wordwrap($content, 100, "\n", true);

    //create new topic
    $topicQuery = "INSERT INTO topics (subject, topic_by, topic_cat) values ('$subject', '$userID', '$catID')";
    mysqli_query($conn, $topicQuery);

    //get topic ID
    $topic = mysqli_query($conn, "SELECT max(id) as cID from topics where topic_by = '$userID' and topic_cat = '$catID'");
    $topicID = mysqli_fetch_object($topic);

    //create first post
    mysqli_query($conn, "INSERT INTO posts (content, post_by, post_topic) values ('$content', '$userID', '$topicID->cID')");

    $_SESSION['message'] = alert_msg('success', 'Topic Created' . $topicID->cID);
    header('location: index.php?page=category&ID={{$catID}}');

}
