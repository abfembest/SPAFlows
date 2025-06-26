<?php session_start();
include 'db_connect.php';
$product= filter_input(INPUT_POST, 'product');
$quantity= filter_input(INPUT_POST, 'quantity');
$fullname= filter_input(INPUT_POST, 'fullname');
$address= filter_input(INPUT_POST, 'address');
$phone= filter_input(INPUT_POST, 'phone');
$type= filter_input(INPUT_POST, 'type');
$unit_price= filter_input(INPUT_POST, 'unit_price');
$username = filter_input(INPUT_POST, 'username');
$invoice_id= filter_input(INPUT_POST, 'invoice_id');
$specie= filter_input(INPUT_POST, 'specie');
$total_instock= filter_input(INPUT_POST, 'total_instock');
$option= filter_input(INPUT_POST, 'option');
$qty = filter_input(INPUT_POST, 'qty');
$staff = filter_input(INPUT_POST, 'staff');
$paymethod = filter_input(INPUT_POST, 'paymethod');

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be emp ty")
	
	//creating connections.


    			$sql="INSERT INTO perfecttouch.sales (invoice_id, fullname,phone,type, staff, quantity, unit_price, username, paymethod, transaction_date) VALUES ( '$invoice_id','$fullname','$phone', '$type','$staff','$quantity','$unit_price','$username', '$paymethod', current_timestamp);UPDATE perfecttouch.accounts SET payment = (payment+'$unit_price') WHERE username = '$username';UPDATE perfecttouch.accounts SET invoice_id = '$invoice_id' WHERE username = '$username';UPDATE perfecttouch.accounts SET custname = '$fullname' WHERE username = '$username';UPDATE perfecttouch.accounts SET type = '$type' WHERE username = '$username'";
					if(mysqli_multi_query($connect, $sql)){
						$_SESSION["status"]="Sold successfully.";
   						header('Location:../servicesa.php');
   						exit();

		
   					}

		//if($conn->query($sql)){
			//echo "New record has been inserted successfully.";
		//}
			else{
				echo "Error: ".$sql."<br>".$connect->error;
		
		
		
	}
		$connect->close();

?>