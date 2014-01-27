<?php
//post variables
$person = stripslashes($_POST['person']);
$email = $_POST['email'];
$var = $_POST['var'];
$ac = (empty($_POST['ac']) ? "No Additional Comments" : stripslashes($_POST['ac']));
$credit = (empty($_POST['credit'])) ? "No Credit" : $_POST['credit'];


//get caption if var == photo and assign link to finish the upload
if ($var == 'photo') {
	$caption = ucwords(stripslashes($_POST['caption']));
	$fl = "<a href=\"https://www.everide.org/~everideo/evereps/go.php?var=$var&action=2&caption=$caption&credit=$person\" target=\"_new\">Go</a>";
}
else {
	$caption = "No Caption";
	$fl = "<a href=\"https://www.everide.org/~everideo/evereps/go.php?var=$var&action=2&credit=$person\" target=\"_new\">Go</a>";
}

//var arrays
$a = 	array(
		'photo' => array('subject' => 'A New Photo has been Submitted',
						'dir' => '/home/everideo/public_html/verify/photo/',
						'link' => 'http://www.everide.org/verify/photo/',
						'email' => 'Photo Upload <photo_contest@everide.org>',
						'msg' => 'Photo'
						),
		'shirt' => array('subject' => 'A New Shirt Design has been Submitted',
						'dir' => '/home/everideo/public_html/verify/shirt/',
						'link' => 'http://www.everide.org/verify/shirt/',
						'email' => 'Shirt Upload <shirts@everide.org>',
						'msg' => 'Shirt Design'
						),
		'terrain' => array('subject' => 'A New Terrain Design has been Submitted',
						'dir' => '/home/everideo/public_html/verify/terrain/',
						'link' => 'http://www.everide.org/verify/terrain/',
						'email' => 'Terrain Upload <terrain_designs@everide.org>',
						'msg' => 'Terrain Design'
						)
		);

//check for blank inputs				
if (!$person) {
    include 'errors/nerror.txt';
    include 'errors/dead.html';
    die();
}

if (!strstr($email,"@")) {
    include 'errors/eerror.txt';
    include 'errors/dead.html';
    die();
}
else {
	$linkemail = "<a href=\"mailto:$email\">$email</a>";
}

if (!$_FILES['userfile']['name']) {
    include 'errors/file_error.txt';
    include 'errors/dead.html';
    die();
}

//file upload variables
$presize = $_FILES['userfile']['size'];
if (strlen($presize) == 7) {
	$size = (round(($presize / 1024000), 2))." MB";
}
elseif (strlen($presize) == 6) {
	$size = (round(($presize / 1024), 2))." KB";
}
else {
	$size = $presize." Bytes";
}
$filename = $_FILES['userfile']['name'];
$tmp = $_FILES['userfile']['tmp_name'];

$copyto = $a["$var"]['dir'].$filename;
$move = move_uploaded_file($tmp, $copyto);

if ($move) {
	
	$pos = substr($filename, strpos($filename, '.'));
	if($pos == '.ai' || $pos == '.psd' || $pos == '.tiff' || $pos == '.tif') {
		$link = $a["$var"]['link'];
	}
	else {
		$link = $a["$var"]['link'].$filename;
	}
	
	$msg = $a["$var"]['msg'];
	$dir = $a["$var"]['dir'];
	$date = date('g:i a')." on ".date('n/j/y');
	$to = $a["$var"]['email'].", ";
        $to .= "briann@tni.com";
	$subject = $a["$var"]['subject'];
	$body = "
<html>
<head>
<title>$subject</title>
</head>
<body>

<p>A New <strong>$msg</strong> has been uploaded to $dir</p>

<p>Upload Information:</p>
<blockquote>
	Sent By: <strong>$person</strong><br>
	Email: <strong>$linkemail</strong><br>
	Upload Occured: <strong>$date</strong><br>
	Filename: <strong>$filename</strong><br>
	Filesize: <strong>$size</strong><br>
	Caption: <strong>".addslashes($caption)."</strong><br>
	Additional Comments: <strong>$ac</strong>
</blockquote>

<p>Check Uploaded File $filename -> <a href=\"$link\" target=\"_new\">Go</a></p>

<p>Upload Finished Files and enter values into the Database -> $fl</p>

</body>
</html>
";
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: Upload.Peck <fileupload@eveRide.org>\r\n";

	$verify = mail($to, $subject, $body, $headers);
	
	print 	"<h2>File Upload Succesful!</h2>\n\n".
			"<p>Here are the Details of your upload:</p>\n\n".
			"<blockquote>\n".
			"Sent By: <strong>$person</strong><br>\n".
			"Email: <strong>$email</strong><br>\n".
			"Upload Occured: <strong>$date</strong><br>\n".
			"Filename: <strong>$filename</strong><br>\n".
			"Filesize: <strong>$size</strong><br>\n".
			"Caption: <strong>$caption</strong><br>\n".
			"Additional Comments: <strong>$ac</strong>".
			"</blockquote>\n\n".
			"<p>Your file should appear on the ".$a["$var"]["msg"]." page within 24 hours. If you have any questions, feel free to <a href=\"contact_f.php?var=general\">contact us</a>. To Upload another ".$a["$var"]["msg"].", <a href=\"upload_f.php?var=$var\">click here</a>.</p>";
}
else {
	print 	"<h2>Your Upload didn't work!</h2>\n\n".
			"<p>The Server Returned this error: ".$_FILES['userfile']['error']."</p>\n\n".
			"<p>Please <a href=\"contact_f.php?sel=error\">contact us</a> concerning the problem. We're sorry for any inconvenience this has caused you!</p>";
	
}

?>