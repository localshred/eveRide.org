<html>
<head>
<title>Sign Up!</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>

<?php

if (!$period) {
	die ("<h2 class=\"brown\" align=\"center\">You did not specify a class to sign up for!</h2>\n\n".
			"<p align=\"center\">Please go back to enter this information correctly</p>".
			"<p align=\"center\">[ <a href=\"javascript: history.go(-1);\">Go Back</a> ]</p>\n\n".
			"</body>\n</html>");
}
elseif (!$name) {
	die ("<h2 class=\"brown\" align=\"center\">You did not enter your Name!</h2>\n\n".
			"<p align=\"center\">Please go back to enter this information correctly</p>".
			"<p align=\"center\">[ <a href=\"javascript: history.go(-1);\">Go Back</a> ]</p>\n\n".
			"</body>\n</html>");
}
elseif (!$phone) {
	die ("<h2 class=\"brown\" align=\"center\">You did not enter your Phone Number!</h2>\n\n".
			"<p align=\"center\">Please go back to enter this information correctly</p>".
			"<p align=\"center\">[ <a href=\"javascript: history.go(-1);\">Go Back</a> ]</p>\n\n".
			"</body>\n</html>");
}
elseif (!$address) {
	die ("<h2 class=\"brown\" align=\"center\">You did not enter your Address!</h2>\n\n".
			"<p align=\"center\">Please go back to enter this information correctly</p>".
			"<p align=\"center\">[ <a href=\"javascript: history.go(-1);\">Go Back</a> ]</p>\n\n".
			"</body>\n</html>");
}
elseif (!$email || !strstr($email, '@')) {
	die ("<h2 class=\"brown\" align=\"center\">Your E-Mail Address is incorrect!</h2>\n\n".
			"<p align=\"center\">Please go back to enter this information correctly</p>".
			"<p align=\"center\">[ <a href=\"javascript: history.go(-1);\">Go Back</a> ]</p>\n\n".
			"</body>\n</html>");
}
else {

	$dbh = mysql_connect('localhost','everideo_bj','tunahead');
	mysql_select_db('everideo_pnote', $dbh);
	
	// gets the session name from the id that was passed
	$selectid = "SELECT name FROM schedule WHERE id = '$period'";
	$sel_query = mysql_query($selectid, $dbh);
	while ($getid = mysql_fetch_array($sel_query, MYSQL_NUM)) {
		$period_name = $getid[0];
	}

	print "<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"600\" align=\"center\">
<tr>
	<td colspan=\"2\" align=\"center\"><h2 class=\"brown\">Your Sign Up was Successful!</h2></td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" style=\"color: #8d6d49\"><strong>Here is the information you submitted:</strong></td>
</tr>
<tr>
	<td width=\"30%\" align=\"right\"><strong>Name:</strong></td>
	<td>$name</td>
<tr>
</tr>
	<td width=\"30%\" align=\"right\"><strong>Phone:</strong></td>
	<td>$phone</td>
<tr>
</tr>
	<td width=\"30%\" align=\"right\"><strong>Email:</strong></td>
	<td>$email</td>
<tr>
</tr>
	<td width=\"30%\" align=\"right\"><strong>Address:</strong></td>
	<td>$address</td>
<tr>
</tr>
	<td width=\"30%\" align=\"right\"><strong>Session Period:</strong></td>
	<td>$period_name</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" style=\"color: #8d6d49\"><strong>Below is the Status of your Sign Up:</strong></td>
</tr>
";

	$skilltype = $type == 'private' ? ucfirst($type) : ucfirst($skill)."/".ucfirst($type);
	
	
	//adds student to schedule db table
	$update = "UPDATE schedule SET size = size + 1 WHERE id = $period";
	$up_query = mysql_query($update, $dbh);
	
	if ($up_query) {
		
		$insert = "INSERT INTO student (name, phone, address, email, skilltype, session) VALUES ('$name', '$phone', '$address', '$email', '$skilltype', '$period_name')";
		$ins_query = mysql_query($insert, $dbh);
		
		if ($ins_query) {
			print	"<tr>
	<td colspan=\"2\"><blockquote>&middot;Our Class Schedule has been updated, and you have been added to the <strong>$period_name</strong> Class</td>
</tr>
<tr>
	<td colspan=\"2\"><blockquote>&middot;Your Student Info has been succesfully added to our records.</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" class=\"brown\"><h3 align=\"center\">Thank You for applying to Perfect Note Guitar School!</h3></td>
</tr>
";
			$ins_work = "Schedule updated and Student Info added to DB";
		}
		else {
			print	"<tr>
	<td colspan=\"2\"><blockquote>&#149; Our Class Schedule has been updated, and you have been added to the <strong>$period_name</strong> Class</td>
</tr>
<tr>
	<td colspan=\"2\"><blockquote>&#149; Your Student Info has been NOT been added to our Records, due to a Database Error. Please <a href=\"../contact.php\">Contact Us</a> with all of your Student information, and please mention this error so that we may correct it for future students. Thank you for your Patience.</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" class=\"brown\"><h3 align=\"center\">Thank You for applying to Perfect Note Guitar School!</h3></td>
</tr>
";
			$ins_work = "Schedule Updated but Student Info wasn't successfully added to DB";
		}
		
		$time = date('g:i a');
		$date = date('n/j/Y');
		
		$to = "bj@everide.org".",";
		$to .= "tyson112211@yahoo.com";
		$subject = "New Student Sign Up";
		$body = "
A New Student has signed up for Perfect Note Guitar School in a ".strtoupper($skilltype)." Lesson

Name:      $name
Phone:     $phone
Email:     $email
Address:   $address
Session:   $period_name

$ins_work

Signup Occured at $time on $date
";
		//send the email
		$mailit = mail($to,$subject,$body,$from);
	}
	else {
		print	"<tr>
	<td class=\"brown\"><h2>Your Sign Up was NOT Successful!</h2></td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td align=\"center\">Your Student Info has not been added to our Records, due to a Database Error. Please <a href=\"../contact.php\">Contact Us</a> with all of your Student information, and please mention this error so that we may correct it for future students. Thank you for your Patience.</td>
</tr>
";
	
	}
	
	mysql_close($dbh);

}
?>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="center"><a href="../index.php"><img src="../images/logo-2.gif"></a></td>
</tr>
<tr>
	<td colspan="2" align="center"><a href="../index.php" class="menu">Home</a> <a href="../contact.php" class="menu">Contact Us</a> <a href="../tellafriend.php" class="menu">Tell a Friend</a></td>
</tr>
</table>
</body>
</html>