<?php include 'sidemenu.php';  
INCLUDE 'db_connect.php';
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#302b63;">
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
              <li class="breadcrumb-item"><a href="addstocks.php" style ="color:white;">Add stocks</a></li>
              <li class="breadcrumb-item active" style ="color:white;"><a href="newstocks.php" style ="color:white;">New stocks</a></li><?php 
                      if (isset($_SESSION["bkstatus"])) {
                        echo "<button type='button' class='btn btn-success toastsDefaultSuccess'>".$_SESSION['bkstatus']."</button>"; 
                        unset($_SESSION['bkstatus']); 
                        
                      # code...
                    }
                    ?>
             
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

                  <form action="" method="POST">  

                      <span class="form-inline"><label>Name:&nbsp&nbsp&nbsp</label>
                        <select  id="product" name="type" required="required" class="form-control select2">
                        <option style=""></option>
                        <?php
                            $query = "SELECT DISTINCT type FROM perfecttouch.product2";
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
                            $query = "SELECT *, SUM(quantity*unit_price) AS currentsale, transaction_date FROM perfecttouch.sales WHERE transaction_date = current_date";
                            $result = mysqli_query($connect, $query);    
                            while ($row = mysqli_fetch_array($result)){
                            $sales=$row["currentsale"];
                            echo " ₦".($sales);
                             } 
                          ?>
                      </label>
                    
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
                    $fullname = $_POST['type'];

                     $query = "SELECT * FROM perfecttouch.product2  where type='$fullname'";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                  <div class="card card-info" style="width: 100%;">
                  <div class="card-header">
                <h3 class="card-title">Sell your products here</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="actions/action_productsales.php" method="POST">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Product </label>
                    <div class="col-sm-8">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="type" class="wide" min="0" required="required" readonly value="<?php echo $row['type'];?>" >
                    </div>
                  </div> 
                </div>
                
      
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">List prices </label>
                    <div class="col-sm-4">
                      <div>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" id="Brand" name="unitp" required="required" readonly value="<?php echo $row['price'];?>" >
                    </div>
                  </div>
                  <div class="col-sm-4">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="Price?" id="Brand" name="whslp" class="wide" min="0" required="required" readonly step="any"  value="<?php echo $row['wholesaleprice'];?>">
                    </div> 
                </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Unit sales?</label>
                    <div class="col-sm-8">
                      <div>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">No</label><input type="radio" class="col-sm-1 col-form-label" onclick="msg()" name="option" value="0" required="required" id="rady1" >
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Yes</label><input type="radio" class="col-sm-4 col-form-label" onclick="msg()" name="option" value="1" required="required" id="rady" >
                        <input type="number" id="qty" name="qty" style="display: none;" placeholder="Wholesale number?" min="0">
                      
                      
                    </div>
                  </div> 
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Quantity</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="How many units?" id="Brand" name="quantity" class="wide" min="0" required="required" step="any" >
                    </div>
                  </div> 
                </div>
                <!--<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Weight</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="kilogram?" id="Brand" name="weight" class="wide" min="0" required="required" >
                    </div>
                  </div> 
                </div>-->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Price</label>
                    <div class="col-sm-8">
                      <div>
                      <input type="number" class="form-control" id="inputEmail3" placeholder="Price per Kilo" id="Brand" name="unit_price" class="wide" min="0" required="required" >
                    </div>
                  </div> 
                </div>
                <!--<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Payment Method:</label>
                    <div class="col-sm-8">
                      <div>
                         <SELECT class="form-control" name ="payment_method" required>
                          <option selected></option>
                          <option value="cash">Cash</option>
                          <option value="transfer">Transfer</option>
                          <option value="both">Cash and Transfer</option>
                          <option value="cheque">Cheque</option>
                          </SELECT>
                    </div>
                  </div> 
                </div>-->   
                </div>    
  
                    <?php 
                      $name1 =$_SESSION['name'];
                      $rowSQL = mysqli_query($connect, "SELECT MAX(id) AS maxid FROM perfecttouch.invoice_table where username ='$name1'"); 
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
}
                  
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
                <a href="actions/action_completep.php" style="float: right; padding-left: 2px;"> <input type="   button" name="refresh" value="Complete sales" class="btn btn-danger"> 
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
                      
                       <div class="ticket" style="width:100%;">
                  <b><?php echo"Current sales". " @ ";

                     //'Cashier: '. $_SESSION["name"];
                  echo date('d-m-Y')." ";
                  $name = $_SESSION["name"];
              $sql = "SELECT invoice_id FROM perfecttouch.products_sales WHERE username= '$name' AND status =0 LIMIT 1";
              $result = $connect->query($sql);
              if ($result-> num_rows >0) {
              while ($row = $result-> fetch_assoc()) {?>

       <br><?php echo  'Rctno'.": " .$row['invoice_id']." " ." "; ?> </div>
  <?php                 
}
}   


                  ?></b>
   <table class="table table-stripped"style="width:100%;">
    <tbody style="width:100%;">
      <tr>
                        <th class="description">Qty.</th>
                        <th class="description">Description</th>
                        <th class="description">Unit price</th>                  
                        <th class="description">Cost</th>
                        <th class="description">Actions</th>

                    </tr>                  
    <?php
                    
 $sql = "SELECT id, invoice_id, type, quantity, unit_price,cost FROM perfecttouch.products_sales WHERE username= '$name' AND status =0";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {?>


      <tr>
          <td class="description"><?php echo $row['quantity']; ?></td>
          <td class="description"><?php echo $row['type']; ?></td>
          <td class="price"><?php echo $row['unit_price']; ?></td>
          <td class="description"><?php echo $row['cost']; ?></td>
          <td class="description"><a href="printpos/action_deletec.php?id=<?php echo $row['id'];
          ?>" class="btn btn-danger" id="delete">Delete</a></td>

          
      </tr> 

             <?php

            }
            } 

              ?>
             <?php 

            $sql = "SELECT id, quantity, unit_price, SUM(cost) AS Amount, SUM(quantity)AS total_quantity FROM perfecttouch.products_sales WHERE username= '$name' AND status =0";
            $result = $connect->query($sql);
            if ($result-> num_rows >0) {
              while ($row = $result-> fetch_assoc()) {?>

      </div>

            <tr><td colspan='2'><?php echo "quantity ".$row["total_quantity"]."<td colspan='3'>Amount ".'='.'₦'.$row["Amount"] ;?>
            </tr>

            </table>

            
            <?php            
            }
            } 
            ?>
            <?php
            
                $connect->Close();

              ?>
         <td class="description"><a href ="printpos/productreceipt.php" name = "print">print invoice</a></td>   
            
            </tbody>
</div>
                     
                    </div>
                  </div>
         
         </div>   
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function msg() {
      var radio1 = document.getElementById("rady1");
      var radio2 = document.getElementById("rady");
  // Get the output text
      var text = document.getElementById("qty");
      if (radio2.checked == true){
          text.style.display = "block";
      }else if (radio1.checked == true) {
            text.style.display = "none";
  }
}
      // body...
    

  </script>

  <script type="text/javascript" src="toast.js"></script>

  <?php include 'javascriptlinks.php'; ?>
  <!-- /.content-wrapper-->
