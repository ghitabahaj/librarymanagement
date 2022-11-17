<?php

require 'connection.php' ;

session_start();



if(isset($_POST['login']))               checklogin();

function checklogin(){
    $usernamecheck = $_POST['usernamelog'];
    $passwordcheck  = $_POST['passwordlog'] ;
     global $con;
     $msg="Invalid username or password";
    if (!empty($usernamecheck) || !empty($passwordcheck))
    {
        $sql = "SELECT * from user WHERE username='$usernamecheck' AND password ='$passwordcheck'";
     
    $res = $con->query($sql);
    $count = mysqli_num_rows($res);
    if($count == 1) {
        $_SESSION['profile']=mysqli_fetch_assoc($res);
    
        header("location:dashboard.php");
     }else{ 
        header("location: index.php");
         $_SESSION['dataInvalid']="Invalid Username or Password!";
       
     }}else{
        $_SESSION['dataInvalid']="Invalid Username or Password!";
     }
}


?>