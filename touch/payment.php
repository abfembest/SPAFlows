<?php include 'toplinks.php';
INCLUDE 'db_connect.php';

    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background: url('images/background.jpg'); background-size: cover;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: white;">Select product and search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" style ="color:white;">Home</a></li>
              <li class="breadcrumb-item"><a href="expenses.php" style ="color:white;">Expenses</a></li>
              <li class="breadcrumb-item active" style ="color:white;">Fixed Layout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-10">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <a href="makesales.php"><button class="btn btn-primary">Back</button></a>
                  <form action="" method="POST">  

                      <span class="form-inline"><label>Customer:&nbsp&nbsp&nbsp</label>
                        <select  id="product" name="product" required="required" class="form-inline">
                        <option style=""></option>
                        <?php
                            $query = "SELECT DISTINCT fullname,amount FROM olaoluwa.customerlist WHERE amount>0 ";
                            $result = mysqli_query($connect, $query);    
                            while ($row = mysqli_fetch_array($result)){
                            echo "<option value='" .$row['fullname']."'>" . $row['fullname'] . "</option>";
                             } 
                          ?>
                        </option>
                      </select>
                      <button name = "Search"><i class="fa fa-search"></i></button>
                    </span>
                    <?php if (isset($_SESSION["paystatus"])) {

                      echo "<b style = 'color:red;'>".$_SESSION["paystatus"]."</b>";
                      unset($_SESSION["paystatus"]);
                      # code...
                    } ?>
                  </form> 
                 
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">

            <div class="row">
               <div class="col-sm-12">
           
              <?php
                  if(isset($_POST['Search'])){
                    $product = $_POST['product'];

                     $query = "SELECT * FROM olaoluwa.customerlist  where fullname='$product'";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                  <div class="card card-info">
                  <div class="card-header">
                <h3 class="card-title">Payment here</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="actions/action_payment.php" enctype='multipart/form-data' method="POST">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Name </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="fullname" class="wide" min="0" required="required" readonly value="<?php echo $row['fullname']; ?>" >
                    </div>
                  </div> 
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Phone </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="phone" class="wide" min="0" required="required" readonly value="<?php echo $row['phone']; ?>" >
                    </div>
                  </div> 
                </div>


                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Outstanding</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="How many units?" id="Brand" name="outstanding" class="wide" min="0" required="required" step="any" value="<?php echo $row['amount'];?>">
                    </div>
                  </div> 
                </div>
                <input type="hidden" name="address" value="<?php echo $row['address'];?>">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="Price per Kilo" id="Brand" name="apaid" class="wide" min="0" required="required" >
                    </div>
                  </div> 
                </div>
                
                </div>   
                
                    
                    <input type="hidden" name="username" value="<?php echo $_SESSION["name"] ?>">
                  <div class="card-footer">
                         
                          <button type="submit" name="submit" class="btn btn-info" style="width: 100%;">Click to save</button>
                </div>
                            
  </form>
  </div>
</div>

  <!--<div class="col-md-6">
                
           
            <div class="card card-warning">
              <div class="card-header">
                
                <h3 class="card-title">Preview</h3>
              </div>
              /.card-header 
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      text input
                      
                        <?php #INCLUDE 'printpos/postable2.php'; ?>
                     
                    </div>
                  </div>
         
         </div>   
      </div>
    </div>-->

  <?php
}

  }                
  //$connect->Close();
  ?>
  

                  
                
            </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Sales module...
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper-->
