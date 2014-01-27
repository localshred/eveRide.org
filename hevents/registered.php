<html>
<head>
<title>Thank you for registering! || eveRide.org</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>
<?php

//format variables from band_reg.php
$bndname = stripslashes($_POST['bndname']);
$town = ucwords(strtolower($_POST['town']));
$site = (empty($_POST['site'])) || ($_POST['site'] == 'http://') ? "No Web Address" : $_POST['site'];
$samp_link = (empty($_POST['samp_link'])) ? "No Sample Given" : $_POST['samp_link'];
$type = $_POST['type'];
$desc = (empty($_POST['desc'])) ? "No Description Available" : stripslashes($_POST['desc']);

//check for blank entries
if (!$bndname) {
    include '../errors/bnd_name.txt';
    include '../errors/bnd_dead.html';
    die();
    }

if (!$town) {
    include '../errors/bnd_town.txt';
    include '../errors/bnd_dead.html';
    die();
    }

if (!$desc) {
    include '../errors/bnd_desc.txt';
    include '../errors/bnd_dead.html';
    die();
    }

$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_events', $dbh);

//insert into database
$dup = "SELECT `name` FROM `bands` WHERE `name`='$bndname'";
$dupquery = mysql_num_rows(mysql_query($dup, $dbh));
if($dupquery == 0) {
	$register = "INSERT INTO `bands` (`name`, `town`, `site`, `sample`, `type`, `description`) VALUES ('$bndname', '$town', '$site', '$samp_link', '$type', '$desc')";
	$query = mysql_query($register, $dbh);
	if ($query) {
		print "<h2 style=\"color: #FFFFFF\">Registration Successful!</h2>";
	}
	else {
		print 	"<h2 style=\"color: #FFFFFF\" align=\"center\">We're Sorry!</h2>\n\n".
				"<table border=\"0\" align=\"center\" width=\"400\" class=\"body\">\n".
				"<tr>\n".
				"<td class=\"error\">There was an Error while trying to register your Band. Please contact <a href=\"mailto:events@everide.org\" class=\"menubar\">Events@eveRide.org</a> concerning the problem.</td>\n".
				"</tr>\n<table>\n\n";
				include ('../errors/bnd_dead.html');
				die();
	}
	
	$view = "SELECT `name`, `town`, `site`, `sample`, `type`, `description` FROM `bands` WHERE `name`='$bndname'";
	$newquery = mysql_query($view, $dbh);
	
	while($row = mysql_fetch_array($newquery, MYSQL_NUM)) {
		$row[2] = (empty($row[2]) ? 'No Website Address Given' : $row[2]);
		$row[3] = (empty($row[2]) ? 'No Sample Link Address Given' : $row[3]);
	
		printf ("<p><strong>Your Registration Records</strong></p>\n\n".
		"Band Name: <strong>%s</strong><br>\n".
		"Hometown: <strong>%s</strong><br>\n".
		"Website: <strong>%s</strong><br>\n".
		"Sample Music Link: <strong>%s</strong><br>\n".
		"Music Type: <strong>%s</strong><br>\n".
		"Description:<br>\n<strong>%s</strong><br>\n", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
	}
}
else {
	print 	"<h2 style=\"color: #FFFFFF\" align=\"center\">We're Sorry!</h2>\n\n".
			"<table border=\"0\" align=\"center\" width=\"400\" class=\"body\">\n".
			"<tr>\n".
			"<td class=\"error\"><p>We show another record already created for the band $bndname. If you have made a mistake in signing up, please hit the back button. Your information will be preserved.</p>\n\n<p>If you are trying to re-enter your band's information, please email the new or updated information to <a href=\"mailto:events@everide.org\" class=\"menubar\">Events@eveRide.org</a>.</p></td>\n".
			"</tr>\n<table>\n\n";
}

print "<p align=\"center\">[<strong><a href=\"javascript:history.go(-1);\" class=\"menubar\">Go Back</a></strong>]</p>";

mysql_close($dbh);
?>
</body>
</html>
