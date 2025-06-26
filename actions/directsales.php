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

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be emp ty")
	
	//creating connections.
		$sql1 = "SELECT category, type, quantity FROM olaoluwa.products where type='$type'";
		$result = $connect->query($sql1);
  		if ($result-> num_rows >0) {
    	while ($row = $result-> fetch_assoc()) {
    		$totalstock=$row["totalstock"];
    		$quantity1 = $row["quantity"];

    		echo $quantity1;
    		//$egg = ($quantity1-$quantity);
    		if ($quantity1 < $quantity) {
    			echo '<script type="text/javascript">'; 
				echo 'alert("Out of stock, kindly restock, click ok to continue.");'; 
				echo 'window.location.href = "../directsale.php"';
				echo '</script>';
    			# code...
    		}

    		else{

    			$sql="INSERT INTO olaoluwa.temp_sale2 (invoice_id, fullname,phone,type, quantity, unit_price, username, transaction_date) VALUES ( '$invoice_id','$fullname','$phone', '$type','$quantity','$unit_price','$username', current_timestamp)";
					if(mysqli_multi_query($connect, $sql)){
						$_SESSION["status"]="Sold successfully.";
   						header('Location:../directsale.php');
   						exit();

		
   					}

		//if($conn->query($sql)){
			//echo "New record has been inserted successfully.";
		//}
			else{
				echo "Error: ".$sql."<br>".$connect->error;
		}
		}
		}
	}
		$connect->close();

?>