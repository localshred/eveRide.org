<html>
<head>
<title>Contact Perfect Note</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>

<?php include("menu.php"); ?>

<form name="contact" method="post" action="mail.php">
<table border="0" cellpadding="3" width="700" align="center">
<tr>
	<td colspan="2"><p style="text-indent: 25px">Please use the form provided 
          below to Contact Perfect Note Guitar School. We try to get to all emails 
          as quickly as possible, but please allow for 24 to 48 hours for a response. 
          We appreciate your patience. Thank You.</p></td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td align="right" width="35%"><strong>NAME:</strong></td>
	<td><input type="text" name="name" size="25"></td>
</tr>
<tr>
	  <td align="right"><strong>E-MAIL:</strong></td>
	<td><input type="text" name="email" size="25"></td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td align="right"><strong>SUBJECT:</strong></td>
	<td><input type="text" name="subject" size="25"></td>
</tr>
<tr>
	<td align="right" valign="top"><strong>MESSAGE:</strong></td>
	<td><textarea name="msg" rows="5" cols="50"></textarea></td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear"></td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="center"><em>All fields are required to submit this form</em></td>
</tr>
</table>
</form>

</body>
</html>