<html>
<head>
<title>Get an Epoch Timestamp</title>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>

<h1 class="brown">Get an Epoch Timestamp</h1>

<form name="getstamp" method="post" action="">
<table style="border-style: none; width: 500px" align="center">
<tr>
	<td style="width: 45%; text-align: right; font-weight: bold">Month:</td>
	<td>
		<select name="month">
		<option value="1">January</option>	
		<option value="2">February</option>	
		<option value="3">March</option>	
		<option value="4">April</option>	
		<option value="5">May</option>	
		<option value="6">June</option>	
		<option value="7">July</option>	
		<option value="8">August</option>	
		<option value="9">September</option>	
		<option value="10">October</option>	
		<option value="11">November</option>	
		<option value="12">December</option>	
		</select>
	</td>
</tr>
<tr>
	<td style="width: 45%; text-align: right; font-weight: bold">Day:</td>
	<td><input type="text" name="day" value="<?php date('j'); ?>" size="10"></td>
</tr>
<tr>
	<td style="width: 45%; text-align: right; font-weight: bold">Year:</td>
	<td><input type="text" name="year" size="10" value="2004"></td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="text" name="hour" size="5"><strong>:</strong><input type="text" name="minute" size="5"><strong>:</strong><input type="text" name="second" size="5"></td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="2" style="text-align: center"><input type="submit" name="submit" value="Get the Epoch"></td>
</tr>
<?php
if ($submit) {
	$hour = empty($hour) ? 0 : $hour;
	$minute = empty($minute) ? 0 : $minute;
	$second = empty($second) ? 0 : $second;

	$epoch = mktime($hour,$minute,$second,$month,$day,$year);
	$check = strftime('%c',$epoch);
	
	print "<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td style=\"width: 45%; text-align: right; font-weight: bold\">Epoch Stamp:</td>
	<td><input type=\"text\" value=\"$epoch\" size=\"25\">
</tr>
<tr>
	<td style=\"width: 45%; text-align: right; font-weight: bold\">Check (DDD MMM DD HH:MM:SS YY):</td>
	<td><input type=\"text\" value=\"$check\" size=\"25\">
</tr>
";
}

?>
</table>
</form>

</body>
</html>
