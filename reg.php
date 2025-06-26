<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    <title>Perfect Touch Salon and SPA</title>
    </head>
<body style="background-image: url('touch/images/spasection.png');background-size: cover; ;">
        
      <div style="background-color: purple; background-image: url('touch/images/plogo.jpg'); background-size: contain; background-repeat: no-repeat;">
        <?php include 'menu1.html';?>
          
        </div>
        <!--container div-->
        <canvas height="1"></canvas>
<section class="content">
  <div class="container" >
<div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title text-center">Welcome to registration page <?php
                    if (isset($_SESSION["status"])) {
                    echo"<p style = 'color:green';>".($_SESSION["status"])."</p>";
                    unset($_SESSION["status"]);
              }
          ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="background-color: whitesmoke;">
            <form class="form-horizontal" action="touch/actions/action_reg.php" enctype='multipart/form-data' method="POST">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Surname</label>
                  <input type="text" name="surname" class="form-control select2" required="required">
                </div>

                <div class="form-group">
                  <label>First name</label>
                  <input type="text" name="fname" class="form-control select2" required="required" style="width: 100%;">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control select2" required="required" style="width: 100%;">
                </div>
                  <div class="form-group">
                  <label>Phone no.:</label>
                  <input type="number" name="phone" class="form-control" maxlength="11" min="0" required="required" pattern="(0-9){11}" placeholder="e.g 08012345678" style="width: 100%;">
                </div>
                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control select2" name="gender" required style="width: 100%;">
                    <option selected="selected"></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nationality</label>
                  <input type="tex" class="form-control select2" name="nationality" required style="width: 100%;">
                    
                </div>
                <div class="form-group">
                  <label>State</label>
                  <input type="text" class="form-control select2" name="state" required style="width: 100%;">
                </div>
                <div class="form-group">
                  <label>Passport:</label>
                  <input type="file" name="passport" class="form-control" maxlength="11" min="0" required="required" pattern="(0-9){11}" placeholder="e.g 08012345678" style="width: 100%;">
                </div>
                <!-- /.form-group -->
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Guarantor's Surname</label>
                  <input type="text" name="gsurname" class="form-control select2" required="required" style="width: 100%;">
                </div>

                <div class="form-group">
                  <label>Guarantor's First name</label>
                  <input type="text" name="gfname" class="form-control select2" required="required" style="width: 100%;">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Guarantor's address</label>
                  <input type="text" name="gaddress" class="form-control select2" required="required" style="width: 100%;">
                </div>
                  <div class="form-group">
                  <label>Guarantor's phone no.:</label>
                  <input type="number" name="gphone" class="form-control" maxlength="11" min="0" required="required" pattern="(0-9){11}" placeholder="e.g 08012345678" style="width: 100%;">
                </div>
                <div class="form-group">
                  <label>Guarantor's Gender</label>
                  <select class="form-control select2" required style="width: 100%;" name="ggender">
                    <option selected="selected"></option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Guarantor's Nationality</label>
                  <input type="text" class="form-control select2" name="gnationality" required style="width: 100%;">
                </div>
                <div class="form-group">
                  <label>Guarantor's state</label>
                  <input type="text" class="form-control select2" name="gstate" required style="width: 100%;">
                </div>
                <div class="form-group">
                  <label>Guarantor's passport:</label>
                  <input type="file" name="gpassport" class="form-control" maxlength="11" min="0" required="required" pattern="(0-9){11}" placeholder="e.g 08012345678" style="width: 100%;">
                </div>
                <div class="form-group">
                <input type="submit" name="submit" class="btn btn-info form-control" style="width: 200px; float: right;">
              <!-- /.col -->
              <!-- /.col -->
            </div>
            </div>
            <!-- /.row -->
              </di>
            </form>
            
        </div>
      </section>
</body>
</html>