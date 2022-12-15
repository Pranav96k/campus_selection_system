<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
//If user Actually clicked register button
if(isset($_POST)) {
	//Escape Special Characters In String First
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
	
	//sql query to check if email already exists or not
	$sql = "SELECT email FROM company WHERE email='$email'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$newPass = $newpassword;
		//Encrypt Password
		$password = base64_encode(strrev(md5($newPass)));
		//sql new registration insert query
		$sql = "UPDATE company SET password='$password' WHERE email='$email'";
		if($conn->query($sql)===TRUE) {

			$_SESSION['passwordChanged'] = $newPass;
			header("Location: company-login.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
		//if email found in database
		$_SESSION['emailNotFoundError'] = true;
		header("Location: companyforgot-password.php");
		exit();
	}
	//Close database connection. Not compulsory but good practice.
	$conn->close();
} else {
	//redirect them back to forgot-password.php page if they didn't click Forgot Password button
	header("Location: companyforgot-password.php");
	exit();
}