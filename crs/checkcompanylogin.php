<?php 
session_start();
require_once("db.php");

//If user clicked login button 
if(isset($_POST)) {

	// Escape special characters in string

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//Encrypt Password 
	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT id_company, companyname, email FROM company WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		//Output data
		while($row = $result->fetch_assoc()) {
			$_SESSION['name'] = $row['companyname'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['id_user'] = $row['id_company'];
			$_SESSION['companyLogged'] = true;
			header("Location: company/dashboard.php");
			exit();

		}
	} else {
		$_SESSION['loginError'] = true;
		header("Location: company-login.php");
		exit();
	}

	$conn->close();

} else {

	header("Location: company-login.php");
	exit();
}