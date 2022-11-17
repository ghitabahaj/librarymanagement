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
    <nav>
        <div class="logo-name">
            <div class="logo-image">
            <img src="images/logo.png" alt="logo">
        </div>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href=dashboard.php>
                <i class="uil uil-estate"></i>
                <span class="link-name">Home</span>
                </a>
                </li>
                <li><a href="books.php">
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
        <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        </div>
        <div class="top1 text-center">
        <span class="fs-3"> Hello!  <?php 
         if(isset($_SESSION['profile']))
              echo $_SESSION['profile']['username'];
              ?></span>
        </div>

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
							global $totaluser ;
                            $query = "SELECT * from user";
                            $result = mysqli_query($con,$query);
                             while($row = mysqli_fetch_assoc($result)){
                                     $totaluser++;
                             }
							?>
                        <span class="number"><?php echo " $totaluser " ?></span>
                    </div>
                </div>
            </div>
            
              <div class="activity d-flex justify-content-between">
                  <div class="title">
                     <i class="uil uil-book-open"></i>
                     <span class="text">My Books</span>
                   </div>
                   <div class="ms-auto mx-5 my-5">
					<button class="btn btn-dark  rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-book" ><i class="uil uil-plus text-white" onclick="clearform()"></i>&emsp; Add Book</button>
				</div>
        </div>
              <div class="card-body table-responsive">
                <table class="table table-bordered border-light text-center  ">
                 <tr class="bg-dark text-white">
                    <td>Reference</td>
                    <td>Title</td>
                    <td>Autor</td>
                    <td>Category</td>
                    <td>Realease Date</td>
                    <td>Description</td>
                    <td>Update / Delete</td>
                    <td>Lend the book</td>
                 </tr>
                 <tr>
                 <?php
                 $query = "SELECT * from book";
                 $result = mysqli_query($con,$query);
                  while($row = mysqli_fetch_assoc($result)){
                    $ref=$row['ref'];
                    ?>
                    <td <?php echo ' id="'.$ref.'"  title ="'.$row["title"].'" autor ="'.$row["autor"].'" category ="'.$row["category"].'" date ="'.$row["date"].'" description ="'.$row["description"].'" '  ?> ><?php  echo $row['ref']?> </td>
                    <td><?php  echo $row['title']?> </td>
                    <td><?php  echo $row['autor']?> </td>
                    <td><?php  echo $row['category']?> </td>
                    <td><?php  echo $row['date']?> </td>
                    <td><?php  echo $row['description']?> </td>
                     <td><button  type="submit" name="updatebook" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-book-update" onclick="showinput(<?php echo ''.$ref.' '?>);">Update or Delete</button></td>
                     <td><button  type="submit" name="lendbook" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal-book-lend" onclick="lend(<?php echo ''.$ref.' '?>);">Lend</button></td>
                </tr>
                 <?php
                  }
                 ?>
                </table>
              </div>

</section>
    
<div class="modal fade" id="modal-book">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="scripts.php" method="POST" name="form_add_book">
					<div class="modal-header">
						<h5 class="modal-title">Add New book</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
						
							
							<input type="hidden" id="book-id">
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text" name="titlebook" class="form-control" id="book-title"/>
							</div>
							<div class="mb-3">
								<label class="form-label">Autor</label>
								<input type="text" name="autor" class="form-control" id="book-autor"/>
							</div>
							<div class="mb-3">
								<label class="form-label">Category</label>
                                <input type="text" name="category" class="form-control" id="book-category"/>
							</div>
							<div class="mb-3">
								<label class="form-label">Edition Date</label>
								<input type="date" name="date" class="form-control" id="book-date"/>
							</div>
							<div class="mb-0">
								<label class="form-label">Description</label>
								<textarea class="form-control"  name="description" rows="10" id="task-description"></textarea>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<button type="submit" name="savebook" class="btn btn-primary task-action-btn" id="task-save-btn">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <!-- modal update -->
    <div class="modal fade" id="modal-book-update">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="scripts.php" method="POST" name="form_update">
					<div class="modal-header">
						<h5 class="modal-title">Update Book</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
						
							
							<input type="hidden" id="book-id-update" name="refbook">
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text" name="titlebook" id="title-update" class="form-control" id="book-title"/>
							</div>
							<div class="mb-3">
								<label class="form-label">Autor</label>
								<input type="text" name="autor"  id="autor-update" class="form-control" id="book-autor"/>
							</div>
							<div class="mb-3">
								<label class="form-label">Category</label>
                                <input type="text" name="category" id="category-update" class="form-control" id="book-category"/>
							</div>
							<div class="mb-3">
								<label class="form-label">Edition Date</label>
								<input type="date" name="date" id="date-update" class="form-control" id="book-date"/>
							</div>
							<div class="mb-0">
								<label class="form-label">Description</label>
								<textarea class="form-control"  id="description-update" name="description" rows="10" id="task-description"></textarea>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button  type="submit" name="updatebook" class="btn btn-warning" >Update</button>
                        <button  type="submit" name="deletebook" class="btn btn-danger" >Delete</button>
						
					</div>
				</form>
			</div>
		</div>
	</div>

    <!-- lend modal -->
    <div class="modal fade" id="modal-book-lend">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="scripts.php" method="POST" name="form_lend">
					<div class="modal-header">
						<h5 class="modal-title">Lend Book</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
						
							
							<input type="hidden" id="book-id-lend" name="refbooklend">
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text" name="titlebook" id="title-lend" class="form-control" id="book-title" disabled/>
							</div>
							<div class="mb-3">
								<label class="form-label">Autor</label>
								<input type="text" name="autor"  id="autor-lend" class="form-control" id="book-autor" disabled/>
							</div>
							<div class="mb-3">
								<label class="form-label">Category</label>
                                <input type="text" name="category" id="category-lend" class="form-control" id="book-category" disabled/>
							</div>
							<div class="mb-3">
								<label class="form-label">Name of lender</label>
								<input type="text" name="lender" id="lender" class="form-control" id="lenderid"/>
							</div>
							<div class="mb-0">
								<label class="form-label">Period</label>
								<textarea class="form-control"  name="lendperiod"  id="period"></textarea>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button  type="submit" name="lendbook" class="btn btn-warning" >Lend</button>
                       
						
					</div>
				</form>
			</div>
		</div>
	</div>

<script src="script.js"></script>
</body>
</html>