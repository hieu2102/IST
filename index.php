<?php
include 'common/navbar.php';
$USER = $_SESSION['id'];
$USER_LEVEL = mysqli_fetch_object(mysqli_query($conn, "SELECT level from users where id ='$USER'"));
$_SESSION['level'] = $USER_LEVEL->level;
?>

<!DOCTYPE html>
<html>
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