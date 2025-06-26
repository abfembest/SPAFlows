<?php session_start();
include("db_connect.php");
$id= filter_input(INPUT_POST, 'id');
$fullname= filter_input(INPUT_POST, 'fullname');
$phone= filter_input(INPUT_POST, 'phone');
$address= filter_input(INPUT_POST, 'address');
$amount= filter_input(INPUT_POST, 'apaid');
$username= filter_input(INPUT_POST, 'username');
$option= filter_input(INPUT_POST, 'option');
$type= filter_input(INPUT_POST, 'type');
$unit_price= filter_input(INPUT_POST, 'unit_price');
$username= filter_input(INPUT_POST, 'username');
$invoice_id= filter_input(INPUT_POST, 'invoice_id');
$deleted= filter_input(INPUT_POST, 'transaction_date');
$quantity= filter_input(INPUT_POST, 'quantity');
if(isset($_POST['submit'])){
 
  //$name = $_FILES['file']['name'];
  //$target_dir = "documents/";
  //$target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
 //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  //$extensions_arr = array("jpg","jpeg","png","gif","pdf");

  // Check extension
  //if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
        if ($option==0) {
            $sql= "UPDATE olaoluwa.products SET quantity= (quantity+'$quantity')WHERE type = '$type';UPDATE olaoluwa.customerlist SET amount = (amount - '$amount') 
          WHERE fullname='$fullname' AND phone = '$phone';INSERT INTO olaoluwa.deleted_sales (invoice_id, fullname,phone,type, quantity, unit_price, username, transaction_date, deleted_date) VALUES ( '$invoice_id','$fullname','$phone','$type','$quantity','$unit_price','$username','$deleted', current_timestamp);
          DELETE FROM olaoluwa.sales WHERE id = '$id'";

          if (mysqli_multi_query($connect,$sql)){
             header("Location: ../debtsrpt.php");
             exit();
          } 
}elseif ($option==1) {

            $sql= "UPDATE olaoluwa.products SET quantity= (quantity+'$quantity')WHERE type = '$type';
            UPDATE olaoluwa.payments SET apaid = (apaid - '$amount') 
            WHERE fullname='$fullname' AND phone = '$phone' AND transaction_date = current_date;
            INSERT INTO olaoluwa.deleted_sales (invoice_id, fullname,phone,type, quantity, unit_price, username, transaction_date, deleted_date) VALUES ( '$invoice_id','$fullname','$phone','$type','$quantity','$unit_price','$username','$deleted', current_timestamp);
            DELETE FROM olaoluwa.sales WHERE id = '$id'";

          if (mysqli_multi_query($connect,$sql)){
             header("Location: ../debtsrpt.php");
             exit();
        # code...
  # code...
}
}
else {
  echo "Cannot delete";
    exit(); 
}
} 
?>

