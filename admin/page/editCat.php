<?php
$catID = $_GET['catID'];
$query = mysqli_query($conn, "SELECT * from categories where id = '$catID'");
$category = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
</head>
<body>
<br><br>
<div class = 'card'>
<div class = 'card-header'> <p class = 'text-dark'>Edit Category</p></div>
<div class = 'card-body'>
    <form method = "POST" action="index.php?function=updateCat">
    <div class = 'form-group row'>
    <label for="catName" class = 'text-dark'>Category Name</label>
    <input type="text" class = 'form-control' name = 'catName' value = '<?=$category->name?>' required>
    </div>
    <div class = 'form-group row'>
    <label for="description" class = 'text-dark'>Description</label>
    <input type="text" class = 'form-control' name = 'description' value = '<?=$category->description?>' required>
    </div>
    <input type="hidden" name = 'catID' value = '<?=$category->id?>'>
    <div class = 'form-group row'>
    <input type="submit" name = 'submit' class = 'btn btn-primary' value = 'Submit'>
    </div>
    </form>
</div>
</div>
</body>
</html>