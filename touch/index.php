<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perfect Touch Salon and SPA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('images/plogo.jpg'); background-size:center; background-blend-mode: color-burn;">
<h2 class="text-center" style="font-weight: bolder;font-family:fantasy; color: purple;">Perfect Touch Salon and SPA Osun State, Nigeria</h2>
<div class="login-box">
  <div class="login-logo">
  </div>
  
  <!-- /.login-logo -->
  <div class="card" style = "opacity: 90%; border-radius: 50px;">
    <div class="card-body login-card-body" style="background-color:; border-radius: 50px;">
      <p class="login-box-msg" style="color: white;">Log on with your details</p>
      <?php 
        if (isset($_SESSION["status"])) {
          echo "<p style ='color: red;'>". $_SESSION["status"]."</p>";
          unset($_SESSION['status']);
        }

        elseif (isset($_SESSION["disabled"])) {
          echo "<p style ='color: red;'>". $_SESSION["disabled"]."</p>";
          unset($_SESSION['disabled']); 
        }
   ?>

      <form action="actions/action_login.php" method="post">
        <div class="input-group mb-3">
          <input type="username" class="form-control" placeholder="username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <label for="remember" style="color: white;">
               Click sign in
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-block" style="background-color:purple; color: white;" >Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="../index.php" class="btn btn-block" style="background-color:purple; color: white;">
          <i class="fa fa-home"></i> Click to go home
        </a>
        <!--<a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>-->
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="../reg.php" class="text-center" style=" color: green;">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>

</div>
<b><i>Developed by Ab-ray Tech. 08130589812; abfembest@gmail.com</i></b>

<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
