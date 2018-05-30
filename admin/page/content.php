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
    <title>Content Managing</title>
</head>
<body>
    <div class = 'container'>
    <br><br>
    <div class = 'row'>
        <div class = 'col col-sm-9'>
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
                        while ($row = mysqli_fetch_object($list)){
                            echo "<tr>";
                            echo "<td>".$row->id."</td>";
                            echo "<td>".$row->name."</td>";
                            echo "<td>".$row->description."</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class = 'col col-sm-3'>
        Create new Categoy
        
        </div>
    </div>
    </div>

</body>
</html>