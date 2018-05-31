<?php
$content = $_POST['content'];
$user = $_POST['userID'];
$topic = $_POST['topicID'];

$query = "INSERT INTO posts (content, post_by, post_topic) values ('$content', '$user', '$topic')";
$sql = mysqli_query($conn, $query);
header('location:index.php?page=topics&topicID=$topic');
?>