<?php
//pagination
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
    if ($pageno <= 0) {
        $pageno = 1;
    }
} else {
    $pageno = 1;
}
$record_per_page = 10;
$offset = ($pageno - 1) * $record_per_page;
$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT id from users where level = 'banned'"));
$total_page = ceil($total_records / $record_per_page);

//show all users
$query = "SELECT
id, username, email, level
from users
where level = 'banned'
order by level desc
limit ".$offset.",10";
$list = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ban List</title>
</head>
<body>

<br><br>
    <table class = 'table table-hover'>
            <thead class="thead-dark">
            <tr class ='table-primary'>
                <td>ID</td>
                <td>Username</td>
                <td>Email</td>
                <td>Unban</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_object($list)){ ?>
                    <tr>
                        <td><?=$row->id?></td>
                        <td><?=$row->username?></td>
                        <td><?=$row->email?></td>
                        <td>
                            <form method = "POST" action="index.php?function=user-set-level&userID=<?=$row->id?>">
                            <input type="hidden" name = 'level' value = "normal">
                            <input type="submit" class = 'btn btn-primary' name = 'submit' value = "Unban" >
                            </form>
                        </td>
                    </tr>
           <?php }
            ?>
        </tbody>
    </table>    
    <nav>
  <ul class="pagination">
    <li><a class = 'page-link' href="index.php?page=banlist&pageno=<?=$pageno - 1?>">Previous</a></li>
    <li class="page-item"><a class="page-link" href="index.php?page=banlist&pageno=1">1</a></li>
    <li class="page-item"><a class="page-link" href="index.php?page=banlist&pageno=2">2</a></li>
    <li class="page-item"><a class="page-link" href="index.php?page=banlist&pageno=3">3</a></li>
    <li class="page-item"><a class="page-link" href="index.php?page=banlist&pageno=<?=$pageno + 1?>">Next</a></li>
  </ul>
</nav>
</body>
</html>
