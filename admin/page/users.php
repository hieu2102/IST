<?php
//show all users
$list = mysqli_query(
    $conn, "SELECT
    id, first_name, last_name, email, level
    from users
    order by id asc"
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users List</title>
</head>
<body>

<br><br>
<div class = 'container'>
    <table class = 'table border'>
        <thead>
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Level</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_object($list)){
                echo "<tr>";
                echo "<td>".$row->id."</td>";
                echo "<td>".$row->first_name."</td>";
                echo "<td>".$row->last_name."</td>";
                echo "<td>".$row->email."</td>";
                echo "<td>".$row->level."</td>";
                echo "</tr>";
                
            }
            ?>
        </tbody>
    </table>    
</div>
</body>
</html>
