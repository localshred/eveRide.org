<table class="body" width="140" border="0" cellspacing="0" cellpadding="3">
<tr>
  <td height="20" style="background-image: url('images/get_bar_1.gif'); background-repeat: no-repeat">&nbsp;</td>
</tr>
<tr>
  <td valign="top" style="background-color: #FFFFFF; border-width: 2px; border-left-style: solid; border-bottom-style: solid; border-right-style: solid; border-color: #1a5c8a; line-height: 17px" height="125">
<img src="images/dot.gif" align="middle">&nbsp;<a href="donate_f.php">Buy Crap</a><br>

<img src="images/dot.gif" align="middle">&nbsp;<a href="javascript: void(0);" onClick="javascript:window.open('http://host80.ipowerweb.com:8080/webmail/index.pl','','left=50,top=50,scrollbars=no, resize=no,status=no,width=700,height=700',false);">eveRide E-mail</a><br>


<img src="images/dot.gif" align="middle">&nbsp;<a href="band_f.php">Bands and Music</a><br>
<img src="images/dot.gif" align="middle">&nbsp;<a href="javascript: void(0);" onClick="javascript:window.open('middle/forum.html','','left=50,top=50,scrollbars=no, resize=no,status=no,width=700,height=700',false);">Online Forum</a><br>
<img src="images/dot.gif" align="center">&nbsp;<a href="localphoto_f.php">Local Photos</a><br>
<img src="images/dot.gif" align="center">&nbsp;<a href="photocontest_f.php">Submit a Photo</a><br>
<img src="images/dot.gif" align="center">&nbsp;<a href="shirtcontest_f.php">Shirt Designs</a><br>
<img src="images/dot.gif" align="center">&nbsp;<a href="shout_f.php">Shout Outs</a><br>
<img src="images/dot.gif" align="center">&nbsp;<a href="tell_f.php">Tell a Friend</a><br>
<img src="images/dot.gif" align="center">&nbsp;<a href="terraindesign_f.php">Terrain Designs</a><br>
<img src="images/dot.gif" align="center">&nbsp;<a href="terrainsketch_f.php">Terrain Sketches</a><br>
<img src="images/dot.gif" align="center">&nbsp;<a href="survey_f.php">Survey</a></td>
</tr>

<tr>
  <td colspan="2">&nbsp;</td>
</tr>

<tr>
  <td style="background-image: url('images/he_bar01.gif'); background-repeat: no-repeat" height="30">&nbsp;</td>
</tr>
<tr>
  <td valign="top" style="background-color: #FFFFFF; border-width: 2px; border-left-style: solid; border-bottom-style: solid; border-right-style: solid; border-color: #1a5c8a; line-height: 17px" height="125">
<?php 
/*
$dbh = mysql_connect("localhost","everideo","evertuna");
mysql_select_db("everideo_events",$dbh);

$query = "SELECT `id`, `atitle`, `utitle`, `desc` FROM `hevents` ORDER BY `id` DESC LIMIT 0,1";
$getrows = mysql_query($query, $dbh);

if (mysql_num_rows($getrows) == 0) {
*/
	print "<p class=\"mnevent\">No Events were found. Please check back soon to see when we'll be planning the next event.</p>\n\n";
/*
}
else {
	while ($row = mysql_fetch_array($getrows, MYSQL_NUM)) {
		printf ("<p class=\"mnevent\"><font style=\"color: #b72020\">Title:</font><br>\n%s %s<br>\n<font style=\"color: #b72020\">Description:</font><br>\n%s</p>\n<p><a href=\"event_f.php#%s\" class=\"mnevent\">Get the info<br>for this event</a></p>\n\n", $row[1], $row[2], $row[3], $row[0]);
	}
}

mysql_close($dbh);
*/
?>
  </td>
</tr>
</table>