<?php
$userID = $_GET['userID'];
//avoid injection && check ID validity
if (!ctype_digit($userID) || strlen($userID) != 10 || substr($userID, 0, 2) > 18) {
    $_SESSION['message'] = alert_msg("danger", "Invalid ID");
    header("location: index.php?page=forum");
} else {
    $query = "SELECT
        users.email as email, users.username as username,
        users.created_at as joinDate, users.level as level
        from users where id = '$userID'";
    $sql = mysqli_query($conn, $query);
    if (mysqli_num_rows($sql) == 0) {
        $_SESSION['message'] = alert_msg("info", "User Does not Exist");
        header("location: index.php?page=forum");
    } else {
        $user = mysqli_fetch_object($sql);

//query lastest post
        $postQuery = "SELECT max(posts.id) as postID, posts.date as postTime,
            topics.id as topicID, topics.subject as subject
            from posts left join topics on (topics.id = posts.post_topic)
            where post_by = '$userID'";
        $postSQL = mysqli_query($conn, $postQuery);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User | <?=$user->username?></title>
</head>
<body>
    <br>
    <div class = 'card'>
        <div class = 'card-header'><?=$user->username?></div>
        <div class = 'card-body'>
            <div class = 'row'><strong>ID</strong>: <?=$userID?></div>
            <div class = 'row'><strong>email</strong>: <?=$user->email?></div>
            <div class = 'row'><strong>Join Date</strong>: <?=$user->joinDate?></div>
            <div class = 'row'>Latest Post: 
                <?php if (mysqli_num_rows($postSQL) > 0) {
    $lastPost = mysqli_fetch_object($postSQL);?>
                    <a href="index.php?page=topics&topicID=<?=$lastPost->topicID?>"><?=$lastPost->subject?></a> <small class = 'text-muted'><?=$lastPost->postTime?></small>
                <?php }?>
            </div>
        </div>
    </div>
</body>
</html>