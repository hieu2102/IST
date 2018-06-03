<?php
$topicID = $_GET['topicID'];
checkID($topicID);

//pagination
if (isset($_GET['pageno'])){
    $pageno = $_GET['pageno'];
    if ($pageno <=0){
        $pageno = 1;
    }
}else{
    $pageno = 1;
}
$record_per_page = 10;
$offset = ($pageno -1)* $record_per_page;
$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT id from posts where post_topic = '$topicID'"));
$total_page = ceil($total_records/ $record_per_page);

$topic = mysqli_fetch_object(mysqli_query($conn, "SELECT state from topics where id = '$topicID'"));
$sql = "SELECT posts.id as postID,
posts.date as time, posts.content as content,
users.username as username, users.id as userID
from posts
left join users on (users.id = posts.post_by)
where posts.post_topic = '$topicID'
order by posts.date asc
limit ".$offset.", 10";
$postQuery = mysqli_query($conn,$sql);
$i = -10 + $pageno*10;
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

    <!-- post info -->
    <div class = 'row' style = 'background-color:#80acf2'>
        <div class = 'col col-md-9'><small style = 'text-align:left'># <?=++$i?> </small></div>
        <div class = 'col col-md-3'><small style = 'text-align:right'><?=$row->time?></small></div>
    </div>
    
    <!-- user info -->
    <div class = 'row'>
        <div class = 'col col-md-12'><?=$row->username?> <small>@<?=$row->userID?></small></div>
    </div>
    <br>

    <!-- post content -->
    <div class = 'row'>
        <div class = 'col col-md-12'>
            <p><?=$row->content?></p>
        </div>
    </div>

    <!-- function when topic state == open -->
<?php if ($topic->state != 'closed') {?> 
    <div class = 'row'>
                    
         <div class = 'col col-md-2'>
            <form method = "POST" action="index.php?page=post-create&topicID=<?=$topicID?>">
                <input type="hidden" name = "postQuote" value = "<?=$row->content?>">
                <input type="hidden" name="poster" value = "<?=$row->username?>">
                <input type="submit"  class = "btn btn-info" name = 'submit' value = "Quote">
            </form>
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
<?php }?>

<br>
<br>
<?php }?>
<nav>  
  <ul class="pagination">
    <li><a class = 'page-link' href="index.php?page=topics&topicID=<?=$topicID?>&pageno=<?=$pageno-1?>">Previous</a></li>
    <?php if ($pageno < $total_page){ ?> 
    <li class="page-item"><a class="page-link" href="index.php?page=topics&topicID=<?=$topicID?>&pageno=<?=$pageno+1?>">Next</a></li>
    <?php }else{
    echo "<li class = 'page-item' disabled><a class = 'page-link'>Next</a></li>";}?>
  </ul>
</nav>
        <?php if ($topic->state != 'closed') {?>
        <a class = "btn btn-dark" href="index.php?page=post-create&topicID=<?=$topicID?>">New Post</a>
         <?php }?>
    </body>
</html>