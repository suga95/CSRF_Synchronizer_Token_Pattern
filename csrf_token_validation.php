<?php

	# How the CSRF token and Session generated file is read from the server
	# and validated for further process
class csrf_token
{

	public static function check_csrf_token($csrf_token,$session_identifier)
	{
	
		# To show the Session in an alert Message
		echo "<script>alert('Session Key => =>');</script>";
		echo "<script>alert('$session_identifier');</script>";
		
		$csrf_file = fopen("CSRf_token_FILE.txt", "r") or die("Unable to open file containing csrf token");
		list($token,$session_id) = explode(",",chop(fgets($csrf_file)),2);
		fclose($csrf_file);
		// echo "<script>alert($token);</script>";
		// echo "<script>alert('$token');</script>";
		// echo "My token " .$token. "<br>";
		// echo "<script>alert('$csrf_token');</script>";
		// echo "My CSRFtoken " .$csrf_token. "<br>";

		$csrf_value = (int)$csrf_token;

			if($token == $csrf_value)
			{
				// echo "After Not My token " .$token. "<br>";
				// echo "After Not My CSRFtoken " .$csrf_token. "<br>";
				if($session_identifier == $session_id )
				{
					return true;
				}
			}
		
	}

}
	
?>