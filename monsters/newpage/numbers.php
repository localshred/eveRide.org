<?php
/*
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);

	//Print Number of People that have signed the Stoked List
	$query = "SELECT * FROM stoked";
	$doquery = mysql_query($query, $dbh);
	$getnum = mysql_num_rows($doquery);
	$getnum = "".$getnum;
	$length = strlen($getnum);

$numtoimg = array(
			'images/num/num_0.gif',
			'images/num/num_1.gif',
			'images/num/num_2.gif',
			'images/num/num_3.gif',
			'images/num/num_4.gif',
			'images/num/num_5.gif',
			'images/num/num_6.gif',
			'images/num/num_7.gif',
			'images/num/num_8.gif',
			'images/num/num_9.gif'
			);


if ($length == '3') {
	$i = 0;
	
	print 	"\t\t<TD ROWSPAN=2>\n".
				"\t\t\t<IMG SRC=\"".$numtoimg[0]."\" WIDTH=13 HEIGHT=39 ALT=\"\"></TD>\n";
	
	while ($i < $length) {
		if ($i == '1') {
			$convert = $getnum{$i};
	
			print 	"\t\t<TD ROWSPAN=2 COLSPAN=2>\n".
					"\t\t\t<IMG SRC=\"".$numtoimg[$convert]."\" WIDTH=13 HEIGHT=39 ALT=\"\"></TD>\n";
	
			$i++;
		}
		else {
			$convert = $getnum{$i};
	
			print 	"\t\t<TD ROWSPAN=2>\n".
					"\t\t\t<IMG SRC=\"".$numtoimg[$convert]."\" WIDTH=13 HEIGHT=39 ALT=\"\"></TD>\n";
	
			$i++;
		}
	}
}
else {
	$i = 0;
	while ($i < $length) {
	if ($i == '2') {
			$convert = $getnum{$i};
	
			print 	"\t\t<TD ROWSPAN=2 COLSPAN=2>\n".
					"\t\t\t<IMG SRC=\"".$numtoimg[$convert]."\" WIDTH=13 HEIGHT=39 ALT=\"\"></TD>\n";
	
			$i++;
		}
		else {
			$convert = $getnum{$i};
	
			print 	"\t\t<TD ROWSPAN=2>\n".
					"\t\t\t<IMG SRC=\"".$numtoimg[$convert]."\" WIDTH=13 HEIGHT=39 ALT=\"\"></TD>\n";
	
			$i++;
		}
	}
}


mysql_close($dbh);
*/
			print 	"\t\t<TD ROWSPAN=2>\n".
					"\t\t\t<IMG SRC=\"images/num/num_0.gif\" WIDTH=13 HEIGHT=39 ALT=\"\"></TD>\n".
					"\t\t<TD ROWSPAN=2>\n".
					"\t\t\t<IMG SRC=\"images/num/num_0.gif\" WIDTH=13 HEIGHT=39 ALT=\"\"></TD>\n".
					"\t\t<TD ROWSPAN=2>\n".
					"\t\t\t<IMG SRC=\"images/num/num_0.gif\" WIDTH=13 HEIGHT=39 ALT=\"\"></TD>\n".
					"\t\t<TD ROWSPAN=2>\n".
					"\t\t\t<IMG SRC=\"images/num/num_0.gif\" WIDTH=13 HEIGHT=39 ALT=\"\"></TD>\n";

?>