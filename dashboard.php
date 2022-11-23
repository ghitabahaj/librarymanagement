<?php
	require 'connection.php';
    require 'login.php';
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="dash.css" />
    <title>Library Management System</title>
</head>

<body>
    <div class="d-flex shadow-sm bg-light" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 fs-4 fw-bold text-uppercase border-bottom"><i
                    class="uil uil-book fs-4 me-2"></i>Library <br>  <span class="fs-3 mycolor "> Hello! <?php 
                       if(isset($_SESSION['profile']))
                           echo $_SESSION['profile']['username'];
                         ?>
                      </span> </div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action  text-secondary "><i
                        class="uil uil-tachometer-fast fs-4 me-2"></i>dashboard</a>
                <a href="books.php" class="list-group-item list-group-item-action   fw-bold"><i
                        class="uil uil-books me-2 fs-4" ></i>Books</a>
                <a href="lended.php" class="list-group-item list-group-item-action  fw-bold"><i
                        class="uil uil-books me-2 fs-4" ></i> Lended Books</a>        
                <a href="#" class="list-group-item list-group-item-action   fw-bold"><i
                        class="uil uil-user me-2 fs-4"></i>Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action  text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 ">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left mycolor fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0"> Admin Dashboard</h2>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-4">
                        <div class="p-3 box shadow-sm d-flex justify-content-around align-items-center rounded-pill">
                        <i class="uil uil-books fs-1 text-light "></i>
                            <div>
                            <?php 
							global $total ;
                            $total=0;
                            $query = "SELECT * from book";
                            $result = mysqli_query($con,$query);
                             while($row = mysqli_fetch_assoc($result)){
                                     $total++;
                             }
							?>
                                <h3 class="fs-2 text-white"><?php echo " $total " ?></h3>
                                <p class="fs-5 text-white">All Books</p>
                            </div>                  
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 box shadow-sm d-flex justify-content-around align-items-center rounded-pill">
                        <i class="uil uil-books fs-1 text-light "></i>
                            <div>
                            <?php 
							global $lend ;
                            $query = "SELECT * from lendedb";
                            $result = mysqli_query($con,$query);
                             while($row = mysqli_fetch_assoc($result)){
                                     $lend++;
                             }
							?>
                                <h3 class="fs-2 text-white"><?php echo " $lend " ?></h3>
                                <p class="fs-5 text-white">Out Books</p>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 box shadow-sm d-flex justify-content-around align-items-center rounded-pill"> 
                            <i class="uil uil-users-alt fs-1 text-light "></i>
                            <div>
                            <?php 
							global $user ;
                            $query = "SELECT * from user";
                            $result = mysqli_query($con,$query);
                             while($row = mysqli_fetch_assoc($result)){
                                     $user++;
                             }
							?>
                                <h3 class="fs-2 text-white"><?php echo " $user " ?></h3>
                                <p class="fs-5 text-white">Users</p>
                            </div>
                           
                        </div>
                    </div>

                
                </div>
<!-- table -->
<div>
    <div class="activity d-flex mt-5 ">
        <div class="title col-6">
           <i class="uil uil-book-open fs-3"></i>
           <span class="text fs-5 ">Recent Books</span>
         </div>
         <div class="title col-6">
         <i class="uil uil-users-alt fs-3 "></i>
         <span class="text fs-5">Recent Users</span>
         </div>
         
</div>
<div class="d-flex">
    <div class="card-body table-responsive col-6">
                <table class="table table-bordered border-light text-center table-hover ">
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
                <table class="table table-bordered border-light text-center table-hover  ">
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

    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>