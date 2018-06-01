<?php

//show all categories
$list = mysqli_query($conn, "SELECT id, name, description from categories
                            order by id asc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Content Manage</title>
</head>
<body>
    <br><br>
            <table class = 'table table-hover'>
                    <tr class = 'table-primary'>
                        <td>ID</td>
                        <td>Category's Name</td>
                        <td>Description</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                <tbody>
                    <?php
                    if ($list != false){
                        while ($row = mysqli_fetch_object($list)){ ?>
                            <tr>
                                <td><?=$row->id?></td>
                                <td><?=$row->name?></td>
                                <td><?=$row->description?></td>
                                <td><a href="index.php?page=editCat&catID=<?=$row->id?>" class = 'btn btn-warning'>Edit</a></td>
                                <td><a href="index.php?page=deleteCat&catID=<?=$row->id?>" class = 'btn btn-danger'>Delete</a></td>
                            </tr>
                    <?php } }?>
                </tbody>
            </table>
            <br>
            <a href="index.php?page=newCat" class = 'btn btn-light'>New Category</a>
</body>
</html>