<?php

$to = "your@company.com";

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
	//Write to file
	$file = 'emails.txt';

	file_put_contents($file, $_POST['email'] . ';', FILE_APPEND | LOCK_EX);
	    
	// Send e-mail 
	$headers = "From: " . $to . "\r\n";
	     
	$subject = "New subscription";
	$body = "New user subscription: " . $_POST['email'];
	     
	if (mail($to, $subject, $body, $headers, "-f " . $to))
	{
		echo 'Thank you for subscribing.';
	}
	     
	else
	{
		echo 'There was a problem. Please try again.';  
	}    

}

else
{
	echo 'Your e-mail is not valid. Please try again.';  
}



echo 'Thank you for subscribing.';