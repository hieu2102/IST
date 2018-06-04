<?php 
$postID = $_GET['postID'];
$userID = $_SESSION['id'];
$sql = mysqli_query($conn, "SELECT * from posts where id = '$postID'");
$post = mysqli_fetch_object($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Post</title>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script> -->
</head>
<body>
<br>
<div class = 'container'>
    <h3>Post Content</h3>
    <form method = "POST" action="index.php?function=post-update">

    <!-- <textarea name="content" id="editor" rows='10'><</textarea> -->
    <textarea name="content" class = 'form-control' rows='10' cols = '30' placeholder = "Accept HTML styling" ><?=$post->content?></textarea>

    <br>
    <input type="hidden" name = 'topicID' value = '<?=$post->post_topic?>'>
    <input type="hidden" name = 'postID' value = '<?=$post->id?>'>
    <input type="submit" class = 'btn btn-dark' name = 'submit' value = 'Submit'>
</div>
    <!-- <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script> -->
</body>
</html>