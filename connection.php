<?php

$host="localhost";
$user="root";
$pass="";
$db="index";

$conn = mysqli_connect($host,$user,$pass,$db);

if($conn)
{
    
}
else
{
    echo "connection failed".mysqli_connect_error();
}

?>