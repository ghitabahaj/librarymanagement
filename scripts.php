<?php 


    require 'connection.php';
   

    if(isset($_POST['saveuser']))                 saveUser();
    if(isset($_POST['savebook']))                 saveBook();
    if(isset($_POST['updatebook']))               updateBook();
    if(isset($_POST['deletebook']))               deleteBook();
    if(isset($_POST['lendbook']))                 lendBook();
    if(isset($_POST['deletelended']))               deletelended();

    function saveUser(){
    $username = $_POST['username1'];
    $email  = $_POST['email1'] ;
    $password = $_POST['password1'];
    $number = $_POST['number1'];
    $birthday = $_POST['birthday1'];

     global $con;
    $sql = "INSERT INTO user (username,email ,password ,number ,birthday) VALUES ('$username' ,'$email','$password','$number','$birthday') ";
    if (mysqli_query($con, $sql)) {
        $_SESSION['message'] = "User has been added successfully !";
        header('location: index.php');
      }

   
}



function saveBook(){
    $titlebook = $_POST['titlebook'];
    $autor  = $_POST['autor'] ;
    $category = $_POST['category'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    global $con;
    $sql = "INSERT INTO book (title,autor ,category ,date ,description) VALUES ('$titlebook' ,'$autor','$category','$date','$description') ";
    if (mysqli_query($con, $sql)) {
        $_SESSION['message'] = "Book has been added successfully !";
        header('location: books.php');
      }


}


function updateBook(){

  $ref = $_POST['refbook'];
  $titlebook = $_POST['titlebook'];
  $autor  = $_POST['autor'] ;
  $category = $_POST['category'];
  $date = $_POST['date'];
  $description = $_POST['description'];
  global $con;

  $sql = " UPDATE book SET title= '$titlebook' , autor = '$autor' , category = '$category' , date = '$date' ,  description = '$description' WHERE ref=$ref";
  if (mysqli_query($con, $sql)) {
    $_SESSION['message'] = "Book has been updated successfully !";
    header('location: books.php');
  }



}

function deleteBook(){
  $ref = $_POST['refbook'];

  global $con;

  $sql = "DELETE FROM book WHERE ref=$ref";

  if (mysqli_query($con, $sql)) {
      $_SESSION['message'] = "Book has been deleted successfully !";
      header('location:books.php');
      }

}

function lendBook(){
  $ref1 = $_POST['refbooklend'];
  $lender1 = $_POST['lender'];
  $period1 = $_POST['lendperiod'];
  global $con;
  $sql = "INSERT INTO `lendedb`(`ref`, `namelender`, `period`) VALUES ('$ref1','$lender1' ,'$period1')";
  if (mysqli_query($con, $sql)) {
      $_SESSION['message'] = "Book has been lended successfully !";
      header('location:books.php');
    }

  }


  function deletelended(){
    $id = $_POST['idlended'];
    global $con;

  $sql = "DELETE FROM lendedb WHERE idl=$id";
  if (mysqli_query($con, $sql)) {
    $_SESSION['message'] = "Book has been deleted successfully !";
    header('location:lended.php');
    }


  }

?>