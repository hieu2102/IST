<?php
$content = $_POST['content'];
$user = $_POST['userID'];
$topic = $_POST['topicID'];
if ($content = ""){
    $_SESSION['message']=alert_msg('danger', 'Empty Post');
    header( "location: {$_SERVER['HTTP_REFERER']} ");
};
    //wrapping content
$content = wordwrap($content, 100, "\n",true);
$query = "INSERT INTO posts (content, post_by, post_topic) values ('$content', '$user', '$topic')";
$sql = mysqli_query($conn, $query);
header('location:index.php?page=topics&topicID=$topic');
?>