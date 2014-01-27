<html>
<head>
<title>A Perfect Note Class Schedules</title>
<link rel="stylesheet" href="style.css" type="text/css">
<script type="text/javascript">
function openWindow(url, wide, high) {
	wide = wide == null ? '400' : wide;
	high = high == null ? '300' : high;
	
	var name = url.replace('.html', '');
	window.open(url, name, 'height=' + high + ', width=' + wide + ', scrollbars=yes, resizable=no, status=yes, left=50, top=50', false);
}
</script>
</head>

<body>
<a name="top"></a>
<?php
/*
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_pnote',$dbh);
*/
include("menu.php");

print "<p style=\"text-align: center; color: #8d6d49; font-weight: bold\">Today is ".date('l F jS, Y')."</p>";

//months menu buildout
print "<p style=\"text-align: center\"><span class=\"home\">JUMP TO MONTH:</span><br>";
for ($top = 0; $top < 3; $top++) {
	if (($top+date('n')) == 13) {
		$a = 1;
		$y = date('Y')+1;
	}
	elseif (($top+date('n')) == 14) {
		$a = 2;
		$y = date('Y')+1;
	}
	elseif (($top+date('n')) == 15) {
		$a = 3;
		$y = date('Y')+1;
	}
	else {
		$a = $top+date('n');
		$y = date('Y');
	}
	
	//get epoch of month in iteration to get the text name of the month
	$e = mktime(0,0,0,$a,1,$y);
	$text = date('F',$e);
	print " <a href=\"#$text\" class=\"menu\">$text</a> ";
}
print "</p>\n\n";

//start months loop
$m = 0;
while ($m < 3) {

	//correct month number if above 12
	if (($m+date('n')) == 13) {
		$month = 1;
		$year = date('Y')+1;
	}
	elseif (($m+date('n')) == 14) {
		$month = 2;
		$year = date('Y')+1;
	}
	elseif (($m+date('n')) == 15) {
		$month = 3;
		$year = date('Y')+1;
	}
	else {
		$month = $m+date('n');
		$year = date('Y');
	}

	//figures out the month number, number of days in month, which day it starts on, and the year
	$start = mktime(0,0,0,$month,1,$year);
	$length = date('t',$start);
	$dow = getdate($start);
	$weekday = $dow['wday'];
	
	//db access to build the events array for current iteration
	$end = mktime(0,0,0,$month,$length,$year);
/*
	$select = "SELECT stamp, title FROM dates WHERE stamp < '$end' AND stamp > '$start'";
	$query = mysql_query($select, $dbh);
	
	while ($add = mysql_fetch_array($query, MYSQL_NUM)) {
		$convert = date('n/j/Y',$add[0]);
		$event_day = $event["$convert"];
		if ($event_day !== NULL) {
			$event_day[count($event_day)] = array("$add[1]", "$add[0]");
			$event["$convert"] = $event_day;
		}
		else {
			$event["$convert"] = array(array("$add[1]", "$add[0]"));
		}
	}
*/
	//build top of table for the current iteration's month
	print "\n<p><a name=\"".date('F',$start)."\"></a><table border=\"0\" cellspacing=\"3\" cellpadding=\"3\" width=\"700\" align=\"center\">
<tr>
	<td colspan=\"7\"><h1 class=\"brown\">".$dow['month']."</h1></td>
</tr>
<tr>
	<td colspan=\"7\" align=\"center\" class=\"home\"><a href=\"#top\">BACK TO TOP</a></td>
</tr>
<tr>
	<td style=\"width: 100px; text-align: center\">Sunday</td>
	<td style=\"width: 100px; text-align: center\">Monday</td>
	<td style=\"width: 100px; text-align: center\">Tuesday</td>
	<td style=\"width: 100px; text-align: center\">Wednesday</td>
	<td style=\"width: 100px; text-align: center\">Thursday</td>
	<td style=\"width: 100px; text-align: center\">Friday</td>
	<td style=\"width: 100px; text-align: center\">Saturday</td>
</tr>
";
	
	//build the calendar
	for ($i = 1; $i <= $length; $i++) {
		//checks which day the 1st falls on (monday, tuesday...) and puts an appropriate blank cell to make up for it
		if ($weekday == 0) {
			$month_start = "";
		}
		else {
			$month_start = "\t<td width=\"".(100*$weekday)."\" colspan=\"$weekday\">&nbsp;</td>\n";
		}

		//print opening and closing <tr>'s every seven iterations
		if ($i == 1) {
			print "<tr>\n$month_start";
		}
		elseif ($i == (8-$weekday) || $i == (15-$weekday) || $i == (22-$weekday) || $i == (29-$weekday) || $i == (36-$weekday)) {
			print "</tr>\n<tr>\n";
		}
		
		$find_date = "$month/$i/$year";
		
		if ("$month/$i/$year" == date('n/j/Y')) {
			$day = "<p class=\"today\">$i</p>";
		}
		else {
			$day = $i;
		}
		
		
		//if event is found, print an extra table with event title and link, other wise just the day in the upper right hand corner
		print "\t<td style=\"text-align: right; vertical-align: top; height: 150px; width: 100px; border-color: #8d6d49; border-width: 1px; border-top-style: solid; border-left-style: solid\">";
		
		if (isset($event[$find_date])) {
			print "$day<br>
		<table style=\"width: 100%; border-style: none\" align=\"center\" cellspacing=\1\">
";
			foreach ($event[$find_date] as $key) {
				print "
		<tr>
			<td style=\"vertical-align: top; border-color: #e6e6e6;	border-width: 1px; border-style: solid;\"><a href=\"javascript: openWindow('schedule/view_schedule.php?date=$key[1]');\">$key[0]</a></td>
		</tr>
";
			}
		print"</table><br>\n\n";
		}
		else {
			print "$day<br>";
		}
		
		print "</td>\n";

		//adds blank cell to finish off the the row at the end of the month
		if ($i == $length) {
			if ($length+$weekday == 28 || $length+$weekday == 35) {
				print "";
			}
			else {
				$xtra = 35 - $length;
				print "\t<td colspan=\"$xtra\" height=\"150\">&nbsp;</td>\n";
			}
			print "</tr>\n";
		}
	}
	
	print "</table></p>\n";
	$m++;
	//loop again if $m !== 2
}

//mysql_close($dbh);
?>
</body>
</html>