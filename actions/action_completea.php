<?php include 'hint.php';
 $name = $_SESSION['name'];
include 'db_connect.php';

if(isset($_POST['refresh'])){
  

}
$sql = "UPDATE perfecttouch.sales SET status = 1 WHERE status = 0 AND username = '$name';INSERT INTO perfecttouch.invoice_table ( username, transaction_date) VALUES ('$name',current_timestamp);UPDATE perfecttouch.accounts SET invoice_id ='' WHERE username = '$name';UPDATE perfecttouch.accounts SET custname ='' WHERE username = '$name';UPDATE perfecttouch.accounts SET type ='' WHERE username = '$name'";

if (mysqli_multi_query($connect, $sql)) {
	
    header('Location:../servicesa.php');
} else {
    echo "Error completing sales: " . $connect->error;
}

$connect->close();
?>