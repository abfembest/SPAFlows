<?php session_start();
include 'db_connect.php';
$fname= filter_input(INPUT_POST, 'fname');
$lname= filter_input(INPUT_POST, 'lname');
$password= filter_input(INPUT_POST, 'password');
$phone= filter_input(INPUT_POST, 'phone');
$access= filter_input(INPUT_POST, 'user_access');


if(isset($_POST['create'])){
   


$sql = "INSERT INTO perfecttouch.accounts(username, fname,lname, phone, password, user_access, transaction_date) VALUES ('$fname', '$fname','$lname','$phone','$password','$access',current_timestamp)";

if (mysqli_multi_query($connect, $sql)) {
	$_SESSION["status"]="Successfully registered, kindly note the following:";
	$_SESSION["uname"]= "username :" .($fname);
	$_SESSION["passwd"]= "Password :" .($password);
	header("Location: ../createuser.php");
	exit();
} 

	# code...



else {
	$_SESSION["status2"]="error creating the new user: The username  or phone number already exist.";
    header("Location: ../createuser.php");
    exit();
}
}
$connect->close();
?>