<?php
include 'common/adminNav.php';
$USER = $_SESSION['id'];
$USER_LEVEL = mysqli_fetch_object(mysqli_query($conn, "SELECT level from users where id ='$USER'"));
$_SESSION['level'] = $USER_LEVEL->level; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body class="p-3 mb-2 bg-dark text-white">

<div class = 'container'>
<?php
if (isset($_SESSION['message'])) {
    echo "<div id = 'message'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include 'page/'. $page.'.php';
}
if (isset($_GET['function'])){
    $function = $_GET['function'];
    include 'function/'.$function.'.php';
}


?>
</div>
</body>
</html>