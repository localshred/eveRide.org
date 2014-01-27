<h2>So you think you've got what it takes to design a 
gnarly T-shirt?</h2>
<h4>Well, even if you don't, give it a try anyway! It could only get 
you a free t-shirt and props from your friends if you win!</h4>

<p>Okay so here's how it goes. Scan a picture or create your 
work on the computer then <a href="upload_f.php?var=shirt">send us</a> your t-shirt design. We'll display all the designs on the site and then announce the winner when we get around to it!</p>
<p>Here are some helpful hints that should score you some 
bonus points with the judges:</p>
<ul>
  <li>Try to use logos from eveRide and everpark, although 
  creating something totally new would also be rad.</li>
  <li>Cool phrases are... cool.</li>
  <li>Standard colors from the logos are always nice, black 
  and white is always a good choice since color can be added later.</li>
  <li>Keep things clean. We wouldn't want to post anything 
  that your mother wouldn't like to see on the site.</li>
  <li>Be creative and have fun!</li>

</ul>

<table border="0" cellspacing="0" cellpadding="3" align="center" class="blutable" width="300">
<?php
/*
$dir = "shirt/";

if($dh = opendir($dir)) {
	while(false !== ($file = readdir($dh))) {
		if ($file !== '.' && $file !== '..') {
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

if(count($list) !== 0) {
	$dbh = mysql_connect('localhost','everideo_bj','tunahead');
	mysql_select_db('everideo_ss',$dbh);
	
	foreach ($list as $key) {
		$select = "SELECT file, title FROM photo WHERE type = 'shirt' AND file = '$key'";
		$query = mysql_query($select, $dbh);
		//print $select.$query;
		while($row = mysql_fetch_array($query, MYSQL_NUM)) {
			if($i == 1) {
				$cspan= " colspan=\"2\"";
			}
			
			$thumbnail = "<img src=\"shirt/thumbnails/".substr_replace($row[0], '_sm', strpos($row[0], '.'), 0)."\">";
			
			if($i == 1) {
				print	"<tr>\n".
						"\t<td$cspan align=\"center\" width=\"50%\"><a href=\"shirt/design.php?filename=$row[0]\" target=\"_new\" title=\"$row[1]\">$thumbnail</a></td>\n";
			}
			else {
				print	"\t<td align=\"center\" width=\"50%\"><a href=\"shirt/design.php?filename=$row[0]\" target=\"_new\" title=\"$row[1]\">$thumbnail</a></td>\n".
						"</tr>\n";
			}
			$i++;
			$i %= 2;
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
*/
	print "
<tr>
	<td>No Files were found in the Shirt Designs directory.</td>
</tr>
";
/*
}
*/
?>
</table>

<p class="fineprint">Terms and Conditions: By submitting your artwork 
to eveRide you agree that you are willing to have that artwork displayed on websites, posters, and other merchandise without compensation. Once the artwork is on the site it is property of eveRide. Winners will receive a T-shirt with their design printed on it, bragging rights, props from everybody, and will also be advised to seek an exciting career in graphic design. We'll also keep your information so if we like you a lot we'll look into hiring you down the road. Blah blah blah, if you are still reading this you should stop. Ramble ramble have fun, ride hard, love life, etc.</p>
