<?php

//show all categories
$list = mysqli_query($conn, "SELECT cat_id, cat_name, cat_description from categories
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
        <table class = 'table table-hover'>
                <tr class = 'table-primary'>
                    <td>ID</td>
                    <td>Category's Name</td>
                    <td>Description</td>
                </tr>
            <tbody>
                <?php
                if ($list != false){
                    while ($row = mysqli_fetch_object($list)){
                        echo "<tr>";
                        echo "<td>".$row->cat_id."</td>";
                        echo "<td>".$row->cat_name."</td>";
                        echo "<td>".$row->cat_description."</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>