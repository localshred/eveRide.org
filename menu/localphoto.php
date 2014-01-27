<h2>Welcome to the people's photo gallery!</h2>

<p>Here you will find the upcoming stars in snow sports, and 
maybe some current stars! If you would like to have your photo posted in the 
gallery, <a href="upload_f.php?var=photo">submit it</a>, and we'll post it up (Plus you could win free stuff through the <a href="localphoto_f.php">local photo contest</a>!). Enjoy!</p>
<p>Hey since you're posting photos... why not go for a sponsorship or be a rep? Check out our <a href="represent_f.php">reps page</a> for info on how to get sponsored by eveRide and be part of the crew!

<p>
<table border="0" cellspacing="3" cellpadding="3" width="300" align="center" class="blutable">
<tr>
	<td><p>Click Any Photo to see a larger version (Mouseover an image to view caption)</p></td>
</tr>
<!--
<tr>
  <td colspan="2" align="center"><h3>September 11th, 2003 Pictures</h3><p>Yeah that's right, Alta, Utah baby. Hikin' the Rail for 6 hours... you'll see how it went.</p></td>
</tr>
-->
<?php
/*
### SEPT 11th photos ###
$sep_dir = "/home/everideo/public_html/gallery/sept11th/";
$i = 1;

if ($sep_dh = opendir($sep_dir)) {

	$sep_dbh = mysql_connect('localhost','everideo_bj','tunahead');
	mysql_select_db('everideo_ss',$sep_dbh);

	while (false !== ($sep_file = readdir($sep_dh))) {
		if($sep_file != "." && $sep_file != "..") {
			$sep_filelist[] = $sep_file;
		}
	}
	closedir($sep_dh);
}

$sep_count = count($sep_filelist);
	
if ($sep_count !== 0){

	foreach ($sep_filelist as $sep_newfile) {
		$sep_select = "SELECT `file`, `title` FROM `photo` WHERE `type` = 'photo' AND `file` = '$sep_newfile'";
		$sep_get = mysql_query($sep_select, $sep_dbh);

		while($sep_row = mysql_fetch_array($sep_get, MYSQL_NUM)) {
			
			$sep_thumb = substr_replace($sep_row[0], "_sm", strpos($sep_row[0],"."), 0);
			
			if ($i == 1) {
				print 	"<tr>\n".
						"\t<td align=\"center\" width=\"%50\"><a href=\"gallery/image.php?filename=".$sep_row[0]."&dir=11\" target=\"_blank\" title=\"".$sep_row[1]."\"><img src=\"../gallery/sept11th/thumbnails/$sep_thumb\"></a></td>\n";
			}
			else {
				print	"\t<td align=\"center\" width=\"%50\"><a href=\"gallery/image.php?filename=".$sep_row[0]."&dir=11\" target=\"_blank\" title=\"".$sep_row[1]."\"><img src=\"../gallery/sept11th/thumbnails/$sep_thumb\"></a></td>\n".
						"</tr>\n";
			}
			$i++;
			$i %= 2;
		}
	}
	mysql_close($sep_dbh);
}
*/
?>
</table>
</p>
<p>
<table border="0" cellspacing="3" cellpadding="3" width="300" align="center" class="blutable">
<?php
/*
### Regular photos ###
$dir = "/home/everideo/public_html/gallery/";
$i = 1;

if ($dh = opendir($dir)) {
	
	$dbh = mysql_connect('localhost','everideo_bj','tunahead');
	mysql_select_db('everideo_ss',$dbh);
	
	while (false !== ($file = readdir($dh))) {
		if($file != "." && $file != "..") {
			$filelist[] = $file;
		}	
	}
	closedir($dh);
}

$count = count($filelist);


if ($count !== 0) {

	rsort($filelist);
	
	foreach ($filelist as $newfile) {
		$select = "SELECT `file`, `title` FROM `photo` WHERE `type` = 'photo' AND `file` = '$newfile'";
		$get = mysql_query($select, $dbh);

		while($row = mysql_fetch_array($get, MYSQL_NUM)) {
			
			$thumb = substr_replace($row[0], "_sm", strpos($row[0],"."), 0);
			
			if ($i == 1) {
				print 	"<tr>\n".
						"\t<td align=\"center\" width=\"%50\"><a href=\"gallery/image.php?filename=".$row[0]."\" target=\"_blank\" title=\"".$row[1]."\"><img src=\"../gallery/thumbnails/$thumb\"></a></td>\n";
			}
			else {
				print	"\t<td align=\"center\" width=\"%50\"><a href=\"gallery/image.php?filename=".$row[0]."\" target=\"_blank\" title=\"".$row[1]."\"><img src=\"../gallery/thumbnails/$thumb\"></a></td>\n".
						"</tr>\n";
			}
			$i++;
			$i %= 2;
		}
	}
	
	mysql_close($dbh);
}
*/
?>
<tr>
	<td><p>NO PHOTOS FOUND</p></td>
</tr>
</table>