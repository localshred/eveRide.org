<html>
<head>
<title>eveRide.org Stoked Signers</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>
<p align="center">[<strong><a href="javascript:history.go(-1);" class="menubar">Go Back</a></strong>] [<strong><a href="javascript:window.close();" class="menubar">Close Window</a></strong>]</p>

<?php
//Open Database
$dbh = mysql_connect("localhost", "everideo", "evertuna");
if (!$dbh)
	{
	die ("Could not Connect to Database: ".mysql_error()."</body>\n</html>");
	}
//Select AssistLine DB
mysql_select_db ("everideo_ss", $dbh);

$total_rows = mysql_num_rows(mysql_query("SELECT * FROM stoked", $dbh));

$start = (empty($start)) ? "".($total_rows - 49) : $start;
$num_row = (empty($num_row)) ? $total_rows : $num_row;

$newstart = ($total_rows - $start - ($num_row - 1));

if ($total_rows < $start) {
    print "<h3 align=\"center\">We're Sorry!</h3>\n\n<p align=\"center\">There are currently only $total_rows signers on our Stoked Signers List.<br>\nYou may search for any signer less than $total_rows, and who knows why we just said that... I would think it was obvious if we don't have that many signers.</p>\n\n".
          "<p align=\"center\">[<strong><a href=\"javascript:history.go(-1);\" class=\"menubar\">Go Back</a></strong>] [<strong><a href=\"javascript:window.close();\" class=\"menubar\">Close Window</a></strong>]</p>\n\n</body>\n</html>";
    die();
}

if ($newstart < 0) {
    $num_row = ($num_row + $newstart);
    $newstart = '0';
}

if ($_GET['submit']) {
	$limit = "LIMIT $newstart, $num_row";
	
	$query = "SELECT `nick`, `ssdate`, `sstime`, `town`, `state`, `comments` FROM `stoked` ORDER BY `id` DESC $limit";
	
	$getrows = mysql_query($query, $dbh);
	
	/*if (($start{(strlen ($start))-2}) == '1') {
		$start = $start.'th';
	}
	else {
		$suffix = $start{(strlen ($start))-1};
	
		if ($suffix == '1') {
			$start = $start.'st';
		}
		elseif ($suffix == '2') {
			$start = $start.'nd';
		}
		elseif ($suffix == '3') {
			$start = $start.'rd';
		}
		else {
			$start = $start.'th';
		}
	}*/
	
	if ($num_row == 1) {
		print "<p>You are viewing signer <strong>$start</strong> from our Stoked Signers List</p>\n\n";
	}
	else {
		print "<p>You are veiwing <strong>$num_row</strong> signers, starting at the <strong>$start</strong> Signer</p>\n\n";
	}
	
	$line = mysql_num_rows(mysql_query("SELECT `id` FROM `stoked`",$dbh));
	
	WHILE ($row = mysql_fetch_array($getrows, MYSQL_NUM)) {
		printf 	("<p>\n<table style=\"border-width: 1px; border-color:black; border-style:solid\" width=\"500\">\n".
				"<tr>\n".
				"<td class=\"ssinfo\"><strong>%s</strong> is signer <strong>$line</strong> on the Stoked List<br>\n".
				"Signed on <strong>%s</strong> at <strong>%s</strong><br>\n".
				"From <strong>%s, %s</strong></td>\n".
				"</tr>\n<tr>\n".
				"<td class=\"sscomment\"><strong>Comments:</strong><br>\n%s</td>\n".
				"</tr>\n\n</table></p>", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
		$line--;
	}
}

else {
    print "<h3 align=\"center\">We're Sorry!</h3>\n\n<p align=\"center\">We need you to visit our Sorting page for the Stoked Signers<br>so that you can specify how many submissions you<br>would like to view, and what submission to start with.</p>\n\n".
          "<p align=\"center\">[<strong><a href=\"sort_signers.php\" class=\"menubar\">Click here to sort the Stoked List</a></strong>]</p>\n\n".
          "<p align=\"center\">[<strong><a href=\"javascript:window.close();\" class=\"menubar\">Close Window</a></strong>]</p>\n\n</body>\n</html>";
    die();
}

//Close Database
if (!mysql_close($dbh)) {
	die ("Could not Connect to Database: ".mysql_error()."</body>\n</html>");
}
?>

<p align="center">[<strong><a href="javascript:history.go(-1);" class="menubar">Go Back</a></strong>] [<strong><a href="javascript:window.close();" class="menubar">Close Window</a></strong>]</p>

</body>
</html>