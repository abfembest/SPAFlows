<?php
include 'db_connect.php';

//if(!empty($card_no)||(!empty($firstname)||(!empty($mothername)||!empty($pphone)||!empty($age)||!empty($dob)||(!empty($teacher)){
	//die("Fill the required fields they cannot be empty")
	
	//creating connections.
	$id = $_GET['id'];
	

		$sql="DELETE FROM perfecttouch.sales WHERE id = '$id'";
		if(mysqli_multi_query($connect, $sql)){

			echo '<script type="text/javascript">'; 
		echo 'alert("The transaction was deleted and stock was reconciled, click ok to continue.");'; 
		echo 'window.location.href = "../services.php"';
		echo '</script>';

} 


		//if($conn->query($sql)){
			//echo "New record has been inserted successfully.";
		//}
		else{
			echo "Error: ".$sql."<br>".$connect->error;
		}
		$connect->close();

?>