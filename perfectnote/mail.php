<?php
if (!$submit) {
	header("location:http://www.everide.org/perfectnote/contact.html");
}
?>
<html>
<head>
<title>Contact Perfect Note</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<?php

include("menu.php");

if ($submit) {
	$name = $_POST['name'];
	if (!$name) {
		include '../errors/nerror.txt';
		print "</body>\n</html>";
		die();
	}
	
	$email = $_POST['email'];
	if (!strstr($email,"@")) {
		include '../errors/eerror.txt';
		print "</body>\n</html>";
		die();
	}

	$subject = stripslashes($_POST['subject']);
	if (!$subject) {
		include '../errors/subj_error.txt';
		print "</body>\n</html>";
		die();
	}

	$msg = stripslashes($_POST['msg']);
	if (!$msg) {
		include '../errors/msg_error.txt';
		print "</body>\n</html>";
		die();
	}
	
	$to = "bj@everide.org".",";
	$to .= "tyson112211@yahoo.com";
	$body = "$msg\n\nMessage was sent ".date('n/j/y')." at ".date('g:i a');
	$from = "Contact Perfect Note <perfectnote@everide.org>";
	
	$sendit = mail($to,$subject,$body,$from);
	
	if($sendit) {
		print	"<p align=\"center\">Your Email has been sent successfully!</p>\n\n
<p align=\"center\">Here are the Details of your Message:</p>\n\n
<table border=\"0\" cellpadding=\"3\" width=\"800\" align=\"center\">
<tr>
	<td align=\"right\" width=\"35%\"><strong>Name:</strong></td>
	<td>$name</td>
</tr>
<tr>
	<td align=\"right\"><strong>E-Mail:</strong></td>
	<td>$email</td>
</tr>
<tr>
	<td align=\"right\"><strong>Subject:</strong></td>
	<td>$subject</td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>Message:</strong></td>
	<td>$msg</td>
</tr>
</table>\n\n
";
	}
	else {
		print "<p align=\"center\">For Some Reason your email did not work!</p>";
	}
	
}
else {
	print "<p align=\"center\"></p>";
}
?>
</body>
</html>
