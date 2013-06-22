<?php

$to = "your@email.com";

$headers = "From: " . $_POST['email'] . "\r\n";

$subject = $_POST['subject'];

$body = "Name: " . $_POST['name'] ."\n";
$body .= "E-mail: " . $_POST['email'] ."\n";
$body .= "Subject: " . $_POST['subject'] ."\n";
$body .= "Message: " . $_POST['message'] ."\n";

if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
{
	if (mail($to, $subject, $body, $headers, "-f " . $_POST['email']))
	{
		echo 'Thank you for your contact.<br>We\'ll be in touch soon.';
	}
	else
	{
	   echo 'There was a problem with sending your message.';
	}
}
else
{
   echo 'There was a problem with your e-mail (' . $_POST['email'] . ')';
}