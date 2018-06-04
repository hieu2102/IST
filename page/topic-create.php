<?php
$catID = $_GET['catID'];
$userID = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Topic</title>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script> -->
</head>
<body>
    <form method = 'POST' action="index.php?function=topic-store">
    <br>
    <h3>Topic Subject</h3>
    <input type="text" name = 'subject' class = 'form-control' placeholder = 'Input Topic Subject'>
    <br>
    <h3>Post Content</h3>
    <!-- <textarea name="content" id="editor" cols="30" rows="10"></textarea> -->
    <textarea name="content" class = "form-control" id="" cols="30" rows="10" placeholder = "Accept HTML styling"></textarea>
    <br>
    <input type="hidden" name = 'catID' value = '<?=$catID?>'>
    <input type="hidden" name = 'userID' value = '<?=$userID?>'>
    <input type="submit" class = 'btn btn-dark' name = 'submit' value = 'Submit'>
    </form>
    <!-- ckeditor script -->
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor'))
            .catch( error => {
                console.error( error);
            });
    </script>
</body>
</html>