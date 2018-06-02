<?php
$userID = $_POST['userID'];
checkID($userID);
$catID = $_POST['catID'];
checkID($userID);
$subject = $_POST['subject'];
$content = $_POST['content'];

if (strlen(strip_tags($subject)) < 20 || strlen(strip_tags($subject))>100) {
    $_SESSION['message'] = alert_msg('danger', 'Subject length must be within 20-100 characters');
    header("location:" . $_SERVER['HTTP_REFERER']);
} elseif (strlen(strip_tags($content)) < 20) {
    $_SESSION['message'] = alert_msg('danger', 'Post too short');
    header("location:" . $_SERVER['HTTP_REFERER']);
} else {

    $subject = mysqli_real_escape_string($conn, $subject);
    $content = mysqli_real_escape_string($conn, $content);
    //wrapping text for display
    $content = wordwrap($content, 100, "\n", true);

    //create new topic
    $topicQuery = "INSERT INTO topics (subject, topic_by, topic_cat) values ('$subject', '$userID', '$catID')";
    mysqli_query($conn, $topicQuery);

    //get topic ID
    $topic = mysqli_query($conn, "SELECT id from topics where topic_by = '$userID' and topic_cat = '$catID' order by id desc LIMIT 1");
    $object = mysqli_fetch_object($topic);
    $topicID = $object->id;
    //create first post
    mysqli_query($conn, "INSERT INTO posts (content, post_by, post_topic) values ('$content', '$userID', '$topicID')");
    $_SESSION['message'] = alert_msg('success', "Topic Created");
    header('location: index.php?page=category&ID='.$catID);

}
