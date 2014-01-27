<html>
<head>
<title>Beginner Group Lessons Sign Up</title>
<link rel="stylesheet" href="../style.css" type="text/css">
<script type="text/javascript">
function openWindow(url, wide, high) {
	wide = wide == null ? '600' : wide;
	high = high == null ? '600' : high;
	
	var name = url.replace('.html', '');
	window.open(url, name, 'height=' + high + ', width=' + wide + ', scrollbars=yes, resize=no, status=yes', false);
}
</script>
</head>

<body>

<h2 class="brown">Group Beginner Sign Up</h2>


<form name="beginner_add" action="add_student.php" method="post">
<input type="hidden" name="skill" value="beginner">
<input type="hidden" name="type" value="group">
<table border="0" width="750" align="center" cellspacing="0" cellpadding="3">
<tr>
	<td><h3>Step 3 of 3</h3></td>
	<td align="right">[ <a href="javascript: history.go(-1);">Go Back One Step</a> ]</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="center"><strong>Session Period:</strong> (<a href="javascript: openWindow('../schedule/whatis.html');">What is a Session Period?</a>)</td>
</tr>
<tr>
	<td colspan="2" align="right">
<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_pnote', $dbh);

$select = "SELECT id, name, start, end, size, day FROM schedule WHERE skill = 'beginner' AND type = 'group'";
$query = mysql_query($select, $dbh);

	print "
<table border=\"0\" width=\"100%\" cellpadding=\"3\" style=\"border-color: #999999; border-width: 1px; border-style: solid\">
<tr>
	<td>&nbsp;</td>
	<td><strong>Session Name:</strong></td>
	<td><strong>Start Date:</strong></td>
	<td><strong>End Date:</strong></td>
	<td><strong>Day of Week:</strong></td>
</tr>
";

if (mysql_num_rows($query) == 0) {
	print "<tr>
<td colspan=\"5\" align=\"center\"><strong>No Sessions found for your Query</strong></td>
</tr>
";
}
else {
	while ($row = mysql_fetch_array($query, MYSQL_NUM)) {
		if ($row[4] >= 20) {
			printf ("<tr>
	<td>FULL</td>
	<td>%s</td>
	<td>%s</td>
	<td>%s</td>
	<td>%s</td>
</tr>
", $row[1], $row[2], $row[3], ucfirst($row[5]), $row[1]);
		}
		else {	
			if ($row[4] >= 15) {
				$full = " (Nearly Full)";
			}
			else {
				$full = "";
			}
			
			printf ("<tr>
	<td><input type=\"radio\" name=\"period\" value=\"%s\"></td>
	<td>%s$full</td>
	<td>%s</td>
	<td>%s</td>
	<td>%s</td>
</tr>
", $row[0], $row[1], $row[2], $row[3], ucfirst($row[5]), $row[1]);
		}
	}
}
print "</table>\n\n";

mysql_close($dbh);
?>
      </td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td align="right" width="35%"><strong>Name:</strong></td>
	<td><input type="text" name="name" size="30"></td>
</tr>
<tr>
	<td align="right" width="35%"><strong>Phone Number:</strong></td>
	<td><input type="text" name="phone" size="30"></td>
</tr>
<tr>
	<td align="right" width="35%"><strong>Address:</strong></td>
	<td><textarea name="address" cols="25" rows="4"></textarea></td>
</tr>
<tr>
	<td align="right" width="35%"><strong>E-Mail:</strong></td>
	<td><input type="text" name="email" size="30"></td>
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
	<td colspan="2" align="center">[ <strong><a href="../index.php">Cancel Sign Up and return to Homepage</a></strong> ]</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
</table>
</form>

<p align="center"><img src="../images/logo-2.gif"></p>

</body>
</html>