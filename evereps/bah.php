<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);

$select = "SELECT `name` FROM `stoked`";
$query = mysql_query($select, $dbh);

while($row = mysql_fetch_array($query, MYSQL_NUM)) {
	printf("%s ",$row[0]);
}

mysql_close($dbh);
?>