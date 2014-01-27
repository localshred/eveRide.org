<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);
    $getnum = mysql_num_rows(mysql_query("SELECT * FROM `stoked`"));
	
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

if ($length == 3) {
	$one = $numtoimg[0];
	$point_2 = $getnum{0};
	$two = $numtoimg[$point_2];
	$point_3 = $getnum{1};
	$two = $numtoimg[$point_3];
	$point_4 = $getnum{2};
	$two = $numtoimg[$point_4];
	print "Signers: ".$getnum."<br>\nOne: ".$one."<br>\nTwo: ".$two.$point_2."<br>\nThree: ".$three.$point_3."<br>\nFour: ".$four.$point_4;
}
else {
	$point_1 = $getnum{0};
	$one = $numtoimg[$point_1];
	$point_2 = $getnum{1};
	$two = $numtoimg[$point_2];
	$point_3 = $getnum{2};
	$two = $numtoimg[$point_3];
	$point_4 = $getnum{3};
	$two = $numtoimg[$point_4];
	print "Signers: ".$getnum."<br>\nOne: ".$one.$point_1."<br>\nTwo: ".$two.$point_2."<br>\nThree: ".$three.$point_3."<br>\nFour: ".$four.$point_4;
}

mysql_close($dbh);

?>