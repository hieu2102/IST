<?php
//show all users
$list = mysqli_query(
    $conn, "SELECT
    id, username, email, level
    from users
    where level != 'banned'
    order by level desc"
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
    <table class = 'table table-hover'>
            <thead class="thead-dark">
            <tr class ='table-primary'>
                <td>ID</td>
                <td>Username</td>
                <td>Email</td>
                <td>Level</td>
                <td>Ban</td>
                <td>Set Admin</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_object($list)){ ?>
                    <tr>
                        <td><?=$row->id?></td>
                        <td><?=$row->username?></td>
                        <td><?=$row->email?></td>
                        <td><?=$row->level?></td>
                        <td>
                        <?php if ($row->level !='banned'){ ?>
                        <form method = "POST" action="index.php?function=user-set-level&userID=<?=$row->id?>">
                            <input type="hidden" name = 'level' value = "banned">
                            <input type="submit" class = 'btn btn-danger' name = 'submit' value = "Ban" >
                        </form>
                        <?php } ?>
                        <td> 
                        <?php if ($row->level =='normal'){ ?>
                            <form method = "POST" action="index.php?function=user-set-level&userID=<?=$row->id?>">
                            <input type="hidden" name = 'level' value = "admin">
                            <input type="submit" class = 'btn btn-primary' name = 'submit' value = "Set Admin" >
                            </form>
                        <?php } ?>

                        <?php if ($row->level == 'admin'){ ?>
                            <form method = "POST" action="index.php?function=user-set-level&userID=<?=$row->id?>">
                            <input type="hidden" name = 'level' value = "normal">
                            <input type="submit" class = 'btn btn-info' name = 'submit' value = "Unset Admin" >
                            </form>
                        <?php } ?>
                        </td>
                    </tr>
                
           <?php }
            ?>
        </tbody>
    </table>    
</body>
</html>
