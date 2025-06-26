<html>
<head>
  <?php include 'hint.php';?>
  <title>Adeola crown farms</title>
  <link rel="stylesheet" type="text/css" href="hidden_print.css">
<style type="text/css">
  th{
    font-size: 12px;
    text-transform: uppercase;
    text-align: top;

  }
</style>
</head>

<body class="hold-transition sidebar-mini" style="background: url('images/background.jpg'); background-size: cover;">
  <?php include 'datatableheader.php';
  include 'db_connect.php';?>
<center>
      <div class="form-group-row" >
        
  <form action="" method="POST" class="form-group" style="margin-top:20px;">
                    
        <span class="btn btn-info">Generate report<button name="search" value="Generate" id="submit1" class="btn btn-info" onclick="show()"><i class="fa fa-search"></i></button></span>          
  </form>
</div>
        <div style="max-width: 1000px; margin:auto;">
          <div class="card">
            <div class="card-header">

              <h2 class="card-title" style = "text-transform: capitalize;"><a href="reportpage.php"><button class="btn btn-info">Back</button></a> <b>
              Adeola farms Currently available Produce reports for today <?php echo date("d/m/Y")?>  <span id="span1">by <?php echo $_SESSION["name"];?></span></b></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="card1" style="">
              <input type="button" name="sales" value="Print." style="float:right;"class="hidden-print" id="btnPrint">
              <table id="example1" class="table table-bordered table-striped" style="background-color: white;">
                <thead>
                <tr>
                   <th>ID</th>
                  <th>PRODUCTS</th>
                  <th>CLASIFICATION</th>
                  <th>CURRENT STOCK</th>
                  <th>Date</th>

                </tr>
                </thead>
                <tbody>
                <?php
  if(isset($_POST['search'])){
      $sql ="SELECT id, product, specie, (quantity) AS qty,transaction_date as sdate
        FROM perfecttouch.product2 GROUP BY specie";
            
      
        $result = $connect->query($sql);
        if ($result-> num_rows >0) {
          while ($row = $result-> fetch_assoc()) {
            //$cash=$row["total_sales"]-$row["expenses"];
            echo ("<tr><td><a href='#'>".$row["id"]."</a>"."</td>
                  <td>".$row["product"]."</td>
                 <td>".$row["specie"]."</td>
                  <td>".$row["qty"]."</td>
                  <td>".$row["sdate"]."</td>
                  </tr>");
           
  }
              
  echo "</table>";
  $sql='SELECT id, product, transaction_date as sdate, sum(quantity) AS qty1 FROM `products` GROUP by product';
        $result = $connect->query($sql);
        if ($result-> num_rows>0) {
          while ($row = $result->fetch_assoc()) {
           $id = $row["id"];
           $product = $row["product"];
           $qty1 = $row["qty1"];
           $date = $row["sdate"];
          }
        
        }
  echo "<hr>";
   
  echo "<tr><h3>The available products are detailed below: <h3></tr>";
 
  echo "<hr>";
}

  else {
    echo "No sales yet.";
 
}
}
//}
//}

  

//}
    $connect->Close();

  //}
  ?>
                </tbody>
                <tfoot>
                <!--<tr>
                  <th>EGGS IN STOCK B/F</th>
                  <th>Eggs produced</th>
                  <th>Eggs sold</th>
                  <th>Eggs Bal B/F</th>
                  <th>Cash in hand</th>
                  <th>Total daily sales</th>
                  <th>Total daily expenses</th>
                  <th>Balance C/F</th>
                  <th>Remarks</th>
                </tr>-->
                </tfoot>
                
              </table>
              <?php include 'smalltable.php';?>

            </div>
            <!-- /.card-body -->
          </div>
          
          <!-- /.card -->
    </div>
    </center>
        <!-- /.col -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <!--<footer class="main-footer">-->
    <!--<div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>-->


<!-- jQuery -->
<?php
include 'datatablefooter.php';?>
      
  </script>
  <script type="text/javascript" src="print.js"></script>
</body>




</html>
