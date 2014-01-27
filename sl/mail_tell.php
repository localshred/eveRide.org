<?php
$name = stripslashes($_POST['name']);
$friend = stripslashes($_POST['friend']);
$email = stripslashes($_POST['email']);
$comments = stripslashes($_POST['comments']);
$subject = stripslashes($_POST['subject']);

if (!strstr($email, '@'))
	{
	print "$email <h4>Please go back and enter a valid email address that we can send an email to (we have to send it via EMAIL, remember?)</h4>\n\n";
	include "sl/dead.html";
	die();
	}
	
if ($name == '')
	{
	print "<h4>Please go back and enter your name so we can let your friend know that you gave us his email address.... of course Pummelings will most likely ensue. But we're glad you did it!</h4>\n\n";
	include "sl/dead.html";
	die();
	}

if ($friend == '')
	{
	print "<h4>Please go back and enter your friends' name, that way we don't sound like idiots in the email... \"To Whom it may Concern\", or even, \"Dear Sir or Madam\". Lame. Click back and give us their name.</h4>\n\n";
	include "sl/dead.html";
	die();
	}

if ($subject == '')
	{
	$subject == "Message from $name";
	}
	
if ($comments == '')
	{
	$comments = "Hey,<br> Your buddy was too lame to write anything in the box to tell you about eveRide.org, but we assume you're a good enough pal to respect your bud's opinion... $name thought eveRide.org was rad enough to tell you about it. Anyway, rock hard, ride hard, and sign the <a href=\"http://www.everide.org/stoked_f.php\">stoked list</a>. The more people to sign that mamma jamma, the faster we can build <a href=\"http://www.everide.org/winterpark_f.php\">winterparks</a> for you and your sidslexic compadre.";
	}

//email variables
$date = date('n/j/y');
$time = date('H:i:s');
$to = $email;

$body = "<p>Dear $friend, You have a message from $name</p><p>$comments</p><p>(A message from the wise man) <br>Hey pal, check out <a href=\"http://www.everide.org\">eveRide.org</a> to see what $name is talking about. eveRide is a bunch of dudes like you dedicated to making the best snowparks in the world, and then riding them all day long. Plus they have gnarly <a href=\"http://www.everide.org/vc_f.php#hp\">humanitarian projects</a>. Check it out muchacho... <a href=\"http://www.everide.org\">everide.org.</a></p><p>This message was sent on $date at $time PST</p>";

$from = "From: stokedlist@everide.org\r\n";
$from .= "MIME-Version: 1.0\r\n";
$from .= "Content-type: text/html; charset=iso-8859-1\r\n";
$from .= "BCC: stokedlist@everide.org\r\n";

$sendit = mail($to, $subject, $body, $from);

if (!sendit)
	{
	print "<h4>Your form was not processed successfully. If this problem persists, please contact our <a href=\"mailto:webmaster@everide.org\">webmaster</a>. We are sorry for any inconvenience this has caused.</h4>\n\n";
	include "sl/dead.html";
	die();
	}
else
	{ 
	print "<h4>THANK YOU!</h4>\n\n<p>You are awesome for allowing us to send this email to your friend. Think of how cool you'll be once ALL your friends know about eveRide and winterpark and you can say that you found it first. All we can say is mad Props man... MAD props. So Keep up the hightened level of stoked-ness in your hometown, and you can tell more friends about it! In fact, here's a link to get back to the 'Tell a Friend' page, just in case...<br>\n<br>\n<a href=\"tell_f.php\">Tell a(nother) Friend</a></p>\n\n";
	}
?>