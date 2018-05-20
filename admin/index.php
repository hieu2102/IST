<?php
include 'common/adminNav.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
</head>
<body>
<?php
if (isset($_SESSION['message'])) {
    echo "<div id = 'message'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include 'page/'. $page.'.php';
}

?>
</body>
</html>