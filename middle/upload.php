<?php 

if ($var == 'photo') {
	$title = "<h2>Submit your picture for the Local Photos!</h2>\n\n";
	$img = " style=\"background-image: url(images/photoupload.gif); background-position: bottom center; background-repeat: no-repeat\"";
	$ht = " height=\"320\"";
}
elseif ($var == 'shirt') {
	$title = "<h2>Submit your eveRide Shirt Design!</h2>\n\n";
	$img = " style=\"background-image: url(images/shirtupload.gif); background-position: bottom center; background-repeat: no-repeat\"";
	$ht = " height=\"250\"";
}
elseif ($var == 'terrain') {
	$title = "<h2>Submit your gnarliest Terrain Design!</h2>\n\n";
	$img = " style=\"background-image: url(images/terrainupload.gif); background-position: bottom center; background-repeat: no-repeat\"";
	$ht = " height=\"150\"";
}
else {
	$title = "<h2>Upload a File</h2>\n\n";
	$img = " style=\"background-image: url(images/photoupload.gif); background-position: bottom center; background-repeat: no-repeat\"";
	$ht = " height=\"320\"";
}

print $title;

?>

<form enctype="multipart/form-data" action="uploaded_f.php" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="2048000">
<table class="body" border="0" cellpadding="3" cellspacing="0" align="center" width="100%" height="100%"<?php echo $img; ?>>
<tr>
	<td align="right">Name:</td>
	<td><input type="text" name="person" size="25"></td>
</tr>
<tr>
	<td align="right">File to Upload:</td>
	<td><input type="file" name="userfile" size="25"></td>
</tr>
<?php
if($var == 'photo') {
	print	"<tr>\n".
			"\t<td align=\"right\">Photo Caption:</td>\n".
			"\t<td><input type=\"text\" name=\"caption\" maxlength=\"35\" size=\"25\"></td>\n".
			"</tr>\n";
}
?>
<tr>
	<td align="right">Credit:</td>
	<td><input type="text" name="credit" size="25"></td>
</tr>
<tr>
	<td valign="top" align="right">Additional Comments:</td>
	<td><textarea name="ac" rows="3" cols="25"></textarea></td>
</tr>
<tr>
	<td align="right">Email:</td>
	<td><input type="text" name="email" size="25"></td>
</tr>
<tr>
	<td colspan="2"><input type="hidden" name="var" value="<?php echo $var; ?>"></td>
</tr>
<tr>
	<td colspan="2" valign="top" align="center"<?php echo $ht; ?>><input type="submit" name="submit" value="Upload File">&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear Form"></td>
</tr>
</table>
</form>