<?php
//Open DB
$dbh = mysql_connect("localhost", "everideo", "evertuna");
if (! $dbh) {
	die ("Could not access the Database: ".mysql_error()."\n\n</body>\n</html>");
}
mysql_select_db("everideo_ss", $dbh);

$name = $_POST['name'];
if (!$name) {
    include 'errors/nerror.txt';
    include 'errors/dead.html';
    die();
}

$email = $_POST['email'];
if (!strstr($email,"@")) {
    include 'errors/eerror.txt';
    include 'errors/dead.html';
    die();
}

$age = $_POST['age'];
if (!$age) {
    include 'errors/aerror.txt';
    include 'errors/dead.html';
    die();
}

$town = $_POST['town'];
if (!$town) {
    include 'errors/terror.txt';
    include 'errors/dead.html';
    die();
}

$state = $_POST['state'];
if (!$state) {
    include 'errors/serror.txt';
    include 'errors/dead.html';
    die();
}

$nick = $_POST['nick'];
if (!$nick) {
	include 'errors/nierror.txt';
	include 'errors/dead.html';
	die();
}

$comments = $_POST['comments'];
if (!$comments) {
    $comments = 'No Comments Submitted';
}

$refer = $_POST['refer'];


//Format Variable Capitalizations
$name = ucwords(strtolower($name));
$email = strtolower($email);
$town = ucwords(strtolower($town));
$state = strtoupper($state);
$comments = ucfirst(strtolower($comments));

$insert = "INSERT INTO stoked (name, town, state, comments, nick, refer, email, age, ssdate, sstime) VALUES ('$name', '$town', '$state', '$comments', '$nick', '$refer', '$email', '$age', '".date('n/j/y')."', '".date('H:i:s')."')";

if (!mysql_query($insert, $dbh)) {
	die ("Could not Insert into Database: ".mysql_error()."\n\n</body>\n</html>");
}
else {
	print "<h2>Signing Successful!</h2>\n\n<p>Please DO NOT hit the refresh button, your signature will be signed to our Stokedsigners list again.</p>\n\n";
			
	$rows = mysql_query("SELECT * FROM stoked", $dbh);
	$lastrow = mysql_num_rows($rows);
	
	$lastid = mysql_query("SELECT MAX(id) FROM `stoked`",$dbh);
					
	$findcomment = mysql_query("SELECT id, nick, name, email, town, state, sstime, ssdate, comments, refer FROM stoked WHERE `id` = '$lastid' ORDER BY id DESC", $dbh);

	if (mysql_num_rows($findcomment) > 0) {
		
		while ($rowarray = mysql_fetch_array($findcomment, MYSQL_NUM)) {

			if (($rowarray[0]{(strlen ($rowarray[0]))-2}) == '1') {
				$rowarray[0] = $rowarray[0].'th';
			}
			else {
				$lastchar = $rowarray[0]{(strlen ($rowarray[0]))-1};
			
				if ($lastchar == '1') {
					$rowarray[0] = $rowarray[0].'st';
				}
				elseif ($lastchar == '2') {
					$rowarray[0] = $rowarray[0].'nd';
				}
				elseif ($lastchar == '3') {
					$rowarray[0] = $rowarray[0].'rd';
				}
				else {
					$rowarray[0] = $rowarray[0].'th';
				}
			}
			printf ("<table width=\"390\" cellspacing=\"0\" cellpadding=\"3\" class=\"body\" style=\"border-width: 2px; border-color: black; border-style: solid\">\n".
					"<tr>\n".
					"\t<td style=\"border-bottom-style: solid; border-width: 3px; border-color: black\" bgcolor=\"#00549E\" align=\"right\"><font color=\"#FFFFFF\">You are the <strong>%s</strong> signer on our Stoked Signers List</font></td>\n".
					"</tr>\n\n".
					"<tr>\n".
					"\t<td align=\"right\" valign=\"top\" bgcolor=\"#00549E\"><font color=\"#FFFFFF\">posted by: <strong>%s</strong><br>\n(<strong>%s, %s</strong>)<br>\n from <strong>%s</strong>, <strong>%s</strong><br>\nat <strong>%s</strong> on <strong>%s</strong></td>\n".
					"</tr>\n<tr>\n".
					"\t<td valign=\"top\" bgcolor=\"#E6E6E6\">%s</td>\n".
					"</tr>\n<tr>\n".
					"\t<td align=\"right\" bgcolor=\"#E6E6E6\"><font size=\"1\">Referred by: %s</font></td>\n".
					"</tr>\n".
					"</table>\n\n", $rowarray[0], stripslashes($rowarray[1]), $rowarray[2], $rowarray[3], stripslashes($rowarray[4]), $rowarray[5], $rowarray[6], $rowarray[7], $rowarray[8], $rowarray[9]);
		}
		mysql_free_result($findcomment);
	}
}

/* Make Table Stoked
CREATE TABLE `stoked` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`ssdate` VARCHAR( 12 ) ,
`sstime` VARCHAR( 12 ) ,
`name` VARCHAR( 50 ) ,
`email` VARCHAR( 50 ) ,
`age` VARCHAR( 5 ) ,
`town` VARCHAR( 50 ) ,
`state` VARCHAR( 2 ) ,
`nick` VARCHAR( 50 ) ,
`comments` BLOB,
PRIMARY KEY ( `id` ) 
) 
*/

	
	//close DB
if (!mysql_close($dbh)) {
	die ("Could not Close the Database: ".mysql_error()."\n\n</body>\n</html>");
}
?>

<h4>Thank You for signing the stoked list!</h4>

<p>Aside from your current level of radicalness and "hot moves", we'll give you like 10 or 15 more cool points just for signing this list. It gives us the confidence that we're backed by people who really are excited about this project. So thanks, and here are some links for your checking-out enjoyment.... or something like that.</p>

<h4>I'm still stoked!</h4>

<p>Some of you, still having the elation of stoked-ness, may be asking, "Where do I go, How do I start?!". But you don't need to fret, because we've got some instructions for you to continue your stoked-ness, and get others as excited as you are. <a href="tell_f.php">Tell a Friend</a> about the cause, or help us out by <a href="donate_f.php">donating</a> to eveRide.</p>

<h4>What exactly am I stoked about?</h4>

<p>Not sure why you signed this little number? find out on the <a href="everpark_f.php">what is a winterpark?</a> page and the <a href="humanitarian_f.php">humanitarian events</a> page.</p>

<h4>Other stoking methods (we made them up, but they've got to work)</h4>

<p>
<ul type="square">
<li>Yell out "eveRide rules!" in public places like movie theaters, libraries, churches, etc.</li>
<li>Get some stickers and put them on your car, board, family, etc.</li>
<li>Paint your body in eveRide or everpark fashion and run quick like a bunny through the above mentioned places. Most likely you'll be beaten by those offended... but it's all for a good cause... right?</li>
<li>Lay in some field and pretend to be dead, then when the little kids come to poke you with a stick, jump at them and yell, "eveRide!" (they'll be sure not to forget with this method!)"</li>
<li>Get a hot date and make him/her dinner.</li>
</ul>
</p>