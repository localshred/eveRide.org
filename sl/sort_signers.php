<html>
<head>
<title>sort the stoked signers list || eveRide.org</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body onLoad="window.location='http://www.everide.org/sl/stokedsigners.php?submit=1';">

<p align="center">[<strong><a href="javascript:window.close();" class="menubar">Close Window</a></strong>]</p>

<h2 style="color: #FFFFFF">How many Signers do you want to see?</h2>

<form name="signers" action="stokedsigners.php" method="post">
<table class="blbody" cellspacing="0" cellpadding="3" width="400">
<tr>
  <td colspan="2">As the Stoked Signers List keeps growing, the page loading will start to take longer and longer to view ALL of our Stoked Signers. Below, tell us how many signers you would like to view, starting anywhere in our records. You can view 1 signer, or all of them.</td>
</tr>

<tr>
  <td colspan="2">
<?php 
$dbh = mysql_connect("localhost","everideo_bj","tunahead");
mysql_select_db("everideo_ss", $dbh);

//Print Number of People that have signed the Stoked List
$signed = mysql_num_rows(mysql_query("SELECT * FROM `stoked`"));

print "<br><p><font style=\"font-size: 16px; font-weight: bold\">$signed</font> people have signed the Stoked List</p><br>\n\n";

mysql_close($dbh);
?>
  </td>
</tr>
<tr>
	<td colspan="2">First signer to view:<br>(appears at bottom of stokedsigners page)</td>
</tr>

<tr>
	<td width="5%">&nbsp;</td>
	<td valign="top"><input type="text" name="start" size="10"></td>
</tr>

<tr>
	<td colspan="2">Number of Signers to view:<br>(ie. 25 signers)</td>
</tr>

<tr>
	<td width="5%">&nbsp;</td>
	<td valign="top"><input type="text" name="num_row" size="10"></td>
</tr>

<tr>
	<td colspan="2">&nbsp;</td>
</tr>

<tr>
	<td width="5%">&nbsp;</td>
	<td><input type="submit" name="submit" value="View Signers"><br>Leave fields blank to view LAST 50 signers</td>
</tr>
</table>
</form>

<p align="center">[<strong><a href="javascript:window.close();" class="menubar">Close Window</a></strong>]</p>

</body>
</html>