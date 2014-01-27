<?php
/********************************************
*											*
*	Script Designed to assess the location	*
*	of the user and print an appropriate 	*
*	Menu for Site Navigation.				*
*											*
*********************************************/

$file = $_SERVER['REQUEST_URI'];
$location = substr_replace($file, '', 0, strlen('/perfectnote/'));

$menuArray = array(
				'classes.php' => array(
									'title' => 'Classes',
									'header' => '<img src="images/classes_over.gif">'
								),
				'instruct.php' =>  array(
									'title' => 'Instructors',
									'header' => '<img src="images/instructors_over.gif">'
								),
				'signup.php' =>  array(
									'title' => 'Sign Up',
									'header' => '<img src="images/signup_over.gif">'
								),
				'goals.php' =>  array(
									'title' => 'Our Goals',
									'header' => '<img src="images/goals_over.gif">'
								),
				'schedule.php' =>  array(
									'title' => 'Class Schedule',
									'header' => '<img src="images/schedule_over.gif">'
								),
				'contact.php' =>  array(
									'title' => 'Contact Us',
									'header' => '<img src="images/contact_over.gif">'
								),
				'mail.php' =>  array(
									'title' => 'Contact Perfect Note',
									'header' => '<img src="images/contact_over.gif">'
								),

			);
			
$header = strstr($location, 'step') ? '<img src="images/signup_over.gif">' : $menuArray["$location"]['header'];

print "
<table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" width=\"750\">
<tr>
	<td colspan=\"2\" align=\"center\">$header</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\" style=\"border-color: #8d6d49; border-top-style: solid; border-bottom-style: solid; border-width: 1px\">
";

while (list($link, $title) = each($menuArray)) {
	if ($link !== 'mail.php') {
		if ($link !== $location) {
			print "<a href=\"$link\" class=\"menu\">".$title['title']."</a>\n";
		}
		else {
			print "<font class=\"selected\">".$title['title']."</font>";
		}
	}
}

print "
	</td>
</tr>
<tr>
	<td align=\"right\" class=\"home\" height=\"34\" width=\"526\"><a href=\"index.php\" style=\"color: #999999;\">HOME:</a></td>
	<td><a href=\"index.php\" class=\"home\" height=\"34\" width=\"224\"><img src=\"images/sm_logo.gif\"></a></td>
</tr>
</table>
";
?>