<?php 
	session_start(); 

	if(!isset($_SESSION["UserWhatsapp"]) || !isset($_SESSION["UserId"])) 
	{ 
		echo "<script language='javascript' type='text/javascript'> alert('Necessário Autenticação');window.location.href='login.php'</script>";    
		exit; 
	} 

?>