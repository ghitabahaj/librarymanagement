<?php
	require 'connection.php';
    require 'login.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="dash.css">
    <link rel="icon" href="images/logo.png" type="image/icon type">

    <title>Library Management System</title>
</head>
<body>
    <nav class="" >
        <div class="logo-name">
            <div class="logo-image">
            <img src="images/logo.png" alt="logo">
        </div>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                <i class="uil uil-estate"></i>
                <span class="link-name">Home</span>
                </a>
                </li>
                <li><a href=books.php>
                <i class="uil uil-books"></i>
                <span class="link-name">Books</span>
                </a>
                </li>
                <li><a href="#">
                <i class="uil uil-user"></i>
                <span class="link-name">Profile</span>
                </a>
                </li>
                <li><a href="logout.php">
                <i class="uil uil-signout"></i>
                <span class="link-name">Log out</span>
                </a>
                </li>


            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <!-- <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        </div> -->
       
        <span class="fs-3 text-center"> Hello! <?php 
         if(isset($_SESSION['profile']))
              echo $_SESSION['profile']['username'];
              ?>
         </span>
        

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Dashboard</span>
                </div>
                <div class="boxes">
                    <div class="box">
                        <i class="uil uil-books"></i>
                        <span class="text">Total Books</span>
                        <?php 
							global $total ;
                            $query = "SELECT * from book";
                            $result = mysqli_query($con,$query);
                             while($row = mysqli_fetch_assoc($result)){
                                     $total++;
                             }
							?>
                        <span class="number"><?php echo " $total " ?></span>
                    </div>

                    <div class="box">
                        <i class="uil uil-books"></i>
                        <span class="text">Out Books</span>
                        <?php 
							global $lend ;
                            $query = "SELECT * from lendedb";
                            $result = mysqli_query($con,$query);
                             while($row = mysqli_fetch_assoc($result)){
                                     $lend++;
                             }
							?>
                        <span class="number"><?php echo " $lend " ?></span>
                    </div>

                    <div class="box">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">Total Users</span>
                        <?php 
							global $user ;
                            $query = "SELECT * from book";
                            $result = mysqli_query($con,$query);
                             while($row = mysqli_fetch_assoc($result)){
                                     $user++;
                             }
							?>
                        
                        <span class="number"><?php echo " $user " ?></span>
                    </div>
                </div>
            </div>
            <div>
              <div class="activity d-flex  ">
                  <div class="title col-6">
                     <i class="uil uil-book-open"></i>
                     <span class="text">Recent Books</span>
                   </div>
                   <div class="title col-6">
                   <i class="uil uil-users-alt "></i>
                   <span class="text">Recent Users</span>
                   </div>
                   
        </div>
<!-- first table -->
<div class="d-flex">
    <div class="card-body table-responsive col-6">
                <table class="table table-bordered border-light text-center  ">
                 <tr class="bg-dark text-white">
                    <td>Reference</td>
                    <td>Title</td>
                    <td>Autor</td>
                    <td>Category</td>
                    <td>Realease Date</td>
                    <td>Description</td>

                 </tr>
                 <tr>
                 <?php
                  global $con;
                 $query = "SELECT *
                 FROM book
                 LIMIT 5";
                 $result = mysqli_query($con,$query);
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <td><?php  echo $row['ref']?> </td>
                    <td><?php  echo $row['title']?> </td>
                    <td><?php  echo $row['autor']?> </td>
                    <td><?php  echo $row['category']?> </td>
                    <td><?php  echo $row['date']?> </td>
                    <td><?php  echo $row['description']?> </td>
                    
                  
                </tr>
                 <?php
                  }
                 ?>
                </table>
              </div>
<!-- second table -->
<div class="card-body table-responsive col-6">
                <table class="table table-bordered border-light text-center  ">
                 <tr class="bg-dark text-white">
                    <td>Username</td>
                    <td>email</td>
                    <td>number</td>
                 </tr>
                 <?php
                  global $con;
                 $query = "SELECT *
                 FROM user
                 LIMIT 3";
                 $result = mysqli_query($con,$query);
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <td><?php  echo $row['username']?> </td>
                    <td><?php  echo $row['email']?> </td>
                    <td><?php  echo $row['number']?> </td>
                </tr>
                 <?php
                  }
                 ?>
                
              
                </table>
              </div>

</div>
              </section>


<script src="script.js"></script>

</body>



</html>