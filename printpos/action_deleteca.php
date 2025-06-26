<?php session_start();
include 'db_connect.php';

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
			$id = $_GET['id'];
			$name = $_SESSION["name"];
			$sql= "SELECT *, (quantity*unit_price) AS cost FROM perfecttouch.products_sales WHERE id = '$id'";
				$result = $connect->query($sql);
		  		if ($result-> num_rows >0) {
		    	while ($row = $result-> fetch_assoc()) {
			$invoice_id = $row["invoice_id"];
    		$product = $row["type"];
    		$quantity = $row["quantity"];
    		$unit_price = $row["unit_price"];
    		$username = $row["username"];
    		$transaction_date = $row["transaction_date"];
    		$cost = $row["cost"];
    	}
    			$sql= "SELECT * FROM perfecttouch.payments WHERE username = '$name'";
				$result = $connect->query($sql);
		  		if ($result-> num_rows >0) {
		    	while ($row = $result-> fetch_assoc()) {

		    			$payment = $row["payment"];

		    	}

		   if ($payment<$cost) {

		   	$_SESSION["status2"]="Cannot delete, payment value may be set to negataive.";
    		 header("Location: ../makesalesa.php");
		   	# code...
		   }
		   elseif($payment>=$cost){ 

				$sql="UPDATE perfecttouch.product2 SET quantity= (quantity+'$quantity') WHERE type = '$product';DELETE FROM perfecttouch.products_sales WHERE id = '$id';UPDATE perfecttouch.accounts SET payment = (payment-$cost) WHERE username = '$username'";
					if(mysqli_multi_query($connect, $sql)){
					$_SESSION["status"]= "The transaction was deleted and stock was reconciled.";
					header('location:../makesalesa.php');
					exit();

			}

} 


		//if($conn->query($sql)){
			//echo "New record has been inserted successfully.";
		}
		else{
			echo "Error: ".$sql."<br>".$connect->error;
		}
	}
		$connect->close();

?>