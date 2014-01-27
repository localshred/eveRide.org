<html>
<head>
<title>Shoe Order Form</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>

<h2 style="color: #FFFFFF">Shoe Order Form</h2>

<form name="order" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<table border="0" cellspacing="3" class="blbody" width="400">
<tr>
	<td colspan="2">
<p><strong>Salesperson instructions</strong>:<br>
Shoes cost $80 and are tax free since they are ordering out of state. Shipping is also free. The sizes that are available on the dropdown menu are the only ones Tyler can get. We don't currently have a credit card machine, so have the customers pay with cash or checks payable to Ty Theobald. Please put the checks and cash in the mason jar near the register. </p>

<p>When filling out the form please enter all of their information, or at least their phone number and name.</p>

<p>We can't dropship the shoes directly to their house, we have to get them delivered to the store, and they can pick them up with alterations, etc.</p>

<p>Thanks guys!</p>

<p>All shoes are subject to availability, and can only come in a few sizes. Shoes take 2 weeks for delivery.</p>
</td>
</tr>

<tr>
	<td colspan="2">&nbsp;</td>
</tr>

<tr>
	  <td align="right" width="25%">Name:</td>
	<td><input type="text" name="name" size="20"></td>
</tr>

<tr>
	  <td align="right" width="25%">Phone #:</td>
	<td><input type="text" name="phone" size="10"></td>
</tr>

<tr>
	  <td align="right" width="25%">Email:</td>
	<td><input type="text" name="email" size="20"></td>
</tr>

<tr>
	<td align="right" width="25%">Street Address:</td>
	<td><input type="text" name="addy" size="20"></td>
</tr>

<tr>
	<td align="right" width="25%">City:</td>
	<td><input type="text" name="city" size="20"></td>
</tr>

<tr>
	<td align="right" width="25%">State:</td>
	<td><input type="text" name="state" size="2"></td>
</tr>

<tr>
	<td align="right" width="25%">Postal Code:</td>
	<td><input type="text" name="zip" size="5"></td>
</tr>

<tr>
	<td align="right" width="25%">Sold By:</td>
	<td><input type="text" name="sold" size="20"></td>
</tr>

<tr>
	<td align="right" width="25%">Special Instructions:</td>
	<td><textarea name="special" cols="20" rows="3"></textarea></td>
</tr>

<tr>
	<td colspan="2">&nbsp;</td>
</tr>

<tr>
	<td align="right" width="25%">Black Sizes:</td>
	<td><select name="black">
		<option value="No Black"></option>
		<option value="8.0">8.0</option>
		<option value="9.0">9.0</option>
		<option value="10.5">10.5</option>
		<option value="13.0">13.0</option>
		</select>
	</td>
</tr>

<tr>
	<td align="right" width="25%">Tan Sizes:</td>
	<td><select name="tan">
		<option value="No Tan"></option>
		<option value="8.0">8.0</option>
		<option value="10.0">10.0</option>
		</select>
	</td>
</tr>

<tr>
	<td colspan="2">&nbsp;</td>
</tr>

<tr>
	<td colspan="2"><input type="checkbox" name="check" value="I Understand">
        I understand that all shoes are subject to availability, and I will be 
        refunded in full if these items are not available after the order is placed.</td>
</tr>

<tr>
	<td colspan="2">&nbsp;</td>
</tr>

<tr>
	<td colspan="2" align="center"><input type="submit" name="submit" value="Place Order">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Clear Order"></td>
</tr>

<?php

if ($submit) {
	if (!$name) {
		print "<script language=\"javascript\">\n".
				"\t<!--\n".
				"\t\talert('Please input a value into the Name Field');\n".
				"\t-->\n".
				"</script>\n";
		include ("errors/bnd_dead.html");
		die();
	}
	if (!$phone) {
		print "<script language=\"javascript\">\n".
				"\t<!--\n".
				"\t\talert('Please input a value into the Phone # Field');\n".
				"\t-->\n".
				"</script>\n";
		include ("errors/bnd_dead.html");
		die();
	}
	if (!$email) {
		print "<script language=\"javascript\">\n".
				"\t<!--\n".
				"\t\talert('Please input a value into the Email Field');\n".
				"\t-->\n".
				"</script>\n";
		include ("errors/bnd_dead.html");
		die();
	}
	if (!$addy) {
		print "<script language=\"javascript\">\n".
				"\t<!--\n".
				"\t\talert('Please input a value into the Street Address Field');\n".
				"\t-->\n".
				"</script>\n";
		include ("errors/bnd_dead.html");
		die();
	}
	if (!$city) {
		print "<script language=\"javascript\">\n".
				"\t<!--\n".
				"\t\talert('Please input a value into the City Field');\n".
				"\t-->\n".
				"</script>\n";
		include ("errors/bnd_dead.html");
		die();
	}
	if (!$state) {
		print "<script language=\"javascript\">\n".
				"\t<!--\n".
				"\t\talert('Please input a value into the State Field');\n".
				"\t-->\n".
				"</script>\n";
		include ("errors/bnd_dead.html");
		die();
	}
	if (!$zip) {
		print "<script language=\"javascript\">\n".
				"\t<!--\n".
				"\t\talert('Please input a value into the Postal Code Field');\n".
				"\t-->\n".
				"</script>\n";
		include ("errors/bnd_dead.html");
		die();
	}
	if (!$sold) {
		print "<script language=\"javascript\">\n".
				"\t<!--\n".
				"\t\talert('Please input a value into the Sold By Field');\n".
				"\t-->\n".
				"</script>\n";
		include ("errors/bnd_dead.html");
		die();
	}
	if ($black == "No Black") {
		if ($tan == "No Tan") {
			print "<script language=\"javascript\">\n".
			"\t<!--\n".
			"\t\talert('Please select a shoe size, either from the Black or Tan Drop Down Menus');\n".
			"\t-->\n".
			"</script>\n";
			include ("errors/bnd_dead.html");
			die();
		}		
	}
	if (!$check) {
		print "<script language=\"javascript\">\n".
				"\t<!--\n".
				"\t\talert('We cannot Process this form unless you agree to the terms stated at the bottom of the Order Form');\n".
				"\t-->\n".
				"</script>\n";
		include ("errors/bnd_dead.html");
		die();
	}

if (!$special) {
	$special = 'No Special Instructions';
}

if ($tan == 'No Tan') {
	$size = "Black ".$black;
}
else {
	$size = "Tan ".$tan;
}


$mail ="A New Order Has Arrived\n\n".
		"Name:\t\t\t\t$name\n".
		"Email:\t\t\t$email\n".
		"Phone #:\t\t\t$phone\n".
		"Address:\t\t\t$addy\n".
		"\t\t\t\t$city, $state\n".
		"\t\t\t\t$zip\n".
		"Sold By:\t\t\t$sold\n".
		"Special Instructions:\t$special\n".
		"Order:\t\t\t$size\n\n".
		"Order was placed on ".date('n/j/y')." at ".date('g:i a')." (PST).".
		"That is all, I have Spoken";

$to = "Theobeeeach <tyler@everide.org>";
$subject = "Missionary Shoe Order";
$from = "From: New Shoe Order <orders@everide.org>";


$send1 = mail($to, $subject, $mail, $from);

if($send1) {
	print "<tr><td colspan=\"2\"><h2 style=\"color: #FFFFFF\">Thank you for ordering from us!</h2><p><strong>You will receive a confirmation email shortly containing the contents of your order.</strong></td></tr>";
		
	$mail_conf ="Thank Your For Ordering! Your order information is listed below.\n".
		"You will be contacted shortly concerning payment.\n\n".
		"Name:\t\t\t\t$name\n".
		"Email:\t\t\t$email\n".
		"Phone #:\t\t\t$phone\n".
		"Address:\t\t\t$addy\n".
		"\t\t\t\t$city, $state\n".
		"\t\t\t\t$zip\n".
		"Sold By:\t\t\t$sold\n".
		"Special Instructions:\t$special\n".
		"Order:\t\t\t$size\n\n".
		"Please contact orders@everide.org for more information or questions concerning this order.\n".
		"Your order was placed on ".date('n/j/y')." at ".date('g:i a')." (PST).";
		
		mail($email, "Your Shoe Order Confirmation", $mail_conf, "From: Missionary Shoe Order <orders@everide.org>");
}
else {
	print "<tr><td colspan=\"2\"><h2 style=\"color: #FFFFFF\">We're sorry!</h2><p><strong>An error has occured in the order process. Please contact <a href=\"orders@eveRide.org\" class=\"menubar\">orders@eveRide.org</a> to report this problem if it persists.</strong></p></td></tr>";
}

}
?>
</table>
</form>

</body>
</html>