<?php

echo "welcome to our database </br>";

$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password);
if (!$conn){
    die("sorry connection was not establish".mysqli_connect_error());
}
else{
    echo "connection establish";
}
?>