<?php
$sql = "SELECT * FROM categories where state = 'open' order by id";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum</title>
</head>
<body>
<br><br>
<table class = 'table table-hover'>
        <thead class = 'table-primary'>
            <td><small>Category</small></td>
            <td><small>Latest Post</small></td>
            <td><small>Topics Count</small></td>
            <td><small>Post Count</small></td>
        </thead>

    <?php
    while ($row = mysqli_fetch_object($query)) {
    //get topic count
    $topics = mysqli_query($conn, "SELECT id from topics where topic_cat =$row->id");
    $topics_count = mysqli_num_rows($topics);

    //get post count
    $count_query = mysqli_query($conn, "SELECT posts.id from posts left join topics on (topics.id = posts.post_topic) where topics.topic_cat = $row->id");
    if ($count_query == null) {
        $posts_count = 0;
    } else {
        $posts_count = mysqli_num_rows($count_query);
    }

    //get latest post
    $postQuery = "SELECT topics.subject as subject,
    max(posts.date) as time,
    topics.id as topicID,
    users.username as poster from posts
    left join topics on (topics.id = posts.post_topic)
    left join users on (users.id = posts.post_by)
    where topics.topic_cat = $row->id";
    $last_post = mysqli_query($conn, $postQuery);
    if ($last_post != null) {
        $post = mysqli_fetch_object($last_post);
    }?>

        <tbody>
            <td>
                <a href = 'index.php?page=category&catID=<?=$row->id?>'>
                <div><h5><?=$row->name?></h5></div>
                <div class = 'text-dark'><small><?=$row->description?></small></div>

                </a>
            </td>
            <td>
            <a href="index.php?page=topics&topicID=<?=$post->topicID?>">
                <div><h6><?=$post->subject?></h6></div>
                <div class = 'text-muted'><small><?=$post->poster?></small></div>
                <div class = 'text-muted'><small><?=$post->time?></small></div>
            </a>
            </td>
                <td><?=$topics_count?></td>
                <td><?=$posts_count?></td>
        </tbody>
<?php }?>
   </div>
    </div>
</body>
</html>