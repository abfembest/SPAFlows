<?php include 'db_connect.php';

if(isset($_POST['refresh'])){
   

}
$sql = "INSERT INTO olaoluwa.sales (invoice_id, fullname,phone,type, quantity, unit_price, cost, username, transaction_date) SELECT invoice_id, fullname,phone,type, quantity, unit_price,cost, username, transaction_date FROM olaoluwa.temp_sale;INSERT INTO olaoluwa.invoice_table (transaction_date) VALUES (current_timestamp);DELETE FROM olaoluwa.temp_sale";

if (mysqli_multi_query($connect, $sql)) {
    header('Location:../makesales.php');
} else {
    echo "Error completing sales: " . $connect->error;
}

$connect->close();
?>