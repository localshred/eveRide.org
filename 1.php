<?php

$a = 43;

if (($a %= 2) == 1) {
	print $a %= 2;
	print "<p>It Worked!</p>";
	//phpinfo();
}
else {
	print "<p>It didn't work!</p>";
}

?>