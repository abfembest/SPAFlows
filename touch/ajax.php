<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

include 'db_connect.php';
$query = "SELECT * FROM perfecttouch.products WHERE type = '$q'";
$result = mysqli_query($connect, $query);    

while($row = mysqli_fetch_array($result)) {
?>
 <div class="card card-info" style="width: 100%;">
                  <div class="card-header">
                <h3 class="card-title">Sell your products here</h3>

              </div>
  <form class="form-horizontal" action="actions/action_salesa.php" method="POST">
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
                
                </div>
                

               
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
                
                </div>    
  
                    <?php 
                    $name= $_SESSION['name'];
                      $rowSQL = mysqli_query($connect, "SELECT MAX(id) AS maxid FROM perfecttouch.invoice_table WHERE username = '$name'"); 
                    $row = mysqli_fetch_assoc($rowSQL);

                    $largestUID = $row['maxid']; 
                      
                      ?>
                      
                      <input type="hidden" class = "form-control" readonly="readonly"  width="10" name="invoice_id" value="<?php echo 'inv0'.$largestUID?>">
                    <input type="hidden" name="username" value="<?php echo $_SESSION["name"];?>">
                  <div class="card-footer" style="text-align: center;">
                         
                          <button type="submit" name="submit" class="btn btn-info" style="width: 50%;">Submit</button>
                </div>
                  
                            
  </form>
  <?php
}
mysqli_close($connect);
?>
</body>
</html>