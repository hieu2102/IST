<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "forum";
//Create Connection
$conn = mysqli_connect($host, $username, $password, $db);
if (!$conn){
    //force connection
    $conn = mysqli_connect($host, $username, $password, "forum");
}
?>