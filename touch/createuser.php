<?php include 'toplinks.php';
?>
<title>PERFECT TOUCH SALON AND SPA SERVICES</title>
<body class="hold-transition register-page" style="background-color:purple;">
<div class="register-box">
  <div class="register-logo">
    <a href="front.php" style="color: white;"><b>Perfecttouch</b>SALOON</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body" style="border-radius: 50%;">
      <p class="login-box-msg">Create a new user</p>
      <P style="color: blue;">
        <?php
          if (isset($_SESSION["status"])) {
            echo $_SESSION["status"];
            echo $_SESSION["uname"];
            echo "<br>";
            echo $_SESSION["passwd"];
            unset($_SESSION["status"]);
              # code...
          }
          elseif (isset($_SESSION["status2"])) {
            echo $_SESSION["status2"];
            unset($_SESSION["status2"]);
            # code...
          }
            # code...
          
        ?>
      </P>

      <form action="actions/action_createuser.php" method="post">
        <div class="input-group mb-3">
         <div class="input-group mb-3"><label for="agreeTerms">Surname:</label>
          <SELECT class="form-control select2"  name ="fname" required >
                          <option ></option>
                        <?php include 'db_connect.php';
                            $query = "SELECT surname FROM perfecttouch.staff";
                            $result = mysqli_query($connect, $query);    
                            while ($row = mysqli_fetch_array($result)){
                            echo "<option value='" .$row['surname']."'>" . $row['surname'] . "</option>";
                             } 
                          ?>
                          
                          </SELECT>
        </div>

        <div class="input-group mb-3"><label for="agreeTerms">First name:</label>
          <SELECT class="form-control select2"  name ="lname" required >
                          <option ></option>
                        <?php include 'db_connect.php';
                            $query = "SELECT fname FROM perfecttouch.staff";
                            $result = mysqli_query($connect, $query);    
                            while ($row = mysqli_fetch_array($result)){
                            echo "<option value='" .$row['fname']."'>" . $row['fname'] . "</option>";
                          }
                          ?>
                          
                          </SELECT>
        </div>
                         
        </div><P>
        </P>
    
        <div class="input-group mb-3">
          <input type="tel" class="form-control" name="phone" required minlength="11" maxlength="11" placeholder="080-1234-1678" pattern="[0-9]{11}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
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
        <div class="input-group mb-3"><label for="agreeTerms">User level :</label>
          <select class="form-control" required name="user_access">
            <option></option>
            <option value="2">
              User
            </option>
            <option value="1">
              Director
            </option>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          </select>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">           
            <button type="submit" class="btn btn-primary btn-block" name="create">Create user</button>
          </div>
          <!-- /.col -->
         
        </div>
      </form>           

      <a href="login.php" class="text-center">I already have an account</a><br>
       <a href="front.php" class="text-center">Cancel</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<?php include 'javascriptlinks.php'; ?>