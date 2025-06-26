<?php include 'toplinks2.php';
   include 'sidemenu.php' ; 
INCLUDE 'db_connect.php';
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:purple;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: white;">Select product and search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="printpos/reprint.php" style ="color:white;">Reprint</a></li>
              <li class="breadcrumb-item"><a href="makesales.php" style ="color:white;">Product sales</a></li>
              <li class="breadcrumb-item active" style ="color:white;"><a href="necust.php" style ="color:white;">Register customer</a></li>
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
                  <a href="front.php"><button class="btn btn-primary">Back</button></a>
                  <form action="" method="POST">  

                      <span class="form-inline"><label>Name:&nbsp&nbsp&nbsp</label>
                        <select  id="product" name="type" required="required" class="form-control select2">
                        <option style=""></option>
                        <?php
                            $query = "SELECT DISTINCT * FROM perfecttouch.products";
                            $result = mysqli_query($connect, $query);    
                            while ($row = mysqli_fetch_array($result)){
                            echo "<option value='" .$row['type']."'>" . $row['type'] . "</option>";
                             } 
                          ?>
                        </option>
                      </select>
                      <button name = "Search"><i class="fa fa-search"></i></button>
                      <label class="form-inline" style="padding-left: 10px;">Current total sales
                        <?php
                            $query = "SELECT *, SUM(unit_price) AS currentsale, transaction_date FROM perfecttouch.sales WHERE transaction_date = current_date";
                            $result = mysqli_query($connect, $query);    
                            while ($row = mysqli_fetch_array($result)){
                            $sales=$row["currentsale"];
                            echo " ₦".($sales);
                             } 
                          ?>
                      </label>
                    <!--<label class="form-inline" style="padding-left: 10px;">Current Cash paid                        <?php
                            #$query = "SELECT SUM(apaid) AS currentsale, transaction_date FROM olaoluwa.payments WHERE transaction_date = current_date";
                            #$result = mysqli_query($connect, $query);    
                            #while ($row = mysqli_fetch_array($result)){
                            #$sales=$row["currentsale"];
                            #echo " ₦".($sales);
                             #} 
                          ?>
                      </label>-->
                    </span> 
                     <span>
                      <?php 
                      if (isset($_SESSION["status"])) {
                        echo $_SESSION["status"]; 
                        unset($_SESSION["status"]);
                      # code...
                    }
                    ?></span> 

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
                    $type = $_POST['type'];

                     $query = "SELECT * FROM perfecttouch.products  where type='$type'";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                  <div class="card card-info" style="width: 100%;">
                  <div class="card-header">
                <h3 class="card-title">Sell your products here</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="actions/action_sales.php" method="POST">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Service </label>
                    <div class="col-sm-4">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="type" required="required" readonly value="<?php echo $row['type'];?>" >
                    </div>
                  </div>
                  <div class="col-sm-4">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="Price?" id="Brand" name="unit_price" class="wide" min="0" required="required" readonly step="any"  value="<?php echo $row['price'];?>">
                    </div> 
                </div>
                
                    <!--<label for="inputEmail3" class="col-sm-4 col-form-label">Address </label>-->
                    <!--<div class="col-sm-8">-->
               
              
                    <!--<div class="col-sm-8">
                      <div>
                         <SELECT class="form-control" name ="type" required>
                          <option selected></option>
                        <?php
                            #$query = "SELECT price FROM perfecttouch.products";
                            #$result = mysqli_query($connect, $query);    
                            #while ($row = mysqli_fetch_array($result)){
                            #echo "<option value='" .$row['price']."'>" . $row['price'] . "</option>";
                             } 
                          ?>
                          </SELECT>
                    </div>
                  </div>--> 
                </div>
                

                <!--<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Cost</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="Price?" id="Brand" name="unit_price" min="0" required="required" step="any" >
                    </div>
                  </div> 
                </div>-->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Cust. details: </label>
                    <div class="col-sm-4">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="fullname" class="wide" min="0" required="required">
                    </div>
                  </div>
                  <div class="col-sm-4">
                      <div>
                      <input type="Phone" class="form-control" id="inputEmail3" placeholder="Phone number" name="phone" class="wide" min="0" required="required">
                    </div>
                  </div> 
                </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Staff</label>
                  <div class="col-sm-8">
                      <div>
                         <SELECT class="form-control select2" name ="staff" required>
                          <option selected></option>
                        <?php
                            $query = "SELECT fname FROM perfecttouch.staff";
                            $result = mysqli_query($connect, $query);    
                            while ($row = mysqli_fetch_array($result)){
                            echo "<option value='" .$row['fname']."'>" . $row['fname'] . "</option>";
                             } 
                          ?>
                          </SELECT>
                    </div>
                  </div> 
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Staff</label>
                  <div class="col-sm-8">
                      <div>
                         <SELECT class="form-control select2" name ="paymethod" required>
                          <option selected></option>
                          <option>cash</option>
                          <option>transfer</option>
                          <option>cash and transfer</option>
                        
                          </SELECT>
                    </div>
                  </div> 
                </div>
                </div>    
  
                    <?php 
                    $name= $_SESSION['name'];
                      $rowSQL = mysqli_query($connect, "SELECT MAX(id) AS maxid FROM perfecttouch.invoice_table WHERE username = '$name'"); 
                    $row = mysqli_fetch_assoc($rowSQL);

                    $largestUID = $row['maxid']; 
                      
                      ?>
                      
                      <input type="hidden" class = "form-control" readonly="readonly"  width="10" name="invoice_id" value="<?php echo 'inv0'.$largestUID?>">
                    <input type="hidden" name="username" value="<?php echo $_SESSION["name"];?>">
                  <div class="card-footer">
                         
                          <button type="submit" name="submit" class="btn btn-info" style="width: 100%;">Click to sell</button>
                </div>
                            
  </form>
  </div>
</div>

  

  <?php
}
#}
                  
  //$connect->Close();
  ?>
  
                  
                
            </div>

              </div>
              <!-- /.card-body 
              <div class="card-footer">
                Sales module...
              </div>
              /.card-footer
            </div>
             /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="col-md-10">
                
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <a href="actions/action_complete.php" style="float: right; padding-left: 2px;"> <input type="   button" name="refresh" value="Complete services" class="btn btn-danger"> 
                  </a>
                  <a href="payment.php" style="float: right; padding-left: 2px;"> <input type="   button" name="refresh" value="payment" class="btn btn-info"> 
                  </a>  
                  
                   

                <h3 class="card-title">Sales lists</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      
                       
                      <!-- text input -->
                      
                        <?php INCLUDE 'printpos/diretbl.php'; 
                              include 'javascriptlinks.php';
                        ?>
                     
                    </div>
                  </div>
         
         </div>  
         </div>   
      </div>
    </div>
  </div>