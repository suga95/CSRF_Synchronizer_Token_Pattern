<?php

		# Session and CSRF Token Cookie are created at this point
		# By using standard PHP 'session_start()' functionality
		# Either way, 'bin2hex(random_bytes(32))' OR 'base64_encode(openssl_random_pseudo_bytes(32))' can be used to create CSRF token at a secure way
		session_start();
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
		#$_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));

		$session_id = session_id();
		$_SESSION['session_id'] = $session_id;
		$CSRF_COOKIE = 'csrf_cookie';
		
		
		# Time is set for the session, as it needs to be expired at a given time
		setcookie($CSRF_COOKIE,$session_id,time()+60*60*30,'/');
		
		
		// echo "My session id " .$_SESSION['session_id']. "<br>";
		// echo "My CSRF cookie " .$_SESSION['csrf_token']. "<br>";
		// echo("<script> console.log('$session_id')</script>");
		
		#Validation part of User Login is below
		    $msg = '';
			           
            if (isset($_POST['login']) && !empty($_POST['uname']) && !empty($_POST['psw'])) 
			   {
					$uname=$_POST['uname'];
					$psw=$_POST['psw'];
				
				   if ($uname == 'SUGA' && $psw == '1234') 
				   {  
					  echo 'Hello SUGA You are Welcome here!';
				   }
				   else {
					  $msg = 'Wrong username or password';
					  echo $msg;
					  exit();
				   }
            }
?>

<!DOCTYPE html>
<html>
<head>
	<title> Synchronizer Token Pattern Protection for Cross Site Request Foregery</title>
	<link rel="stylesheet" href="myStyle2.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	
	//JS function is called in oder to generate CSRF token and display as hidden field in the
	//presentaion layer
	
	$(document).ready(function()
	{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() 
		{
			if (this.readyState == 4 && this.status == 200) 
			{
				document.getElementById("csrf_token_hidden").setAttribute('value', this.responseText);
			}
		};
		xhttp.open("GET", "genCSRF.php", true);
		xhttp.send();
	});
	</script>
</head>
<body>

<form action="checkCSRFtoken.php" style="border:1px solid #ccc" method="post">
  <div class="container">
    <h1>User Registration</h1>
    <p>Please fill in this form to Update Your Details</p>
    <hr>

    <label for="fName"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fName" required>
	
	<label for="lName"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lName" required>
	
	<label for="gender"><b>Gender :</b></label><br>
		<input type="radio" name="gender" value="male" checked> Male<br>
		<input type="radio" name="gender" value="female"> Female<br>
		<input type="radio" name="gender" value="other"> Other<br>
	
	<br>
    <label for="country"><b>Country</b></label>
    <select id="country" name="country">
      <option value="Sri Lanka">Australia</option>
      <option value="India">America</option>
      <option value="Singapore">Sri Lanka</option>
	  <option value="Singapore">India</option>
    </select>
    
    <label for="Addr"><b>Address</b></label>
    <textarea id="Addr" name="Addr" placeholder=" Enter Address" style="height:75px" required></textarea>
	
	<div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
	  <input type="submit" value="Submit" class="signupbtn">
	  <!-- Hidden field to store the CSRF and SESSIOn values -->
      <input type="hidden" name="csrf_token" value="" id="csrf_token_hidden"/>
    </div>
	    
  </div>
</form>

</body>
</html>