<?php
	require_once("../database.php");
	session_start();
	if(isset($_POST['old_mail']) && isset($_POST['new_mail']) && isset($_SESSION['email'])){
		$con = db_connection();
		trim($_POST['new_mail']);
		trim($_POST['old_mail']);
		$new_mail = $_POST['new_mail'];
		$old_mail = $_POST['old_mail'];
		$query = "UPDATE users SET email = '$new_mail' WHERE email = '$old_mail'";
		$result = mysqli_query($con, $query);
		$_SESSION['email'] = $new_mail;
		header('Location: ../../my_area.php' );
	}
	else{
		header('Location: ../../my_area.php' );
	}
?>