<a name="stoked"></a><h2>SIGN THE STOKED LIST</h2>

<p>First off, we've been told that a lot of people are sketchy about giving out their email, but don't worry, we won't be selling it (It has something to do with that whole Business Ethics stuff, i.e. Billy Madison). One of our main goals for this site is to have <strong><u>5,000</u></strong> people sign the Stoked List by April 1, 2004.<br>We know this is a huge goal, that's why we need you to tell all your friends about eveRide.org. Go check out the <a href="vc_f.php">Vision and Concept</a> page to figure out why our Goals are so high. Let the sponsors know you're stoked, and <strong>LET THE PEOPLE RIDE!</strong></p>

<form name="stokedlist" method="POST" action="signed_f.php">
  <h2>Show them that you're stoked!</h2>
 
<table border="0" class="body" width="100%">
<tr>
<td colspan="2" align="center"><font color="red">*</font> These Fields will NOT be posted publicly</td>
</tr>

<tr>
	<td colspan="2">&nbsp;</td>
</tr>

<tr>
<td valign="top" align="right" width="35%">Name: </td>
<td><input type="text" name="name" size="25"> <font color="red">*</font></td>
</tr>

<tr>
<td valign="top" align="right" width="35%">Email: </td>
<td><input type="text" name="email" size="25"> <font color="red">*</font></td>
</tr>

<tr>
<td valign="top" align="right" width="35%">Age: </td>
<td><input type="text" name="age" size="5"> <font color="red">*</font></td>
</tr>

<tr></tr>
<td valign="top" align="right" width="35%">Nick Name: </td>
<td><input type="text" name="nick" size="25"></td>
</tr>

<tr>
<td valign="top" align="right" width="35%">Your Hometown: </td>
<td><input type="text" name="town" size="25"></td>
</tr>

<tr>
<td valign="top" align="right" width="35%">Your State (ie. UT): </td>
<td><input type="text" name="state" size="5"></td>
</tr>

<tr>
<td valign="top" align="right" width="35%">I saw, or was told by:</td>
<td><select name="refer">

<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);

$reps = "SELECT `name` FROM `team` WHERE `type` != 'administrator' ORDER BY `type`, `name`";
$query = mysql_query($reps, $dbh);

while ($row = mysql_fetch_array($query, MYSQL_NUM)) {
    printf ("\t<option value=\"%s\">%s</option>\n", $row[0], $row[0]);
}

mysql_close($dbh);
?>
    </select>
<tr>
<td valign="top" colspan="2"><font align="center" style="font-size: 9px">Not sure what actual "Stokedness" is? <a href="everpark_f.php">Click Here</a></font><br><textarea name="comments" rows="5" cols="40"></textarea></td>
</tr>

<tr>
<td colspan="2"><font size="-2">Please do not post anything offensive.</font></td>
</tr>

<tr>
<td align="center" colspan="2"><input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear"></td>
</tr>
</table>

<p class="fineprint"><font color="red">*</font> These fields will not be posted publicly on this website (Name, Email, and Age). Fields without an asterisk will be posted on our <a onClick="javascript:window.open('sl/sort_signers.php','','scrollbars=yes,height=520,width=640', false);" href="javascript:void(0);">stoked signers page</a> for all visitors to view. All information submitted will not be sold or traded to an outside source. All information submitted will be used internally for demographics and the occasional random drawings/rewards. <a href="contact_f.php?sel=stoked">Contact us</a> with questions concerning this policy.</p>

</form>
</body>
</html>