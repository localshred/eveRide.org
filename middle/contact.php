<?php

$general = ($sel == 'general' ? ' selected' : '');
$error = ($sel == 'error' ? ' selected' : '');
$event = ($sel == 'event' ? ' selected' : '');
$stoked = ($sel == 'stoked' ? ' selected' : '');

?>

<p align="center"><img src="images/contact.gif"></p>

<form name="contactus" action="middle/mail_contact.php" method="post">
<table border="0" align="center" class="body" cellspacing="0" cellpadding="3" width="100%">
<tr>
	<td align="right">Name:</td>
	<td><input type="text" name="name" size="25"></td>
</tr>
<tr>
	<td align="right">Subject:</td>
	<td><input type="text" name="subj" size="25"></td>
</tr>
<tr>
	<td align="right">Send To:</td>
	<td>
	<select name="sendto">
	<option value="General Info"<?php echo $general; ?>>General Info</option>
	<option value="Error Reporting"<?php echo $error ?>>Error Reporting</option>
	<option value="Event Info"<?php echo $event; ?>>Event Info</option>
	<option value="Stoked List Info"<?php echo $stoked; ?>>Stoked List Info</option>
	</select>
	</td>
</tr>
<tr>
	<td align="right">Your Email:</td>
	<td><input type="text" name="email" size="25"> (optional)</td>
</tr>
<tr>
	<td valign="top" align="right">Comments or Question:</td>
	<td><textarea name="cq" rows="5" cols="30"></textarea></td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" name="submit" value="Contact Us!">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Clear Page"></td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="2"><p class="fineprint">Note: This form is for contacting eveRide.org with questions, comments, or Reporting Errors found on the website. Sending this form to 'Stoked List Info' will not add your name to our Stoked List.</p></td>
</tr>
</table>
</form>