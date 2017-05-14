<?php
	session_start();
	if(!isset($_SESSION['rm_report'])){
		header('Location: ../../admin_area.php' );
		exit;
	}
	else{
		require_once("../database.php");
		$con = db_connection();
		trim($_SESSION['rm_report']);
		$id = $_SESSION['rm_report'];
		$query = "DELETE FROM reports WHERE is = '$is'";
		$result = mysqli_query($con, $query);
		mysqli_close($con);
		unset($_SESSION['rm_report']);
		header('Location: ../../admin_area.php' );
	}
?>