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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Library Management System</title>
    <link rel="icon" href="images/logo.png" type="image/icon type">
</head>
<body>

<section class="vh-100">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center text-info mb-5">Log in here</h2>

              <form action="login.php" method="POST">
              <?php if (isset($_SESSION['dataInvalid'])): ?>
				<div class="alert alert-danger alert-dismissible fade show">
				<strong>Oops !</strong>
					<?php 
						echo $_SESSION['dataInvalid']; 
						unset($_SESSION['dataInvalid']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				</div>
			<?php endif ?>
                <div class="form-outline mb-4">
                    <label class="form-label" >Your Username</label>
                  <input type="text" name="usernamelog" class="form-control fs-5" placeholder="username" required/>
                  <!-- <span id="name-error"></span> -->
                  
                </div>


                <div class="form-outline mb-4">
                <label class="form-label">Password</label>
                  <input   type="password" name="passwordlog" placeholder="password" class="form-control fs-5  " required/>
                  <!-- <span id="password-error"></span> -->
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-info text-light btn-block btn-lg gradient-custom-4" name="login">Login</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0 ">D'ont have an account yet? <a href="signup.php"
                    class="fw-bold text-body"><u>Sign up here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    

</body>
</html>