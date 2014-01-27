<h3>the eveRide/everpark team</h3>

<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);

print "<h3>Reps/Riders</h3>\n\n";

$riders = "SELECT `name` FROM `team` WHERE `type`='Rider' OR `type`='Rider/Rep' ORDER BY `name`";
$ridequery = mysql_query($riders, $dbh);

print "<blockquote>\n\n";

while ($ride = mysql_fetch_array($ridequery, MYSQL_NUM)) {
	print "\t$ride[0]<br>\n";
}

print "</blockquote>\n\n";

print "<h3>Reps</h3>\n\n";

$reps = "SELECT `name` FROM `team` WHERE `type`='Rep' ORDER BY `name`";
$repquery = mysql_query($reps, $dbh);

print "<blockquote>\n\n";

while ($rep = mysql_fetch_array($repquery, MYSQL_NUM)) {
	print "\t$rep[0]<br>\n";
}

print "</blockquote>\n\n";

mysql_close($dbh);
?>