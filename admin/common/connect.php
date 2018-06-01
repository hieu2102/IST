<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'forum';

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn){
    die ("Connection Failed");
}

function alert_msg(string $type, string $string){
    return "<div class = 'alert alert-".$type."' role = 'alert'>
    <p style = 'text-align:center'>"
            .$string.
        "</p>
</div>";
}