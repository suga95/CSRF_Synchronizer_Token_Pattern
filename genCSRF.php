<?php

# This is where the CSRF token is generated and stored in the Business Layer
session_start();
#------#
$myCSRFfile = fopen("CSRf_token_FILE.txt", "w") or die("Unable to open CSRf_token_FILE.txt file!");
$CSRF_TOKEN = $_SESSION['csrf_token'].",";
fwrite($myCSRFfile, $CSRF_TOKEN);

$session = $_SESSION['session_id']."\n";
fwrite($myCSRFfile, $session);

#$myfile = fopen("CSRf_token_FILE.txt", "r") or die("Unable to open file!");
#echo fread($myfile,filesize("CSRf_token_FILE.txt"));
#fclose($myfile);

fclose($myCSRFfile);

echo $_SESSION['csrf_token'];


?>

