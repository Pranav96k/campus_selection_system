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

	$sql = "SELECT id_user, firstname, lastname, email FROM users WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		//Output data
		while($row = $result->fetch_assoc()) {
			$_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['id_user'] = $row['id_user'];

			if(isset($_SESSION['callFrom'])) {
				$location = $_SESSION['callFrom'];
				unset($_SESSION['callFrom']);
				header("Location: " . $location);
				exit();
			}

			else {
				header("Location: index.php");
				exit();
			}

		}
	} else {
		$_SESSION['loginError'] = true;
		header("Location: login.php");
		exit();
	}

	$conn->close();

} else {

	header("Location: login.php");
	exit();
}