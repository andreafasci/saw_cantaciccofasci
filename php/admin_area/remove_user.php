<?php
	session_start();
	trim($_POST['email']);
	$email = $_POST['email'];
	if(isset($_SESSION['email']))
		if($_SESSION['email'] == $email){
			header('Location: ../../admin_area.php' );
			exit;
		}
	require_once("../database.php");
	$con = db_connection();
	$query = "DELETE FROM users WHERE email = '$email'";
	$result = mysqli_query($con, $query);
	mysqli_close($con);
	header('Location: ../../admin_area.php' );
?>