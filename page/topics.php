<?php
$topicID = $_GET['topicID'];
$postQuery = mysqli_query($conn, "SELECT posts.id as postID, 
                            posts.date as time, posts.content as content, 
                            users.username as username, users.id as userID
                            from posts
                            left join users on (users.id = posts.post_by)
                            where posts.post_topic = '$topicID'
                            order by posts.date asc");
$i = 0;
?>

<html>
    <head><title>Topic</title></head>
    <body>
        <div class = 'container'>
        <br>
            <?php
                while ($row = mysqli_fetch_object($postQuery)){ ?>
                <div class = 'row' style = 'background-color:#80acf2'>
                    <div class = 'col col-md-9'><small style = 'text-align:left'># <?=++$i?> </small></div>
                    <div class = 'col col-md-3'><small style = 'text-align:right'><?=$row->time?></small></div>
                </div>
                <div class = 'row'>
                    <div class = 'col col-md-12'><?=$row->username?> <small>@<?=$row->userID?></small></div>
                </div>
                <br>
                <div class = 'row'>
                    <div class = 'col col-md-12'><?=$row->content?></div>
                </div>
                <br><br>
            <?php } ?>
       
        <a class = "btn btn-dark" href="index.php?page=newPost&topicID=<?=$topicID?>">New Post</a>
        </div>
    </body>
</html>