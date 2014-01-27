<?php
if (!strstr($useremail, "@"))
{
print 	"<p align=\"center\">Please Supply a valid Email Address.<br>".
		"Example: john_doe@domain.com<br><br>".
		"You will be redirected to the previous page shortly.<br>".
		"<meta http-equiv='refresh' content='15;url=javascript:history.go(-1);'><br>";
}

//Join all the Variables inside the Checkbox arrays

if (!$stores)
	{
	$stores = 'No Selection';
	}
else
	{
$stores = join('<br>&nbsp;&nbsp;&nbsp;', $_POST['stores']);
	}

if (!$mulletrating)
	{
	$mulletrating = 'No Selection';
	}
else
	{
$mulletrating = join('<br>&nbsp;&nbsp;&nbsp;', $_POST['mulletrating']);
	}

if (!$equip)
	{
	$equip = 'No Selection';
	}
else
	{
$equip = join('<br>&nbsp;&nbsp;&nbsp;', $_POST['equip']);
	}

if (!$munchies)
	{
	$munchies = 'No Selection';
	}
else
	{
$munchies = join('<br>&nbsp;&nbsp;&nbsp;', $_POST['munchies']);
	}

if (!$logo)
	{
	$logo = 'No Selection';
	}
else
	{
$logo = join('<br>&nbsp;&nbsp;&nbsp;', $_POST['logo']);
	}


//try to add text from $referother if $refer['Other: '] is found
if (isset($refer['Other: ']))
	{
	$refer = join('<br>&nbsp;&nbsp;&nbsp;', $_POST['refer']);
	$refer['Other: '] = $refer['Other: '].$referother;
	}
elseif ($refer)
	{
	$refer = join('<br>&nbsp;&nbsp;&nbsp;', $_POST['refer']);	
	}
else
	{
	$refer = 'No Selection';
	}
	
//build man Email to come back to eveRide
$emailbody= stripslashes("
<html>
<head>
<title>everide.org Survey</title>
</head>
<body style=\"font-family:Comic Sans MS\">
<h1>eveRide.org Survey</h1>
<p>Submitted by:<br>
  <font style=\"color:red\">$screenname (<a href=\"mailto:$useremail\">$useremail</a>) from $location</font></p>
<p>Rank the type of terrain you like best:<br>
&nbsp;&nbsp;&nbsp;1: <font style=\"color:red\">$rankone</font><br>
&nbsp;&nbsp;&nbsp;2: <font style=\"color:red\">$ranktwo</font><br>
&nbsp;&nbsp;&nbsp;3: <font style=\"color:red\">$rankthree</font><br>
&nbsp;&nbsp;&nbsp;4: <font style=\"color:red\">$rankfour</font><br>
&nbsp;&nbsp;&nbsp;5: <font style=\"color:red\">$rankfive</font></p>
  
<p>What type of Magazines do you Read?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$zinescene</font></p>
  
<p>What Type of Store do you get your Riding Equip?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$stores</font></p>
  
<p>How did you hear about this Website?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$refer</font></p>
  
<p>Do you think Mullets are Good, or Awesome?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$mulletrating</font></p>

<p>What kind of Equipment do you use on the Slopes?<br>  
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$equip</font></p>
  
<p>What's your Skill Level?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$skill</font></p>
  
<p>What is your Least Favorite thing about Snowriding?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$leastfavorite</font></p>
  
<p>When you get that 'Crazy Craving' on the Hill, what kind of Munchies do you go for?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$munchies</font></p>
  
<p>What is your favorite type of Mullet?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$mullettype</font></p>
  
<p>Do you like Full Days, Half Days, or Night Riding?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$daynight</font></p>
  
<p>What eveRide logos do you like best?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$logo</font></p>
  
<p>What kind of contributions would you like to see eveRide make to the community?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$contributions</font></p>
  
<p>What companies would you like to see involved with eveRide?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$companies</font></font></p>
  
<p>Are you going to tell all of your Friends about eveRide.org?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$tellfriends</font></p>
  
<p>----This is the end of the Survey----</p>
</body>
</html>");

/*build Email that will be a reply to user
$replybody= stripslashes("
<html>
<head>
<title>everide.org Survey</title>
</head>
<body style=\"font-family:Comic Sans MS\">
<h1>eveRide.org Survey</h1>
<p>Submitted by:<br>
  <font style=\"color:red\">$screenname (<a href=\"mailto:$useremail\">$useremail</a>) from $location</font></p>
<p>Rank the type of terrain you like best:<br>
&nbsp;&nbsp;&nbsp;1: <font style=\"color:red\">$rankone</font><br>
&nbsp;&nbsp;&nbsp;2: <font style=\"color:red\">$ranktwo</font><br>
&nbsp;&nbsp;&nbsp;3: <font style=\"color:red\">$rankthree</font><br>
&nbsp;&nbsp;&nbsp;4: <font style=\"color:red\">$rankfour</font><br>
&nbsp;&nbsp;&nbsp;5: <font style=\"color:red\">$rankfive</font></p>
  
<p>What type of Magazines do you Read?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$zinescene</font></p>
  
<p>What Type of Store do you get your Riding Equip?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$stores</font></p>
  
<p>How did you hear about this Website?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$refer</font></p>
  
<p>Do you think Mullets are Good, or Awesome?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$mulletrating</font></p>

<p>What kind of Equipment do you use on the Slopes?<br>  
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$equip</font></p>
  
<p>What's your Skill Level?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$skill</font></p>
  
<p>What is your Least Favorite thing about Snowriding?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$leastfavorite</font></p>
  
<p>When you get that 'Crazy Craving' on the Hill, what kind of Munchies do you go for?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$munchies</font></p>
  
<p>What is your favorite type of Mullet?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$mullettype</font></p>
  
<p>Do you like Full Days, Half Days, or Night Riding?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$daynight</font></p>
  
<p>What eveRide logos do you like best?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$logo</font></p>
  
<p>What kind of contributions would you like to see eveRide make to the community?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$contributions</font></p>
  
<p>What companies would you like to see involved with eveRide?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$companies</font></font></p>
  
<p>Are you going to tell all of your Friends about eveRide.org?<br>
&nbsp;&nbsp;&nbsp;<font style=\"color:red\">$tellfriends</font></p>
  
<p>----Thank You for completing the eveRide.org Survey----</p>
</body>
</html>");*/

//define email variables
/* To send HTML mail, you can set the Content-type header. */
$h1  = "MIME-Version: 1.0\r\n";
$h1 .= "Content-type: text/html; charset=iso-8859-1\r\n";
$h2  = "MIME-Version: 1.0\r\n";
$h2 .= "Content-type: text/html; charset=iso-8859-1\r\n";

/* additional headers */
$h1 .= "From: New Survey Submitted <survey@everide.org>\r\n";
$h2 .= "From: Your Best Friends <survey@everide.org>\r\n";

$date = date('n/j/y');

$sendmail = mail ("survey@everide.org, briann@tni.com", "New Survey from $screenname sent $date", "$emailbody", "$h1");

if (!$sendmail)
{
  print "<p>We're sorry, your survey could not be processed at this time. If this problem is repetitive, please contact our webmaster at <a href=\"mailto:webmaster@everide.org\">webmaster@everide.org</a>. We are sorry for this inconvenience, and request your patience as we look into this problem. Thanks.</p>";
  include "sl/dead.html";
  die();
}

else
{
print "<p align=\"center\">Thank You for submitting the eveRide.org online survey. Be sure to check out the <a href=\"stoked_f.php\">Stoked List</a> and the <a href=\"localphoto_f.php\">Locals Photo Gallery</a>. Keep rippin, you deserve it!</p>".
"<p align=\"center\">You will be redirected to the main page shortly,<br>or you may click <a href=\"index.php\">HERE</a> to return.".
"<meta http-equiv='refresh' content='15;url=index.php'>";
}
?>