<?php
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
					  exit();
				   }
            }
?>

<!DOCTYPE html>
<html>
<head>
	<title> Synchronizer Token Pattern Protection for Cross Site Request Foregery</title>
	<link rel="stylesheet" href="myStyle2.css">
</head>
<body>

<form action="/action_page.php" style="border:1px solid #ccc" method="post">
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
      <input type="hidden" name="csrf_token" value="" id="csrf_token_hidden"/>
    </div>
	    
  </div>
</form>

</body>
</html>