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
<div class = 'container'>
    <?php while ($topics = mysqli_fetch_object($query)){
        $postQuery = mysqli_query($conn, "SELECT max(date) as lpost from posts where post_topic = '$topics->id'");

        $count_query = mysqli_query($conn, "SELECT posts.id from posts left join topics on (topics.id = posts.post_topic) where topics.topic_cat = $id");
        if ($count_query == null){
            $posts_count = 0;
        }else{
            $posts_count = mysqli_num_rows($count_query);
        }
    
        ?>
        <table class = 'table table-hover'>
        <thead>
            <td>Subject</td>
            <td>Post Count</td>
            <td>Latest Post</td>
        </thead>
        <tbody>
            <td>
                <a href="index.php?page=topics&topicID=<?=$topics->id?>">
                    <div><h2><?=$topics->subject;?></h2></div>
                    <div><small>By: <?=$topics->starter?></small></div>
                    <div><small>On: <?=$topics->time?></small></div>
                </a>
            </td>
            <td><?=$posts_count?></td>
            <td><?php if($last_post = $postQuery->fetch_assoc()){
                echo $last_post['lpost'];}?></td>
        </tbody>
        </table>
    <?php } ?>
<br><br>
   <a class = "btn btn-dark" href="index.php?page=newTopic&catID=<?=$id?>">New Topic</a>

    </div>
</body>
</html>