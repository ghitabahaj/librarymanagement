<?php
	require 'connection.php';
    require 'scripts.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css" />
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
              <h2 class="text-uppercase text-warning text-center mb-5">Create an account</h2>

              <form action="scripts.php" method="POST" name="signupform" id="mysignupform" data-parsley-validate >

                <div class="form-outline mb-4">
                  <label class="form-label">Your Username</label>
                  <input type="text"  class="form-control fs-5 " id="username1" name="username1" placeholder="username" required/>
                  <!-- <p class="text-danger" id="erroruser">Please Enter a Valid Username</p> -->
                         
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" >Your Email</label>
                  <input type="email"  class="form-control fs-5 " id="email1" name="email1" placeholder="email"  required data-parsley-type="email"	/>          
                  <!-- <p class="text-danger" id="erroremail">Please Enter a Valid Email</p> -->
                </div>

                <div class="form-outline mb-4">
                 <label class="form-label" >Your Birthday</label>
                  <input type="date"  class="form-control fs-5 " id="birth1" name="birthday1"  placeholder="birthday" required />                 
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" >Your number</label>
                  <input type="number"  class="form-control fs-5 " id="number1" name="number1" placeholder="number" required/>
                </div>

                <div class="form-outline mb-4">
                 <label class="form-label" >Password</label>
                  <input type="password"  class="form-control fs-5 " id="pass1" name="password1" placeholder="password" required/>
                  <!-- <p class="text-danger" id="errorpass">Please Enter a Valid Password</p> -->
                </div>



                <div class="d-flex justify-content-center">
                  <button type="submit" name="saveuser"
                    class="btn btn-warning btn-block btn-lg gradient-custom-4 text-body" id="signup-btn" >Sign up</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="index.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- javascript -->
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="parsley.js"></script>
</body>
</html>