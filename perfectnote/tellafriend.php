<html>
<head>
<title>Tell a Friend about Us!</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<h2 class="brown">Tell a Friend About Us!</h2>
<?php include("menu.php"); ?>
<form name="tellfriend" action="told.php" method="post">
<table width="700" cellspacing="0" cellpadding="3" align="center">
<tr>
  <td align="right" width="35%"><strong>Your Name:</strong></td>
  <td><input type="text" name="name" size="25"></td>
</tr>

<tr>
  <td align="right" width="35%"><strong>Your Friend's Name:</strong></td>
  <td><input type="text" name="friend" size="25"></td>
</tr>

<tr>
  <td align="right" width="35%"><strong>Your Friend's Email:</strong></td>
  <td><input type="text" name="email" size="25"></td>
</tr>

<tr>
  <td align="right" width="35%"><strong>Subject:</strong></td>
  <td><input type="text" name="subject" size="25"></td>
</tr>

<tr>
  <td align="right" width="35%"><strong>Your Message:</strong></td>
  <td><textarea name="comments" cols="40" rows="5"></textarea></td>
</tr>

<tr>
  <td align="center" colspan="2"><input type="submit" name="submit" value="Send Email"> &nbsp;&nbsp;&nbsp; <input type="reset" name="reset" value="Clear Form"></td>
</tr>

</table>
</form>

</body>
</html>
