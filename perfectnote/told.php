<html>
<head>
<title>Tell a Friend</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>

<?php

include("menu.php");

$name = stripslashes($_POST['name']);
$friend = stripslashes($_POST['friend']);
$email = stripslashes($_POST['email']);
$comments = stripslashes($_POST['comments']);
$subject = stripslashes($_POST['subject']);

if (!strstr($email, '@')) {
	print "<div style=\"margin-left: auto; margin-right: auto; width: 500px; color: red; text-align: center\"><h4>The email address you have entered is invalid, please post a valid entry. Clicking the back button on the Browser will preserve your information.</h4></div>\n\n";
	print "</body>\n</html>";
	die();
}
	
if (!$name) {
	print "<div style=\"margin-left: auto; margin-right: auto; width: 500px; color: red; text-align: center\"><h4>Please go back and enter your Name. Clicking the back button on the Browser will preserve your information.</h4></div>\n\n";
	print "</body>\n</html>";
	die();
}

if (!$friend) {
	print "<div style=\"margin-left: auto; margin-right: auto; width: 500px; color: red; text-align: center\"><h4>Please go back and enter your friends' name. Clicking the back button will preserve your information.</h4></div>\n\n";
	print "</body>\n</html>";
	die();
}

$subject = empty($subject) ? "You have a New Message from $name" : $subject;
	
if (!$comments) {
	print "<div style=\"margin-left: auto; margin-right: auto; width: 500px; color: red; text-align: center\"><h4>Please go back and enter your Personal Recommendation to your Friend. Clicking the back button will preserve your information.</h4></div>\n\n";
	print "</body>\n</html>";
	die();

}

//email variables
$date = date('n/j/y');
$time = date('H:i:s');
$to = $email;
$body = "
Dear $friend, You have a message from $name

$comments

______________________________________________
This message was sent on $date at $time PST
Visit www.aPerfectNote.com for more details
";

$from = "From: aperfectnote@everide.org\r\n";
$from .= "BCC: bj@everide.org\r\n";

$sendit = mail($to, $subject, $body, $from);

if (!sendit) {
	print "<div style=\"margin-left: auto; margin-right: auto; width: 500px; color: red; text-align: center\"><h4>Your form was not processed successfully. If this problem persists, please contact our <a href=\"mailto:webmaster@everide.org\">webmaster</a>. We are sorry for any inconvenience this has caused.</h4></div>\n\n";
	print "</body>\n</html>";
	die();
}
else { 
	print "<h4 class=\"brown\">THANK YOU!</h4>\n\n<div style=\"margin-left: auto; margin-right: auto; width: 500px; text-align: center\">Your Email has been sent successfully. We are excited that you like us enough to tell more people about our Classes. If you have more people you would like to tell about us, click the link below. Thanks Again!<br>\n<br>\n[ <a href=\"tellafriend.php\">Tell a(nother) Friend</a> ]<br><br>[ <a href=\"index.php\">Home</a> ]</div>\n\n";
}
?>
</body>
</html>
