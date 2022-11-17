<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="library";
global $con;
// create connection 
$con = mysqli_connect($servername,$username,$password,$dbname);
if(mysqli_connect_errno()){
    echo " Failed to connect!";
    exit();
}

?>