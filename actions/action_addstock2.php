<?php 
include("db_connect.php");
$category= filter_input(INPUT_POST, 'category');
$type= filter_input(INPUT_POST, 'type');
$quantity= filter_input(INPUT_POST, 'quantity');
$price= filter_input(INPUT_POST, 'price');
$description= filter_input(INPUT_POST, 'description');
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

     $query = "INSERT into perfecttouch.product (type,quantity, price,username, transaction_date) 
              VALUES('$type','$quantity','$price', '$username', current_date);UPDATE perfecttouch.product2 SET quantity = (quantity + '$quantity') 
          WHERE type = '$type';UPDATE perfecttouch.product2 SET price = '$price' 
          WHERE type = '$type';UPDATE perfecttouch.product2 SET price = '$price' 
          WHERE type = '$type'UPDATE perfecttouch.product2 SET username ='$username' WHERE  type = '$type'";
          if (mysqli_multi_query($connect,$query)){
  
     // Upload file
     //move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
          echo '<p style="text-align:center;"><img src="../images/uploaded.png" style ="width:300px; height:300px; text-align:center;"><br>';
           echo "Stock saved.<br>";
           echo '<a href="../addstocks.php">Back</a></p>';

  } else {
      echo "Could not save.";
      echo'<a href="../addstocks.php">Back</a></p>';

}
 
} 
?>

