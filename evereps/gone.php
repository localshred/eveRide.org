<?php
if(!$submit) {
	include ("../errors/404.html");
	die();
}
else {

//get var variables
$var = $_POST['var'];
$credit = empty($_POST['credit']) ? "No Credit" : $_POST['credit'];
if ($var == 'photo') {
	$caption = (empty($_POST['caption'])) ? "" : $_POST['caption'];
}

//var arrays
$a = 	array(
		'photo' => array('title' => '',
						'dir' => '/home/everideo/public_html/gallery/',
						'temp' => '/home/everideo/public_html/verify/photo/',
						'thumb' => '/home/everideo/public_html/gallery/thumbnails/',
						'check' => 'http://www.everide.org/localphoto_f.php',
						'link' => 'http://www.everide.org/verify/photo/'
						),
		'shirt' => array('title' => '',
						'dir' => '/home/everideo/public_html/shirt/',
						'temp' => '/home/everideo/public_html/verify/shirt/',
						'thumb' => '/home/everideo/public_html/shirt/thumbnails/',
						'check' => 'http://www.everide.org/shirtcontest_f.php',
						'link' => 'http://www.everide.org/verify/shirt/'
						),
		'terrain' => array('title' => '',
						'dir' => '/home/everideo/public_html/terrain/',
						'temp' => '/home/everideo/public_html/verify/terrain/',
						'thumb' => '/home/everideo/public_html/terrain/thumbnails/',
						'check' => 'http://www.everide.org/terrainsketch_f.php',
						'link' => 'http://www.everide.org/verify/terrain/'
						),
		'article' => array('title' => '',
						'dir' => '/home/everideo/public_html/articles/images/',
						'thumb' => '/home/everideo/public_html/articles/thumbnails/',
						'check' => 'http://www.everide.org/articles/images/',
						)
		);

?>
<html>
<head>
<title>Check it... BRA!</title>
<link rel="stylesheet" href="newstyle.css" type="text/css">
</head>

<body>
<table border="0" cellspacing="0" cellpadding="3" align="center" class="blbody">
<?php

if ($action == '2' || $action == '1') {
	print	"<tr>\n".
			"\t<td valign=\"top\">\n";

	############### mainfile variables ###############
	$main_name = $_FILES['main']['name'];
	$main_tmp = $_FILES['main']['tmp_name'];
	$main_size = $_FILES['main']['size'];
	
	$main_dir = $a["$var"]["dir"];
	$check = ($var !== 'article') ? $a["$var"]["check"] : $a["$var"]["check"]."$main_name";

	$move_main = move_uploaded_file($main_tmp, $main_dir.$main_name);
	if($move_main) {
		
		print 	"<h2 align=\"center\" style=\"color: #FFFFFF\">Mainfile!</h2>".	
				"<h4 align=\"center\" style=\"color: #FFFFFF\">Uploaded Successful</h2>\n\n".
				"<p align=\"center\"><a href=\"$check\" target=\"_new\">Click Here</a> to Verify it's ALL good.</p>";

		###  Find Image size and Insert values into Database ###
		$size = getimagesize($main_dir.$main_name);
		$height = ($size[0] > $size[1]) ? "wide" : "tall";

		$dbh = mysql_connect('localhost','everideo_bj','tunahead');
		mysql_select_db('everideo_ss',$dbh);
		
		$insert = "INSERT INTO photo (file, title, credit, type, height) VALUES ('$main_name', '$caption', '$credit', '$var', '$height')";
		$insquery = mysql_query($insert, $dbh);
		if ($insquery) {
			print 	"<p align=\"center\">Values Successfully entered into the Database\n".
					"<ul>\n".
					"\t<li>Filename: $main_name</li>\n".
					"\t<li>Caption: $caption</li>\n".
					"\t<li>Credit: $credit</li>\n".
					"\t<li>Upload Type: $var</li>\n".
					"\t<li>Image Height: $height</li>\n".
					"</ul></p>\n\n";
		}
	
		mysql_close($dbh);
	}
	else {
		print "<p>No Good</p>\n\n";
		print_r($_FILES['main']);
	}

	print	"\t</td>\n".
			"\t<td valign=\"top\">\n";
		
	############### thumbfile variables ###############
	$thumb_name = $_FILES['thumb']['name'];
	$thumb_tmp = $_FILES['thumb']['tmp_name'];
	$thumb_size = $_FILES['thumb']['size'];
	
	$thumb_dir = $a["$var"]["thumb"];
	$check = ($var !== 'article') ? $a["$var"]["check"] : $a["$var"]["check"]."$main_name";

	$move_thumb = move_uploaded_file($thumb_tmp, $thumb_dir.$thumb_name);
	if($move_thumb) {
		print 	"<h2 align=\"center\" style=\"color: #FFFFFF\">Thumbnails!</h2>\n\n".	
				"<h4 align=\"center\" style=\"color: #FFFFFF\">Uploaded Successfully</h2>\n\n".
				"<p align=\"center\"><a href=\"$check\" target=\"_new\">Click Here</a> to Verify it's ALL good.</p>";
	}
	else {
		print "<p>No Good</p>\n\n";
		print_r($_FILES['thumb']);
	}
	print	"\t</td>\n".
			"</tr>\n";
}

############### delete a temp file? ###############
if ($action == '3'|| $action == '2') {
	
	print	"<tr>\n".
			"\t<td valign=\"top\">\n";

	print 	"<form name=\"deltempfile\" action=\"delete.php\" method=\"post\">\n\n".
			"<table width=\"300\" border=\"0\" class=\"blbody\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">";
	
	$deldir = $a["$var"]["temp"];
	$checkdir = $a[$var]["link"];

	$dh = opendir($deldir);
	if($dh) {
		
		print 	"<tr>\n".
				"\t<td align=\"center\"><h4>Delete a Temporary File</h4></td>\n".
				"</tr>\n".
				"<tr>\n".
				"\t<td>\n";
		
		while (false !== ($file = readdir($dh))) {
			if ($file != "." && $file != "..") {
				$del_list[] = $file;
			}
		}
	}
	closedir($dh);
	
	if (count($del_list) !== 0) {
		foreach ($del_list as $key) {
			$pos = substr($key, strpos($key, '.'));
			
			if($pos == '.ai' || $pos == '.psd' || $pos == '.tif' || $pos == '.tiff') {
				print "<input type=\"checkbox\" name=\"filedel[]\" value=\"$key\"> $key<br>";
			}
			else {
				print "<input type=\"checkbox\" name=\"filedel[]\" value=\"$key\"> <a href=\"$checkdir$key\" target=\"_blank\">$key</a><br>\n";
			}		
		}
		
		print 	"\t</td>\n".
				"</tr>\n".	
				"<tr>\n".
				"\t<td><input type=\"hidden\" name=\"deldir\" value=\"$deldir\"></td>\n".
				"</tr>\n".	
				"<tr>\n".
				"\t<td><input type=\"submit\" name=\"delsubmit\" value=\"Delete Selected Files\"></td>\n".
				"</tr>\n".
				"<tr>\n".
				"\t<td>&nbsp;</td>\n".
				"</tr>\n".
				"<tr>\n".
				"\t<td align=\"center\">[ <strong><a href=\"var.php\">Back To Upload Types and Actions</a></strong> ]</td>\n".
				"</tr>\n".
				"</table>\n";
	}
	else {
		print 	"<tr>\n".	
				"\t<td align=\"center\">No Files were found in the ".strtoupper($var)." Temp Directory</td>\n".
				"</tr>\n".
				"<tr>\n".
				"\t<td>&nbsp;</td>\n".
				"</tr>\n".
				"<tr>\n".
				"\t<td align=\"center\">[ <strong><a href=\"var.php\">Back To Upload Types and Actions</a></strong> ]</td>\n".
				"</tr>\n".
				"</table>\n";
	}
	print	"\t</form>\n".	
			"\t</td>\n".
			"</tr>\n";
}
?>
</table>

</body>
</html>
<?php
//close first else
}
?>