<?php
session_start();

$myCSRFfile = fopen("CSRf_token_FILE.txt", "w") or die("Unable to open CSRf_token_FILE.txt file!");
$txt = "John Doe\n";
fwrite($myCSRFfile, $txt);
$txt = "Jane Doe\n";
fwrite($myCSRFfile, $txt);

$myfile = fopen("CSRf_token_FILE.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("CSRf_token_FILE.txt"));
fclose($myfile);

fclose($myCSRFfile);



?>

