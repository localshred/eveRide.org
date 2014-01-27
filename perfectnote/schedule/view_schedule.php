<?php
/*
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_pnote',$dbh);

$select = "SELECT stamp, title, info FROM dates WHERE stamp = $date";
$query = mysql_query($select, $dbh);

while($new = mysql_fetch_array($query, MYSQL_NUM)) {
	$title = $new[1];
	$newTime = date('g:i a',$new[0]);
	$newDate = date('n/j/Y', $new[0]);
	$info = nl2br($new[2]);
}
*/
?>
<html>
<head>
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="../style.css" type="text/css">
<script type="text/javascript">
	function send_url(destination) {
		if (window.opener != null) {
			window.opener.location.href = '../'+destination;
			window.close();
		}
		else { 
			window.location.href = '../'+destination;
		}
	}
</script>
</head>

<body>

<table style="margin-left: auto; margin-right: auto; width: 100%; border-style: none" cellpadding="3" cellspacing="0">
<tr>
	<td style="color: #8d6d49; font-size: 20px; text-align: center; border-left-style: solid; border-width: 2px; border-color: #8d6d49"><?php echo $title; ?></td>
</tr>
<tr>
	<td style="color: #8d6d49; font-size: 12px; text-align: right; border-left-style: solid; border-left-width: 2px; border-bottom-style: solid; border-right-width: 1px; border-color: #8d6d49"><?php echo $newTime." 	<strong>&#149;</strong> ".$newDate; ?></td>
</tr>
<tr>
	<td style="border-left-style: solid; border-width: 2px; border-color: #8d6d49; padding-left: 15px; padding-top: 15px"><p style="text-indent: 25px"><?php echo $info; ?></p></td>
</tr>
<tr>
	<td style="border-left-style: solid; border-width: 2px; border-color: #8d6d49">&nbsp;</td>
</tr>
<tr>
	<td style="border-left-style: solid; border-width: 2px; border-color: #8d6d49">&nbsp;</td>
</tr>
<tr>
	<td style="text-align: center">[ <a href="javascript: window.close();">Close</a> ]</td>
</tr>
</table>

</body>
</html>

<?php
mysql_close($dbh);
?>