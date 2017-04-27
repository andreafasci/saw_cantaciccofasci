<?php
	if(isset($GLOBALS['log_reg_errors'])){
		switch($GLOBALS['log_reg_errors']){
			case 'alreadyreg':
				echo '<script language="javascript">';
				echo 'alert("Utente già registrato")';
				echo '</script>';
				break;
			case 'pwdsdontmatch':
				echo '<script language="javascript">';
				echo 'alert("Le password inserite non corrispondono")';
				echo '</script>';
				break;
			case 'emptyfields':
				echo '<script language="javascript">';
				echo 'alert("Inserisci tutti i campi")';
				echo '</script>';
				echo "CIAO";
				break;
			case 'emailpwderr':
				echo '<script language="javascript">';
				echo 'alert("Email e/o Password errati")';
				echo '</script>';
				break;
		}
	}
?>