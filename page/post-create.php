<?php 
$topicID = $_GET['topicID'];
$userID = $_SESSION['id'];
$quote = "";
if (isset($_POST['postQuote'])){
    $quote ="<blockquote>".$_POST['postQuote']."<small>@".$_POST['poster']."</small></blockquote>";
};

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Post</title>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script> -->
</head>
<body>
<br>
<div class = 'container'>
    <h3>Post Content</h3>
    <form method = "POST" action="index.php?function=post-store">

    <!-- <textarea name="content" id="editor" rows='10'><?=$quote?></textarea> -->
    <textarea name="content" rows='10' cols = '30' class = 'form-control' placeholder = "Accept HTML styling"><?=$quote?></textarea>

    <br>
    <input type="hidden" name = 'topicID' value = '<?=$topicID?>'>
    <input type="hidden" name = 'userID' value = '<?=$userID?>'>
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