<?php
session_start();
if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}
require_once("../db.php");
if(isset($_GET)) {
	$sql = "DELETE FROM company WHERE id_company='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: company.php");
		exit();
	} else {
		echo "Error";
	}
}