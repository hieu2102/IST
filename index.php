<?php
include 'common/navbar.php';
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <div class = 'container'>
        <?php
            if (isset($_SESSION['message'])){
                echo "<div id = 'message'>".$_SESSION['message']."</div>";
                unset($_SESSION['message']);
            }

            if(isset($_GET['page'])){
                $page=$_GET['page'];
                include 'page/'.$page.'.php';
              }else{
                  include 'page/forum.php';
              }
              
            
        ?>
        </div>
    </body>
</html>