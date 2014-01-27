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
	<td colspan="2"><h3>Step 1 of 3</h3></td>
</tr>
<tr>
	<td colspan="2">
	<p>Signing Up for Perfect Note Guitar Lessons is a simple 3 step process. First we need you to tell us whether you'd like Group or Private Lessons, by clicking one of the Links below.</p>
	<p>If you're not sure which lessons you would like to take, check out our <a href="classes.php">Classes</a> Page.</p>
	</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="2"><strong>Select:</strong></td>
</tr>
<tr>
	<td align="center"><h1><a class="menu" href="step2.php?type=group">Group</a></h1></td>
	<td align="center"><h1><a class="menu" href="step2.php?type=private">Private</a></h1></td>
</tr>
</table>

</body>
</html>