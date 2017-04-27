<!DOCTYPE html> 

<html> 

<head> 
  <link rel="stylesheet" href="loader-1.css">
  <meta http-equiv="refresh" content="3; url=my_area.php" />
  <title>Redirect</title> 
</head>

<body>
	<?php 
	session_start();
	if(isset($_SESSION['remember_me'])){
  		setcookie('login',password_hash($_SESSION['myarea'],PASSWORD_DEFAULT),time()+1500);
  		//Imposta il cookie con l'hash della email dell'utente
	}
	?>
  <h1>Stai per essere reindirizzato alla Home Page</h1>
  <div class="loader-wrapper" id="loader-1" style="display: inherit;">
     <div id="loader"></div>
  </div>
  <div  style="position:absolute;left:44vw;top:40vh;"><img src="img/logo.png" alt="logo" style="height: 20vh; width: 12vw"></div>-
  

  
</body> 
</html>