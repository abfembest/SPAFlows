<?php
include("db_connect.php");
$id= filter_input(INPUT_POST, 'id');
$category= filter_input(INPUT_POST, 'category');
$type= filter_input(INPUT_POST, 'type');
$paymethod= filter_input(INPUT_POST, 'paymethod');
$username= filter_input(INPUT_POST, 'username');
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

     $query = "UPDATE perfecttouch.payments SET paymethod ='$paymethod' WHERE id = '$id'";
          if (mysqli_multi_query($connect,$query)){
  
     // Upload file
     //move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
          echo '<p style="text-align:center;"><img src="../images/uploaded.png" style ="width:300px; height:300px; text-align:center;"><br>';
           echo "Stock saved.<br>";
           echo '<a href="../updatepaymthd.php">Back</a></p>';

  } else {
      echo "Could not save.";
      echo'<a href="../servicelists.php">Back</a></p>';

}
 
} 
?>

