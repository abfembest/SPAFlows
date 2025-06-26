<?php session_start();
include 'db_connect.php';
$surname= filter_input(INPUT_POST, 'surname');
$fname= filter_input(INPUT_POST, 'fname');
$address= filter_input(INPUT_POST, 'address');
$phone= filter_input(INPUT_POST, 'phone');
$gender= filter_input(INPUT_POST, 'gender');
$state= filter_input(INPUT_POST, 'state');
$passport= filter_input(INPUT_POST, 'passport');
$nationality= filter_input(INPUT_POST, 'nationality');
$gsurname= filter_input(INPUT_POST, 'gsurname');
$gfname= filter_input(INPUT_POST, 'gfname');
$gaddress= filter_input(INPUT_POST, 'gaddress');
$gphone= filter_input(INPUT_POST, 'gphone');
$ggender= filter_input(INPUT_POST, 'ggender');
$gpassport= filter_input(INPUT_POST, 'gpassport');
$gnationality= filter_input(INPUT_POST, 'gnationality');
if(isset($_POST['submit'])){
 
  $name = $_FILES['passport']['name'];
  $target_dir = "documents/";
  $target_file = $target_dir . basename($_FILES["passport"]["name"]);

  // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 $gpassport = $_FILES['gpassport']['name'];
  $target_dir = "documents/";
  $target_file2 = $target_dir . basename($_FILES["gpassport"]["name"]);

  // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif","pdf");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record

     $query = "INSERT INTO perfecttouch.staff(surname, fname, address, phone, gender, state,nationality, passport, gsurname, gfname, gaddress, gphone, ggender,gnationality, gpassport,regdate)VALUES('$surname','$fname','$address','$phone','$gender','$state','$nationality','$name','$gsurname','$gfname','$gaddress','$gphone','$ggender','$gnationality','$gpassport',current_timestamp)";
          if (mysqli_multi_query($connect,$query)){
  
     // Upload file
      move_uploaded_file($_FILES['passport']['tmp_name'],$target_dir.$name);
      move_uploaded_file($_FILES['gpassport']['tmp_name'],$target_dir.$gpassport);
          echo '<p style="text-align:center;"><img src="uploaded.png" style ="width:300px; height:300px; text-align:center;"><br>';
            echo "Successful<br>";
            echo '<a href="../../reg.php">Go!</a></p>';



  } else {
      echo "Could not save." . $connect->error;
      echo'<a href="../../reg.php">Back</a></p>';

}
 }
} 
?>

