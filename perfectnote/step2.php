<html>
<head>
<title>Sign Up for Lessons from Perfect Note</title>
<link rel="stylesheet" href="style.css" type="text/css">
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

<?php include("menu.php"); ?>

<table align="center" border="0" cellspacing="0" cellpadding="5" width="650">
<tr>
	<td><h3>Step 2 of 3</h3></td>
	<td align="right">[ <a href="javascript: history.go(-1);">Go Back One Step</a> ]</td>
</tr>
<?php
if ($type == 'group') {
	print "<tr>
	<td colspan=\"2\">
	<p>So far, you've chosen Group Lessons, which are split into two different categories: Beginner and Intermediate. Both Courses run on a six week schedule, with class being held once a week. Please Select which Skill level you would like to sign up for by clicking one of the links below.</p>
	<p>If you aren't positive which skill level you are at, click <a href=\"javascript: openWindow('beginner.html');\">HERE</a> for Beginers, or click <a href=\"javascript: openWindow('intermediate.html');\">HERE</a> for Intermediate.</p>
	</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\"><strong>Select:</strong></td>
</tr>
<tr>
	<td align=\"center\"><h1><a class=\"menu\" href=\"signup/begin_signup.php\">Beginner</a></h1></td>
	<td align=\"center\"><h1><a class=\"menu\" href=\"signup/inter_signup.php\">Intermediate</a></h1></td>
</tr>	
";
}
elseif ($type == 'private') {
	print "<tr>
	<td colspan=\"2\">
	<p>So far, you've chosen Private Lessons which run on a four week schedule, with class being held once a week. To continue the sign up process, please click the link below.</p>
	<p>If you aren't positive that you would like to take our Private Lessons, click <a href=\"javascript: openWindow('private.html');\">HERE</a> to read more about these Lessons.</p>
	</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\"><strong>Select:</strong></td>
</tr>
<tr>
	<td align=\"center\"><h1><a class=\"menu\" href=\"signup/private_signup.php\">Private Lessons</a></h1></td>
</tr>	
";
}
else {
	print "<tr>
	<td colspan=\"2\">No Lesson Type has been selected to Sign Up for. Please go to our <a href=\"signup.php\">Sign Up</a> page to select wich Lessons to sign up for.</td>
</tr>	
";

}
?>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
</table>

</body>
</html>