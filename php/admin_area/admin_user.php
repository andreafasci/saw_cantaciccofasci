<?php
	require_once("../database.php");
	$con = db_connection();
	trim($_POST['email']);
	$email = $_POST['email'];
	$query = "UPDATE users SET admin = true WHERE email = '$email'";
	$result = mysqli_query($con, $query);
	mysqli_close($con);
	header('Location: ../../admin_area.php' );
?>