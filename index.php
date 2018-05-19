<?php
include './common/navbar.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
    </head>
    <body>

        <?php
            if (isset($_SESSION['message'])){
                echo "<div id = 'message'>" . $_SESSION['message'] . "</div>";
                unset($_SESSION['message']);
            }
        ?>
    </body>
</html>