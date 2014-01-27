<?php 
/*
$dbh = mysql_connect("localhost", "everideo", "evertuna");
mysql_select_db("everideo_ss", $dbh);

//Print Number of People that have signed the Stoked List
$query = "SELECT * FROM stoked";
$doquery = mysql_query($query, $dbh);
$getlastrow = mysql_num_rows($doquery);
*/
$getlastrow = 0;
print date('n/j/y')." - <script language=\"javascript\" src=\"header/liveclock_lite.js\"></script> <img src=\"images/dot.gif\" align=\"middle\"> Stoked Signers: (<strong><font color=\"#b72020\">".$getlastrow."</font></strong> of 5,000)";

//mysql_close($dbh);
?>