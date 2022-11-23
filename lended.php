<?php
	require 'connection.php';
    include 'login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dash.css">
    <link rel="icon" href="images/logo.png" type="image/icon type">

    <title>Library Management System</title>
</head>
<body>
<div class="d-flex bg-white" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4  fs-4 fw-bold text-uppercase border-bottom"><i
                    class="uil uil-book fs-4 me-2"></i>Library  <br> <span class="fs-3 mycolor"> Hello! <?php 
                       if(isset($_SESSION['profile']))
                           echo $_SESSION['profile']['username'];
                         ?>
                      </span> </div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action "><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="books.php" class="list-group-item list-group-item-action fw-bold"><i
                        class="uil uil-books me-2 fs-4" ></i>Books</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent  fw-bold"><i
                        class="uil uil-books me-2 fs-4" ></i>Lended Books</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent fw-bold"><i
                        class="uil uil-user me-2 fs-4"></i>Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
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
							global $total;
                            $total=0;
                            $query = "SELECT * from book";
                            $result = mysqli_query($con,$query);
                             while($row = mysqli_fetch_assoc($result)){
                                     $total++;
                             }
							?>
                                <h3 class="fs-2 text-white"><?php echo " $total " ?></h3>
                                <p class="fs-5  text-white">All Books</p>
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
                                <h3 class="fs-2  text-white"><?php echo " $user " ?></h3>
                                <p class="fs-5 text-white">Users</p>
                            </div>
                           
                        </div>
                    </div>

                
                </div>
<!-- table -->
<div>
    <div class="activity  mt-5 d-flex justify-content-between mb-3">
        <div class="title col-6">
           <i class="uil uil-book-open fs-3"></i>
           <span class="text fs-5 ">Lended Books</span>
         </div>
</div>
<div class="d-flex">
    <div class="card-body table-responsive col-6">
                <table class="table table-bordered border-light text-center table-hover ">
                 <tr class="bg-dark text-white">
                    <td>Reference</td>
                    <td>id</td>
                    <td>Title</td>
                    <td>Autor</td>
                    <td>Category</td>
                    <td>Name of Lender</td>
                    <td>Period</td>
                    <td>About Book</td>
                


                 </tr>
                 <tr>
                 <?php
                 $query = "SELECT * from lendedb  JOIN book ON lendedb.ref = book.ref ";
                 $result = mysqli_query($con,$query);
                  while($row = mysqli_fetch_assoc($result)){
                    $id=$row['idl'];
                    ?>
                    <td <?php echo ' id="'.$id.'"  title ="'.$row["title"].'" autor ="'.$row["autor"].'" category ="'.$row["category"].'" lender ="'.$row["namelender"].'" period ="'.$row["period"].'" '  ?> ><?php  echo $row['ref']?> </td>
                    <td><?php  echo $row['idl']?> </td>
                    <td><?php  echo $row['title']?> </td>
                    <td><?php  echo $row['autor']?> </td>
                    <td><?php  echo $row['category']?> </td>
                    <td><?php  echo $row['namelender']?> </td>
                    <td><?php  echo $row['period']?> </td>
                     <td><button  type="submit" name="info" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#modal-book-info" onclick="showinfo(<?php echo ''.$id.' '?>);">About</button></td>
        
                    </tr>
                 <?php
                  }
                 ?>
            
                </table>
              </div>
              </section>

   
    
<div class="modal fade" id="modal-book-info">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="scripts.php" method="POST" name="infobook">
					<div class="modal-header">
						<h5 class="modal-title">About This Book</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
						
							
							<input type="hidden" id="book-id-lend" name="idlended">
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text" name="titlebook" class="form-control" id="book-title-lend" disabled/>
							</div>
							<div class="mb-3">
								<label class="form-label">Autor</label>
								<input type="text" name="autor" class="form-control" id="book-autor-lend" disabled/>
							</div>
							<div class="mb-3">
								<label class="form-label">Category</label>
                                <input type="text" name="category" class="form-control" id="book-category-lend" disabled/>
							</div>
							<div class="mb-3">
								<label class="form-label">Name of Lender</label>
								<input type="text" name="lender " class="form-control" id="book-lender" disabled/>
							</div>
							<div class="mb-0">
								<label class="form-label">Period</label>
								<textarea class="form-control"  name="Period" rows="3" id="periodlend" disabled></textarea>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button  type="submit" name="deletelended" class="btn btn-danger" >Delete</button>

					</div>
				</form>
			</div>
		</div>
	</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>


</body>
</html>