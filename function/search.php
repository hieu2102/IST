<?php
$userID = $_POST['queryID'];
header("location: index.php?page=profile&userID=".$userID);
?>