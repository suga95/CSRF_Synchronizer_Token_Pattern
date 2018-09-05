<?php


	# Value  which is recieved from presentation layer app as "$csrf_value".
	# Which this used to show if the system is eavesdroped by the MITM or not
	session_start();

	require_once 'csrf_token_validation.php';
	$csrf_value = $_POST["csrf_token"];
	// echo "My token " .$csrf_value. "<br>";


	# Checked CSRF token and session ID value is retrieved here
	# from the validation class
	if(isset($_POST['fName']))
	{
		# If true the condition gets executed, that is no CSRF forgery
		if(csrf_token::check_csrf_token($csrf_value,$_COOKIE['csrf_cookie']))
		{
			echo "<font color='green' size='12'>Thank You for Your Valuable Information, </font>";
			echo "<font color='green' size='12'>Your <u>Trueness</u> is much Appreciated! </font>";
			
		}
		else
		{
			echo "<font color='red' size='12'> Cross-Site Request Forgery Attack is Detected </font> <br>";
			echo "<font color='red' size='12'> Cross-Site Request Forgery Attack is successfully Eradicated!  </font><br>";
			echo "<font color='green' size='12'> Thanks to <u>Synchronizer Token Patterns</u> </font>";
		}

	}	
	

?>