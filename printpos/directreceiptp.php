<?php include 'hint.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="postable.css">
        <title>Receipt</title>
    </head>
    <body style=" font-size: 15px;text-align: center; font-style: bold;"><b>
        <div class="ticket">
            <img src="plogo.jpg" alt="Logo" style="margin-left: 10px;"><br>
            <p class="centered"><I>Perfect Touch Salon and SPA </I>
                <br>Osun mall Oshogbo,Osun State, Nigeria
                <div style="text-align: center;font-size: 10px;">
                 Printed: <script type="text/javascript">
                var dat = new Date();
                var dat1 = dat.toLocaleDateString();
                document.write(dat1);
              </script>
                    <?php
                    
                    $name = $_SESSION["name"];

                     include 'db_connect.php';
 
 $sql = "SELECT invoice_id,transaction_date FROM perfecttouch.products_sales WHERE status = 0 AND username = '$name' LIMIT 1";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {
          $date = $row["transaction_date"];
      ?>

       <?php echo  'rctno'.": " .$row['invoice_id']." " ." ".' '.$name." ".'Tdate: '.$date.'</p>'; ?> 
     </div>
  <?php                 
}
} 
?>
<?php
    $connect->Close();

  ?>


            <table style="text-align: center;">
                    <tr>
                       <th class="description">Qty</th>
                        <th class="description">Description</th>                  
                        <th class="price">₦</th>
                        <th class="description">Cost</th>
                    </tr>
                    <?php
                    include 'db_connect.php';
 $sql = "SELECT invoice_id, custname, type, quantity, unit_price, (quantity*unit_price) AS selling_price, transaction_date  FROM perfecttouch.products_sales  WHERE status = 0 AND username = '$name'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {?>

      <tr>
          <td class=""><?php echo $row['quantity']; ?></td>
          <td class="description"><?php echo $row['type']; ?></td>
          <td class="price"><?php echo $row['unit_price']; ?></td>
          <td class="description"><?php echo $row['selling_price']; ?></td>
      </tr> 

             <?php                 
            }
            } 

              ?>
             <?php
            $sql = "SELECT quantity, custname, unit_price, SUM(quantity*unit_price) AS Amount, SUM(quantity)AS total_quantity FROM perfecttouch.products_sales WHERE status = 0 AND username = '$name'";
            $result = $connect->query($sql);
            if ($result-> num_rows >0) {
              while ($row = $result-> fetch_assoc()) {
                $custname = $row["custname"];
                ?>

            <tr><td colspan='2'><?php echo "Total qty: ".$row["total_quantity"]."</td><td colspan='2'>Amount: ".' '.'₦'.$row["Amount"] ."</td>";?>
            </tr>

            

            </table>

            <hr>
            
                    <?php

                    echo "Dear ". $custname;

                ?>

            <?php
            }
            #}
            }
            #}
            #}
            #}                 
            #}
            #} 
            ?>
            <?php
            
                $connect->Close();

              ?>

              <hr>
              
            <p style="margin-top: 0px; font-size: 15px;">Thanks for your patronage!
                <br>07031178555</p>
            <button id="btnPrint" class="hidden-print">Print</button>
        <script src="postable.js"></script>
        <a href="../makesalesa.php"><button id="back" class="hidden-print"><i class="fa fa-left">Back</a></button>
          <p><b>Developed by Ab-ray Tech. 08130589812; abfembest@gmail.com</b></p>
      </div>

        
        
        
      </div>
    </a>
    
    </body>

</html>
<script type="text/javascript">
  const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});
</script>