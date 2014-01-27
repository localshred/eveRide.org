<h2>Declassified everpark Terrain</h2>

<p>Help yourself to a sample of what we'll be jam-packing into the everparks. I know this probably won't be enough to fill you up, since you can only drool over the sketches instead of stuffing yourself with goodness, but maybe it'll motivate you to <a href="tell_f.php">tell a friend</a>, <a href="stoked_f.php">sign the stoked list</a>, or even <a href="donate_f.php">donate</a>. Remember, all of this terrain will be groomed to perfection by the <a href="winterpark_f.php#wgg">white glove groomers</a>.</p>

<p>If you have a sweet terrain combination or a new kind of terrain you'd like to see us build, submit that mamma-jamma on the <a href="terraindesign_f.php">terrain design</a> page.</p>
<p>If you'd like to read more about the terrain, check out the <a href="everpark_f.php#ter">everpark terrain info page</a>.</p>

<table border="0" cellspacing="0" cellpadding="3" align="center" class="blutable" width="300">
<?php
$dir = "terrain/";

if($dh = opendir($dir)) {
	while(false !== ($file = readdir($dh))) {
		if ($file !== '.' && $file !== '..' && $file !== 'thumbnails' && $file !== 'design.php') {
				$list[] = $file;
		}
	}
	closedir($dh);
}
else {
	print "<p>Could Not Open Directory <strong>$dir</strong></p>";
}

$i = 1;
$count = count($list);

if($count !== 0) {
	$dbh = mysql_connect('localhost','everideo_bj','tunahead');
	mysql_select_db('everideo_ss',$dbh);
	
	foreach ($list as $key) {
		$select = "SELECT file, title FROM photo WHERE type = 'terrain' AND file = '$key'";
		$query = mysql_query($select, $dbh);
		
		if ($query) {
			while($row = mysql_fetch_array($query, MYSQL_NUM)) {
				if($i %= 1) {
					$cspan= " colspan=\"2\"";
				}
				
				$thumbnail = "<img src=\"terrain/thumbnails/".substr_replace($row[0], '_sm', strpos($row[0], '.'), 0)."\">";
				
				if($i == 1) {
					print	"<tr>\n".
							"\t<td align=\"center\" width=\"50%\"><a href=\"terrain/design.php?filename=$row[0]\" target=\"_new\" title=\"$row[1]\">$thumbnail</a></td>\n";
				}
				else {
					print	"\t<td align=\"center\" width=\"50%\"><a href=\"terrain/design.php?filename=$row[0]\" target=\"_new\" title=\"$row[1]\">$thumbnail</a></td>\n".
							"<tr>\n";
				}
			$i++;
			$i %= 2;		
			}
		}
	}
	if (($count %= 2) == 1 && $count !== 1) {
		print	"\t<td width=\"50%\">&nbsp;</td>\n".
		"</tr>\n";
	}
	if ($count == 1) {
		print	"</tr>\n";
	}
	mysql_close($dbh);
}
else {
	print"
<tr>
	<td align=\"center\"><strong>Tyler's working on the Terrain Sketches as we speak... they'll be up soon. But if you can't wait, <a href=\"contact_f.php?sel=general\" class=\"menubar\">email</a> him and say something mean, it'll get him rippin'!</strong></td>
</tr>
";
}
?>
</table>
