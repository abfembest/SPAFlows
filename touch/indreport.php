<?php include 'hint.php'; ?>
<html>
<head>
  <title>PERFECT TOUCH SALON AND SPA SERVICES STAFF PERFORMANCE REPORTS</title>
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
      <div>
        
  <form action="" method="POST">
        <span class="hidden-print btn btn-info"><label class="hidden-print" style="color: white">From:</label> <input type="Date" required="required" class="btn btn-info" id="date01" name="date1" placeholder="Enter Date to Search" >
        <label class="hidden-print" style="color: white">To:</label><input type="Date" required="required" id="date02" name="date2" class="btn btn-info" placeholder="Enter Date to Search">
        <button name="search" value="Generate" id="submit1" class="btn btn-info" onclick="show()"><i class="fa fa-search"></i></button>
      </span>          
  </form>
</div>
        <div style="max-width: 1000px; margin-top: 4px;">
          <div class="card">
            <div class="card-header">

              <h2 class="card-title"><a href="reportpage.php"><button class="btn btn-info">Back</button></a> <b>Staff performance reports for today  <span id="span1"><script type="text/javascript">
                var dat = new Date();
                var dat1 = dat.toLocaleDateString();
                document.write(dat1);
              </script></span>  <span> generated by <?php echo $_SESSION["name"];?></span></b></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="card1" style="">
              <input type="button" name="sales" value="Print." style="float:right;"class="hidden-print" id="btnPrint">
              <table id="example1" class="table table-bordered table-striped" style="font-size: 14px; font-weight: bold;">
                <thead>
                <tr>
                   <th>Names</th>
                   <th>No. of Services</th>
                  <th>Total sales</th>
                  <th>Contribution (%)</th>
                 <!--<th>Total daily expenses</th>
                  <th>Cash in hand</th>
                  <th>Balance C/D</th>-->
                  <th>Date</th>

                </tr>
                </thead>
                <tbody>
                <?php
  if(isset($_POST['search'])){
    $dat1 = $_POST['date1'];
    $dat2 = $_POST['date2'];
    //$produce = $_POST['produce'];
     // formating the dates
      $date = new DateTime($dat1);
      $dat1=$date->format('Y-m-d');
      $date = new DateTime($dat2);
      $date2 = $date->format('Y-m-d');
          

          $sql ="SELECT sum(quantity) as qty, sum(unit_price) price, count(type) as allserv, transaction_date,username, Sum(unit_price) as value
            FROM perfecttouch.sales
            WHERE transaction_date  BETWEEN '$dat1' AND '$dat2'";
        $result = $connect->query($sql);
        if ($result-> num_rows >0) {
          while ($row = $result-> fetch_assoc()) {
            $tsales = $row["value"];
            $tserv = $row['allserv'];
            
           
  }
     }  
     
          $sql ="SELECT sum(quantity) as qty, count(type) as service, transaction_date,username,staff, Sum(unit_price) as value
            FROM perfecttouch.sales
            WHERE transaction_date  BETWEEN '$dat1' AND '$dat2' GROUP BY staff order by value DESC";
        $result = $connect->query($sql);
        if ($result-> num_rows >0) {
          while ($row = $result-> fetch_assoc()) {
                $indsales = $row["value"];
                $contrib = (($indsales/$tsales)*100);
                $econtrib=number_format($contrib, 2, '.', '');
                $totalcontribution = 100.00;

            echo ("<tr><b><td><a href='#'>".$row["staff"]."</a>"."</td>
                    <td>".$row["service"]."</td>
                  <td>".$row["value"]."</td>
                 <td>".$econtrib."</td>             
                  <td>".$row["transaction_date"]."</td>
                  </b></tr>");
           
  }  echo "<tr><td>Total</td><td>".$tserv."</td><td>".$tsales."</td><td>".$totalcontribution."</td><td></td></tr>";
     }  
    # code...
   
  
       
  echo "</table>";
  
  echo "<tr><th></th><td></td><th><b>Remarks</b></th>
          <td> <b>---------------</b></td></tr>";
 

 
  echo "</table>";
  echo "</div>";
  echo "<hr>";
}

  else {
    echo "No sales yet.";
 
}


  

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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- jQuery -->
<?php include 'datatablefooter.php';?>
<script type="text/javascript">
     function show() {
      document.getElementById("card1").style.display="block";
    }
      
  </script>
  <script src="print.js"></script>
</body>




</html>
