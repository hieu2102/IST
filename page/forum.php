<?php
$sql = "SELECT * FROM categories order by id";
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
    <div class = 'container'>
    <br><br>
   <div class = 'row'>
        <?php
while ($row = mysqli_fetch_object($query)) {
    //get topic count
    $topics = mysqli_query($conn, "SELECT id from topics where topic_cat =$row->id");
    $topics_count = mysqli_num_rows($topics);

    //get post count
    $count_query = mysqli_query($conn, "SELECT posts.id from posts left join topics on (topics.id = posts.post_topic) where topics.topic_cat = $row->id");
    if ($count_query == null){
        $posts_count = 0;
    }else{
        $posts_count = mysqli_num_rows($count_query);
    }

    //get latest post
    $postQuery = "SELECT topics.subject as subject, 
    max(posts.date) as time, 
    users.username as poster from posts
    left join topics on (topics.id = posts.post_topic)
    left join users on (users.id = posts.post_by)
    where topics.topic_cat = $row->id";
    $last_post = mysqli_query($conn, $postQuery);
    if ($last_post != null){
    $post = mysqli_fetch_object($last_post);
    } 
    echo "<table class = 'table table-hover'>";
    echo "<thead class = 'table-primary'>
            <td colspan='4'>$row->name</td>
        </thead>";
    echo "<thead>
                    <td style = 'width:45%'><small>Description</small></td>
                    <td style = 'width:30%'><small>Latest Post</small></td>
                    <td><small>Topics Count</small></td>
                    <td><small>Post Count</small></td>
                </thead>";
    echo "<tbody>
                    <td><a href = 'index.php?page=category&ID=$row->id'><div>$row->description</div></a></td>
                    <td><div><h5>$post->subject</h5></div>
                        
                    <div><small>$post->poster</small></div>
                    
                    <div><small>$post->time</small></div>
                    </td>
                    <td>$topics_count</td>
                    <td>$posts_count</td>
                </tbody>";
}
?>
   </div>
    </div>
</body>
</html>