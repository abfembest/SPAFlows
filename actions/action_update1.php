<?php session_start();
include("db_connect.php");
$jod= filter_input(INPUT_POST, 'jod');
$salary= filter_input(INPUT_POST, 'salary');
$id = filter_input(INPUT_POST,'id');
if(isset($_POST['submit'])){

 
     // Insert record
   $sql= "SELECT CODE FROM jobunyeu_jobuk.products WHERE code = '$code'";
            $result = $connect->query($sql);
              if ($result-> num_rows >0) {
              while ($row = $result-> fetch_assoc()) {
                  $code1 = $row["code"];
                  
              }
            if($code1==$code){
                
                echo "Code already exists..";
                
            }else{

     $query = "UPDATE perfecttouch.staff SET jod = '$jod'
          WHERE id='$id';UPDATE perfecttouch.staff SET salary = '$salary'
           WHERE id='$id';UPDATE perfecttouch.staff SET updated = current_date 
           WHERE id='$id'";
          if (mysqli_multi_query($connect,$query)){
  
     // Upload file
          $_SESSION["status"]="Updated.";
              header('Location:../stafflist.php');
              exit();


  } else {
      echo "Could not save.";
      echo'<a href="../stafflist.php">Back</a></p>';

}
 }
 elseif(isset($_POST['disaproval'])){

$query = "DELETE FROM perfecttouch.staff WHERE id='$id'";
          if (mysqli_multi_query($connect,$query)){
  
     // Upload file
          $_SESSION["status1"]="Removed.";
              header('Location:../stafflist.php');
              exit();


  } else {
      echo "Could not disaprove.";
      echo'<a href="../stafflist.php">Back</a></p>';

}
 } 
?>

