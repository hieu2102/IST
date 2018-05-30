<?php
//show all users
$list = mysqli_query(
    $conn, "SELECT
    id, username, email, level
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
    <table class = 'table table-hover'>
            <thead class="thead-dark">
            <tr class ='table-primary'>
                <td>ID</td>
                <td>Username</td>
                <td>Email</td>
                <td>Level</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_object($list)){
                echo "<tr>
                        <td>$row->id</td>
                        <td>$row->username</td>
                        <td>$row->email</td>
                        <td>$row->level</td>
                    </tr>";
                
            }
            ?>
        </tbody>
    </table>    
</div>
</body>
</html>
