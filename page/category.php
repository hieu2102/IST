<?php
$id = $_GET['ID'];
$cat = mysqli_fetch_object(mysqli_query($conn, "SELECT name from categories where id = '$id'"));
$sql_topics = "SELECT topics.subject as subject,topics.id as id,  
                topics.date as time, users.username as starter 
                from topics
                left join users on (users.id = topics.topic_by)
                where topic_cat = '$id' order by date desc";
$query = mysqli_query($conn, $sql_topics);

?>

<html>
<head><title><?=$cat->name?></title></head>
<body>
<table class = 'table table-hover'> 
    <?php while ($topics = mysqli_fetch_object($query)){
        $postQuery = mysqli_query($conn, "SELECT max(date) as lpost from posts where post_topic = '$topics->id'");

        $count_query = mysqli_query($conn, "SELECT posts.id from posts left join topics on (topics.id = posts.post_topic) where topics.topic_cat = $id and topics.id = '$topics->id' ");
        if ($count_query == null){
            $posts_count = 0;
        }else{
            $posts_count = mysqli_num_rows($count_query);
        }
    
        ?>
        
        <thead>
            <td>Subject</td>
            <td>Post Count</td>
            <td>Latest Post</td>
        </thead>
        <tbody>
            <td>
                <a href="index.php?page=topics&topicID=<?=$topics->id?>">
                    <div><h5><?=$topics->subject;?></h5></div>
                    <div><small>By: <?=$topics->starter?></small></div>
                    <div><small>On: <?=$topics->time?></small></div>
                </a>
            </td>
            <td><?=$posts_count?></td>
            <td><?php if($last_post = $postQuery->fetch_assoc()){
                echo $last_post['lpost'];}?></td>
        </tbody>
    <?php } ?>
    </table>

<br><br>
   <a class = "btn btn-dark" href="index.php?page=topic-create&catID=<?=$id?>">New Topic</a>

</body>
</html>