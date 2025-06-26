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

$cost = $quantity*$unit_price;

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be emp ty")
	
	//creating connections.
$sql1 = "SELECT category, type, quantity, sum(quantity) as totalstock FROM perfecttouch.product2 where type='$type'";
		$result = $connect->query($sql1);
  		if ($result-> num_rows >0) {
    	while ($row = $result-> fetch_assoc()) {
    		$totalstock=$row["totalstock"];
    		$quantity1 = $row["quantity"];
    		//$egg = ($quantity1-$quantity);
    		if ($quantity1 < $quantity) {
    			echo '<script type="text/javascript">'; 
				echo 'alert("Out of stock, kindly restock, click ok to continue.");'; 
				echo 'window.location.href = "../makesalesa.php"';
				echo '</script>';
				
				
    			# code...
    		}

    		else{

    			$sql="INSERT INTO perfecttouch.products_sales (invoice_id,type, quantity, unit_price, cost, username, custname, transaction_date) VALUES ( '$invoice_id', '$type','$quantity','$unit_price','$cost','$username','$fullname', current_timestamp); UPDATE perfecttouch.product2 SET quantity = (quantity-$quantity) WHERE type = '$type';UPDATE perfecttouch.accounts SET payment = (payment+$cost)WHERE username = '$username';UPDATE perfecttouch.accounts SET invoice_id = '$invoice_id' WHERE username = '$username';UPDATE perfecttouch.accounts SET custname = '$fullname' WHERE username = '$username';UPDATE perfecttouch.accounts SET type = '$type' WHERE username = '$username'";
					if(mysqli_multi_query($connect, $sql)){
						$_SESSION["status"]="Sold successfully.";
   						header('Location:../makesalesa.php');
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