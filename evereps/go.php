<?php
if (empty($var)) {
	header("location:https://www.everide.org/~everideo/evereps/var.php");
}
/*
if ($action == 3) {
	header("location:https://www.everide.org/~everideo/evereps/gone.php?var=$var&action=$action&submit=submit");
}
*/
if($action == '1' || $action == '2') {
	$enctype =  ' enctype="multipart/form-data"';
}

if ($action == '1') {
	$msg = "<strong>".ucfirst($var)." Upload Only</strong>";
}
elseif ($action == '2') {
	$msg = "<strong>".ucfirst($var)." Upload and Delete</strong>";
}
elseif ($action == '3') {
	$msg = "<strong>".ucfirst($var)." Delete Only</strong>";
}

?>

<html>
<head>
<title>Upload the Finished Products</title>
<link rel="stylesheet" href="newstyle.css" type="text/css">
</head>

<body>

<h2 align="center">Upload and Delete Administration</h2>

<p align="center"><strong><?php echo $msg; ?></strong><br><a href="var.php">Click Here</a> for a different Upload Type or Action</p>

<form<?php echo $enctype; ?> name="uploadfinish" action="gone.php" method="post">
<table border="0" align="center" cellspacing="0" cellpadding="3">
<?php
if($action == '1' || $action == '2') {
	$cspan= ' colspan="2"';
	
	print'<tr>
	<td width="35%" align="right">Main File</td>
	<td><input type="file" name="main" size="25"></td>
</tr>
<tr>
	<td align="right">Thumbnail</td>
	<td><input type="file" name="thumb" size="25"></td>
</tr>
';
	if ($var == 'photo') {
		print 	"<tr>\n".
				"\t<td align=\"right\">Photo Caption</td>\n".
				"\t<td><input type=\"text\" name=\"caption\" value=\"$caption\" size=\"25\"></td>\n".
				"</tr>\n";
	}
	if ($var !== 'article') {
		print '
<tr>
	<td align="right">Credit</td>
	<td><input type="text" name="credit" size="25" value="'. $credit .'"></td>
</tr>
';
	}
}
	print '<tr>
	<td'. $cspan .'><input type="hidden" name="action" value="'. $action .'"></td>
</tr>
<tr>
	<td'. $cspan .'><input type="hidden" name="var" value="'. $var .'"></td>
</tr>
<tr>
	<td'. $cspan .' align="center"><input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear Form"></td>
</tr>
';
?>
<tr>
	<td<?php echo $cspan; ?>>&nbsp;</td>
</tr>
<tr>
	<td align="center"<?php echo $cspan; ?>>[ <strong><a href="everteam.php">Megaman Home</a></strong> ]</td>
</tr>
</table>
</form>

</body>
</html>