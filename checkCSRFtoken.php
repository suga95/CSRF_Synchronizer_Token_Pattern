<?php


	#Value to be sent to the presentation layer of the app
	#Which this used to show if the system is eavesdroped by the MITM or not
	session_start();

	require_once 'csrf_token.php';
	$csrf_value = $_POST["csrf_token"];
	
	if(isset($_POST['fName']))
	{
		echo("<script> console.log('PHP CSRF COOKIE: ".$_COOKIE['csrf_cookie']."');</script>");
		if(csrf_token::check_csrf_token($csrf_value,$_COOKIE['csrf_cookie']))
		{
			echo "<font color='green' size='12'>Thank You for Your Information, </font>".$_POST['fName']." ".$_POST['lName']." from ".$_POST['country'];	
			
		}
		else
		{
			echo "<font color='red' size='12'> Cross-Site Request Forgery Attack is successfully ELIMINATED using Synchronizer Token Patterns </font>";
		}
	}	
	

?>