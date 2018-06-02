<?php
$topicID = $_GET['topicID'];
checkID($topicID);
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
    <head>
        <title>Topic</title>
        <style type = "text/css">
        blockquote {
        position: relative;
        marign: 0px;
        padding: 10px 10px;
        text-align: center;
        font-size: 20px;
        /*display:inline-block;*/
        }
        </style>
    </head>
    <body>
        <br>
            <?php
while ($row = mysqli_fetch_object($postQuery)) {?>
                <div class = 'row' style = 'background-color:#80acf2'>
                    <div class = 'col col-md-9'><small style = 'text-align:left'># <?=++$i?> </small></div>
                    <div class = 'col col-md-3'><small style = 'text-align:right'><?=$row->time?></small></div>
                </div>
                <div class = 'row'>
                    <div class = 'col col-md-12'><?=$row->username?> <small>@<?=$row->userID?></small></div>
                </div>
                <br>
                <div class = 'row'>
                    <div class = 'col col-md-12'>
                    <p><?=$row->content?></p>
                    </div>
                </div>
                <div class = 'row'>
                    <div class = 'col col-md-2'>
                        <a href="index.php?page=post-quote" class = 'btn btn-info'>Quote</a>
                    </div>

                    <?php if ($_SESSION['level'] == 'admin' || $_SESSION['id'] == $row->userID) {?>
                    <div class = 'col col-md-2'>
                        <a class = 'btn btn-secondary' href="index.php?page=post-edit&postID=<?=$row->postID?>">Edit</a>
                    </div>
                    <?php }?>

                    <?php if ($_SESSION['level'] == 'admin' || $_SESSION['id'] == $row->userID) {?>
                    <div class = 'col col-md-2'>
                        <form method = "POST" action="index.php?function=post-delete">
                            <input type="hidden" name = "postID" value ="<?=$row->postID?>">
                            <input type="submit" name = "submit" value = "Delete" class = 'btn btn-danger'>
                        </form>
                    </div>
                    <?php }?>
                </div>
                <br><br>
            <?php }?>

        <a class = "btn btn-dark" href="index.php?page=post-create&topicID=<?=$topicID?>">New Post</a>
    </body>
</html>