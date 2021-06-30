<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName ="clavax";
$conn = mysqli_connect($hostName,$userName,$password,$databaseName);
if(!$conn){
    mysqli_connect_error();
}
else{
}


define("URL","http://localhost/user_system/");
?>
