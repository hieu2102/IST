<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "forum";
//Create Connection
$conn = mysqli_connect($host, $username, $password, $db);
if (!$conn){
    echo "Failed to Connect";
}

//function for showing alert message to user
//type: the type of alert
//string: the content of the message
function alert_msg($type,$string){
    return "<div class = 'alert alert-".$type."' role = 'alert'>
    <p style = 'text-align:center'>"
            .$string.
        "</p>
</div>";
}
?>