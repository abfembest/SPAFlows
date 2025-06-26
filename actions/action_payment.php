<?php session_start();
include("db_connect.php");
$invoice_id= filter_input(INPUT_POST, 'invoice_id');
$amount= filter_input(INPUT_POST, 'amount');
$paymethod= filter_input(INPUT_POST, 'paymethod');
$username= filter_input(INPUT_POST, 'username');
$custname = filter_input(INPUT_POST, 'custname');
$type = filter_input(INPUT_POST, 'type');
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

            $query = "INSERT into perfecttouch.payments (type,username, invoice_id, custname, amount,paymethod, transaction_date) VALUES('$type','$username','$invoice_id','$custname','$amount','$paymethod',current_date);UPDATE perfecttouch.accounts SET payment = (payment - '$amount') 
          WHERE username='$username'";
          if (mysqli_multi_query($connect,$query)){
//Mail to md
           
      $to = "jobukabray@gmail.com";
            $subject = "Payment made for transaction";
            $body ="Transction :".$type. "
                    Amount :".$amount. "
                    Posted by :".$username. " 
                    Payment method :".$paymethod."
                    Customer's name :".$custname."

                  jobukng.com/login.php";
            $header = "From: JOBUKNG.com";
 
            if ( mail($to, $subject, $body, $header)) {
              echo("Success");
           } else {
              echo("Failed");
              header("Location: ../service.php");
           }
          
  
     // Upload file
     //move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
          $_SESSION["status"]="Payment made.";
  
          header("Location: ../printpos/directreceipta.php");
          exit();
          } 
          
            # code..
        }

else {
  $_SESSION["status2"]="Payment could not be made.";
     header("Location: ../servicesa.php");
    exit(); 
} 
?>

