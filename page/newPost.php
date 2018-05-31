<?php 
$topicID = $_GET['topicID'];
$userID = $_SESSION['id'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Post</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
</head>
<body>
<br>
    <h3>Post Content</h3>
    <form action="index.php?page=postValidate">

    <input type='textarea' name="content" id="editor">
    <br>
    <input type="hidden" name = 'topicID' value = '<?=$topicID?>'>
    <input type="hidden" name = 'userID' value = '<?=$userID?>'>
    <input type="submit" class = 'btn btn-dark' name = 'submit' value = 'Submit'>
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>