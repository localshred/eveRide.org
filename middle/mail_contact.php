<?php

$accounts = array(
		'General Info'=>'founders@everide.org',
		'Event Info'=>'events@everide.org',
		'Stoked List Info'=>'stokedlist@everide.org',
		'Error Reporting'=>'webmaster@everide.org'
		);


$name = stripslashes($_POST['name']);
$subj = stripslashes($_POST['subj']);
$cq = stripslashes($_POST['cq']);
$sendto = $_POST['sendto'];
$email = $_POST['email'];

$date = date('n/j/y');
$time = date('g:i a');

$getto = $accounts["$sendto"];

$to  = "$getto".", ";
$to .= "briann@tni.com";
$body = "Message Sent to $sendto\nFrom: $name ($email)\nSent: $date at $time\n\n$cq";
$from = "From: Contact eveRide <$email>";

$sendit = mail($to, $subj, $body, $from);

if($sendit) {

	print 	"<html>\n".
			"<head>\n".
			"<title>You're In!</title>\n".
			"<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\">\n".
			"</head>\n\n".
			"<body bgcolor=\"#000000\">\n\n".
			"<script language=\"javascript\">\n".
			"alert('Your Message has been successfully sent to $sendto\\nYou will be now be redirected to our Home Page');\n\n".
			"window.location=\"http://www.everide.org/\";".
			"</script>\n\n".
			"</body>\n".
			"</html>";
}
else {
	print 	"<html>\n".
			"<head>\n".
			"<title>Something Went Horribly Wrong!</title>\n".
			"<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\">\n".
			"</head>\n\n".
			"<body>\n\n".
			"<h2 style=\"color: #FFFFFF\">Something has gone amiss...</h2>\n\n".
			"<p>For some odd reason, there has been a problem. <a href=\"mailto:webmaster@everide.org\">Email</a> our webmaster to report this error.</p>\n\n".
			"</body>\n".
			"</html>";
}
?>