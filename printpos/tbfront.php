<?php include 'db_connect.php';?>
<table id="example1" class="table table-bordered table-striped" style="background-color: white; font-size: 14px;">
                <thead>
                <tr>
                   <th>Products</th>
                   <th>Types</th>
                  <th>Qauntity in stock</th>
                  <th>Unit Price</th>
                  <th>Product Value</th>
                  <!--<th>Total daily expenses</th>
                  <th>Cash in hand</th>
                  <th>Balance C/D</th>-->
                  
                </tr>
                </thead>
                <tbody>
                <?php
  
    //$dat1 = $_POST['date1'];
    //$dat2 = $_POST['date2'];
    //$produce = $_POST['produce'];
     // formating the dates
      //$date = new DateTime($dat1);
      //$dat1=$date->format('Y-m-d');
      //$date = new DateTime($dat2);
      //$date2 = $date->format('Y-m-d');
   
     
          $sql ="SELECT category, type, quantity, price, transaction_date, (quantity*price) as value
            FROM olaoluwa.products GROUP BY category LIMIT 6";
        $result = $connect->query($sql);
        if ($result-> num_rows >0) {
          while ($row = $result-> fetch_assoc()) {
            echo ("<tr><td><a href='#'>".$row["category"]."</a>"."</td>
                  <td>".$row["type"]."</td>
                 <td>".$row["quantity"]."</td>
                  <td>".$row["price"]."</td>
                  <td>".$row["value"]."</td>              
                  
                  </tr>");
           
  }
       
   
       
  echo "</table>";
  
}

  


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
  



</html>
