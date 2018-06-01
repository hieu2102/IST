<?php
$userID = $_POST['queryID'];
header("location: index.php?page=users&userID=".$userID);
?>