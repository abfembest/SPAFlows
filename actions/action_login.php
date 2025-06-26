<?php session_start();
include 'db_connect.php';
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	die ('Please fill both the username and password field!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $connect->prepare('SELECT id, username, password,user_access,fname FROM perfecttouch.accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
}

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $username, $password, $user_access,$name);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
	if ($_POST['password'] === $password) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $password;
		$_SESSION['user_access'] = $user_access;
		$_SESSION['name'] = $name;

		if ($user_access==1) {

			header('Location: ../front.php');
		}

		elseif ($user_access ==2) {
			header('Location: ../servicesa.php');
		}

		elseif($user_access ==3){
			header('Location: ../servicesa.php');
		}
		elseif (!$password) {
			echo $_SESSION["disabled"] = "Invalid password.";
			header('Location: ../login.php');
		}
		elseif($user_access ==0){
			echo $_SESSION["disabled"] = "This user has been disabled";
			header('Location: ../login.php');
		}
		
		
	 } 
	}	
	 
	 else {
	 	$_SESSION["status"] = "Invalid username / password combination.";
		header('location:../login.php');
	}

$connect->close();
?>
