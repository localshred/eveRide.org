<html>
<head>
<title>Submit a Custom Database Query || eveRide.org</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>
<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
$cs = mysql_num_rows(mysql_list_dbs());
$cs1 = (mysql_num_rows(mysql_list_dbs())+1);
mysql_close($dbh);
?>
<form name="custom" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

<table border="0" cellspacing="0" cellpadding="1" width="400" height="200" class="body" style="color: #FFFFFF">
<thead>
<tr>
    <td colspan="<?php echo $cs1; ?>"><h2 style="color: #FFFFFF">Define a Custom MySQL Query</h2></td>
</tr>
<tr>
    <td colspan="<?php echo $cs1; ?>" align="center">
	<input type="radio" name="action" value="SELECT"> SELECT 
	<input type="radio" name="action" value="INSERT"> INSERT 
	<input type="radio" name="action" value="UPDATE"> UPDATE 
	<input type="radio" name="action" value="ALTER TABLE"> ALTER TABLE
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td valign="top" width="100">
	<input type="text" name="var0" size="10" value="*"><br>
	<input type="text" name="var1" size="10" value="``"><br>
	<input type="text" name="var2" size="10" value="``"><br>
	<input type="text" name="var3" size="10" value="``"><br>
	<input type="text" name="var4" size="10" value="``"><br>
	</td>
	<td valign="top">
	<input type="text" name="var5" size="10" value="``"><br>
	<input type="text" name="var6" size="10" value="``"><br>
	<input type="text" name="var7" size="10" value="``"><br>
	<input type="text" name="var8" size="10" value="``"><br>
	<input type="text" name="var9" size="10" value="``"><br>
	</td>
	<?php 
	if ($cs >= '3') {
		$i = $cs - 2;
		while ($i+$cs>=$cs) {
			echo "\t<td>&nbsp;</td>\n";
			$i--;
		}
	}
	?>
</tr>
<tr>
    <td valign="top" align="right" width="25%">FROM</td>
<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');

$num = (mysql_num_rows(mysql_list_dbs())-1);
	$i = 0;
	while ($i <= $num) {
		$getdb = mysql_db_name(mysql_list_dbs(),$i);
		
		print "<td align=\"center\">$getdb&nbsp;<select name=\"$getdb\">";
		
		$tables = mysql_list_tables($getdb);
		while ($tblrow = mysql_fetch_array($tables)) {
			printf ("\t<option value=\"%s\">%s</option>\n", $tblrow[0], $tblrow[0]);
		}
		
		print "</select>\n</td>\n";
		
		$i++;
	}

mysql_close($dbh);
?>

</tr>
<tr>
	<td valign="top" align="right" width="25%">WHERE</td>
	<td colspan="<?php echo $cs; ?>"><input type="text" name="where" size="20"></td>
</tr>
<tr>
	<td valign="top" align="right" width="25%">ORDER BY</td>
	<td colspan="<?php echo $cs; ?>"><input type="text" name="order" size="20" value="``"><br><input type="radio" name="desc" value="DESC"> Descending</td>
</tr>
<tr>
	<td valign="top" align="right" width="25%">Other Custom:</td>
	<td colspan="<?php echo $cs; ?>"><input type="text" name="other" size="40"></td>
</tr>
<tr>
    <td colspan="<?php echo $cs1; ?>">&nbsp;</td>
</tr>
<tr>
    <td align="center" colspan="<?php echo $cs1; ?>"><input type="submit" name="submit" value="Run Query">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Clear Query"></td>
</tr>
</thead>

<tbody height="400">
<tr>
    <td colspan="<?php echo $cs1; ?>" valign="top">
<?php
if ($submit) {
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db("$db",$dbh);

$customquery = mysql_query($query, $dbh);

    if (!$customquery) {
        print "<h2 style=\"color: red\">Your Query was invalid, please try again</h2>\n\n";
    }
    else {
    print "<h2 style=\"color: red\">Your Query has gone through!</h2>\n\n";
    }

mysql_close($dbh);
}
?>
    </td>
</tr>
</tbody>

<tfoot>
<tr>
    <td align="center" colspan="<?php echo $cs1; ?>">I am a Tuna</td>
</tr>
</tfoot>
</table>

</form>

</body>
</html>
