<?php
$catID = $_GET['catID'];
checkID($catID);

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
$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT id from topics where topic_cat = '$catID'"));
$total_page = ceil($total_records/ $record_per_page);

$cat = mysqli_fetch_object(mysqli_query($conn, "SELECT name from categories where id = '$catID'"));
$sql_topics = "SELECT topics.subject as subject,topics.id as id,
                topics.date as time, users.username as starter,
                users.id as userID,
                topics.state as state
                from topics
                left join users on (users.id = topics.topic_by)
                where topic_cat = '$catID' order by date desc
                limit ".$offset.", 10";
$query = mysqli_query($conn, $sql_topics);


?>

<html>
<head><title>Category | <?=$cat->name?></title></head>
<body>
<table class = 'table table-hover'>
        <thead>
            <td>Subject</td>
            <td>Post Count</td>
            <td>Latest Post</td>
        </thead>
        <tbody>

    <?php while ($topics = mysqli_fetch_object($query)) {
    $postQuery = mysqli_query($conn, "SELECT max(date) as lpost from posts where post_topic = '$topics->id'");

    $count_query = mysqli_query($conn, "SELECT posts.id from posts left join topics on (topics.id = posts.post_topic) where topics.topic_cat = $catID and topics.id = '$topics->id' ");
    if ($count_query == null) {
        $posts_count = 0;
    } else {
        $posts_count = mysqli_num_rows($count_query);
    }
    ?>
        <tr>
            <td>
                <a href="index.php?page=topics&topicID=<?=$topics->id?>&pageno=1">
                    <div><h5><?php
                        if ($topics->state == 'open'){
                            echo $topics->subject;
                        }else{
                            echo "<p class = 'text-muted'>".$topics->subject."</p>";
                        }
                     ?>
                </a></h5></div>
                    <div class ='row'>
                        <div class = 'col col-md-6'>
                            <div><small class = 'text-muted'>By: <?=$topics->starter?></small></div>
                            <div><small class = 'text-muted'>On: <?=$topics->time?></small></div>
                        </div>
                        <div class = 'col col-md-2'>
                            <form method = "POST" action="index.php?page=topic-edit">
                                <input type="hidden" name = "topicID" value = "<?=$topics->id?>">
                                <input type="hidden" name = "userID" value = "<?=$topics->userID?>">
                                <input type="submit" name = "submit" value = "Edit" class = 'btn btn-info'>
                            </form>
                        </div>
                        <?php if ($_SESSION['level'] == 'admin') {?>
                            <div class = 'col col-md-2'>
                                <?php if ($topics->state == 'open') {?>
                                <form method = "POST" action="index.php?function=topic-set-state">
                                    <input type="hidden" name = 'topicID' value = '<?=$topics->id?>'>
                                    <input type="hidden" name="catID" value = '<?=$catID?>'>
                                    <input type="hidden" name = 'state' value = 'closed'>
                                    <input type="submit" name = 'submit' value = "Lock" class = "btn btn-secondary">
                                </form>
                                <?php } else {?>
                                <form method = "POST" action="index.php?function=topic-set-state">
                                    <input type="hidden" name = 'topicID' value = '<?=$topics->id?>'>
                                    <input type="hidden" name="catID" value = '<?=$catID?>'>
                                    <input type="hidden" name = 'state' value = 'open'>
                                    <input type="submit" name = 'submit' value = "Open" class = "btn btn-secondary">
                                </form>
                                <?php }?>
                                </div>
                            <div class = 'col col-md-2'>
                                <form method = "POST" action="index.php?function=topic-delete">
                                    <input type="hidden" name = 'topicID' value = '<?=$topics->id?>'>
                                    <input type="hidden" name = "catID" value = '<?=$catID?>'>
                                    <input type="submit" name = 'submit' value = "Delete" class = "btn btn-danger">
                                </form>
                            </div>
                        <?php }?>
                    </div>
            </td>
            <td><?=$posts_count?></td>
            <td>
                <?php if ($last_post = $postQuery->fetch_assoc()) {
                echo $last_post['lpost'];}?>
            </td>

        </tr>
    <?php }?>
    </tbody>
    </table>
<br>
<nav aria-label="Page navigation example">  
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="index.php?page=category&catID=<?=$catID?>&pageno=<?=$pageno-1?>">Previous</a></li>
    <?php if ($pageno < $total_page){ ?> 
    <li class="page-item"><a class="page-link" href="index.php?page=category&catID=<?=$catID?>&pageno=<?=$pageno+1?>">Next</a></li>
    <?php }else{
    echo "<li class = 'page-item' disabled><a class = 'page-link'>Next</a></li>";}?>

  </ul>
</nav>
<br>
   <a class = "btn btn-dark" href="index.php?page=topic-create&catID=<?=$id?>">New Topic</a>

</body>
</html>