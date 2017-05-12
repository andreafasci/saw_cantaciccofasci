<?php
	require_once("../database.php");
	session_start();
	if(isset($_POST['old_name']) && isset($_POST['new_name']) && isset($_SESSION['email']) && isset($_SESSION['name'])){
		$con = db_connection();
		trim($_POST['new_name']);
		trim($_POST['old_name']);
		$new_name = $_POST['new_name'];
		$old_name = $_POST['old_name'];
		$email = $_SESSION['email'];
		$query = "UPDATE users SET name = '$new_name' WHERE name = '$old_name' AND email = '$email'";
		$result = mysqli_query($con, $query);
		$_SESSION['name'] = $new_name;
		header('Location: ../../my_area.php' );
	}
	else{
		header('Location: ../../my_area.php' );
	}
?>