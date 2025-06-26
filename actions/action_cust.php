<?php session_start();
include("db_connect.php");
$fullname= filter_input(INPUT_POST, 'fullname');
$phone= filter_input(INPUT_POST, 'phone');
$address= filter_input(INPUT_POST, 'address');
$odebt= filter_input(INPUT_POST, 'odebt');
$username= filter_input(INPUT_POST, 'username');
#$specie= filter_input(INPUT_POST, 'specie');
#$document= filter_input(INPUT_POST, 'document');

if(isset($_POST['submit'])){
 
  //$name = $_FILES['file']['name'];
  //$target_dir = "documents/";
  //$target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  //$extensions_arr = array("jpg","jpeg","png","gif","pdf");

  // Check extension
  //if( in_array($imageFileType,$extensions_arr) )
 
     // Insert record

     $query = "INSERT into olaoluwa.customerlist (fullname, address,phone, odebt,amount, transaction_date) 
              VALUES('$fullname','$address','$phone','$odebt','$odebt',current_date)";
   
     if (mysqli_query($connect,$query)){
    
     // Upload file
    //move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
      echo '<p style="text-align:center;"><img src="uploaded.png" style ="width:300px; height:300px; text-align:center;"><br>';
      echo "Saved.<br>";
      echo '<a href="../necust.php">Go!</a></p>';

  } else {

            $_SESSION["status"]="Error creating the new user: The name already exist.";
            header("Location: ../necust.php");
            exit();
          //echo "Error, Customer cannot be registered or name already exist.";
           //echo'<a href="../necust.php"."".>Go!</a></p>';

      }
}
?>

