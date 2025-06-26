<?php session_start();
include 'db_connect.php';

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
	$id = $_GET['id'];
	$name = $_SESSION['name'];
	//load amount from payment table
		$sql = "SELECT * FROM perfecttouch.accounts WHERE username = '$name'";
		  $result = $connect->query($sql);
		  if ($result-> num_rows >0) {
		    while ($row = $result-> fetch_assoc()){
		    	$payment = $row["payment"];


		    }
		}
		$sql = "SELECT * FROM perfecttouch.sales WHERE id = '$id'";
		  $result = $connect->query($sql);
		  if ($result-> num_rows >0) {
		    while ($row = $result-> fetch_assoc()){
		    	$unit_price = $row["unit_price"];
		    }
		}
			if ($payment<$unit_price) {

				echo '<script type="text/javascript">'; 
				echo 'alert("Cannot delete transaction already paid for , click ok to continue.");'; 
				echo 'window.location.href = "../servicesa.php"';
				echo '</script>';

				# code...
			}elseif($payment>=$unit_price){
		$sql="UPDATE perfecttouch.accounts SET payment= (payment-'$unit_price') WHERE username='$name';DELETE FROM perfecttouch.sales WHERE id = '$id'";
		if(mysqli_multi_query($connect, $sql)){

			echo '<script type="text/javascript">'; 
		echo 'alert("The transaction was deleted and stock was reconciled, click ok to continue.");'; 
		echo 'window.location.href = "../servicesa.php"';
		echo '</script>';

} 
}

		
		else{
			echo "Error: ".$sql."<br>".$connect->error;
		}
		$connect->close();

?>