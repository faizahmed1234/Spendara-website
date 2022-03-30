<?php
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server,$username,$password);
if (!$con){
    die("Server connection failed". mysqli_connect_error());
}


?>