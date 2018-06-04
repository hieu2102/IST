<?php
$topicID = $_POST['topicID'];
$level = $_SESSION['level'];
$starter = $_POST['userID'];
$subject = $_POST['subject'];
if ($level == 'admin' || $_SESSION['id'] == $starter){
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Topic</title>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script> -->
</head>
<body>
    <form method = 'POST' action="index.php?function=topic-update">
    <br>
    <h3>Topic Subject</h3>
    <input type="text" name = 'subject' class = 'form-control' placeholder = 'Input Topic Subject' value = "<?=$subject?>">
    <input type="hidden" name = 'topicID' value = '<?=$topicID?>'>
    <br>
    <input type="submit" class = 'btn btn-dark' name = 'submit' value = 'Submit'>
    </form>
    <!-- ckeditor script -->
    <!-- <script>
        ClassicEditor
            .create( document.querySelector( '#editor'))
            .catch( error => {
                console.error( error);
            });
    </script> -->
</body>
</html>
        <?php }else{
             $_SESSION['message'] = alert_msg("danger", "Unauthorized Action");
             header("location:".$_SERVER['HTTP_REFERER']);
            } ?>