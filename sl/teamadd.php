<html>
<head>
<title>Add a Rep/Rider</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>
<h2 class="eventtext">Add a New Rep or Rider</h2>

<p align="center">&middot; <a href="teamadmin.php" class="menubar">Team Administration</a> &middot; <a href="teamedit.php" class="menubar">Edit Team</a><a href="teamdel.php" class="menubar">Delete a Rider/Rep</a> &middot;</p>

<form name="addteam" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<table border="0" cellspacing="0" cellpadding="3" width="500">
<tr>
  <td align="right">Name: </td>
  <td><input type="text" name="name" size="25"></td>
</tr>
<tr>
  <td align="right">Email: </td>
  <td><input type="text" name="email" size="25"></td>
</tr>
<tr>
  <td align="right">Phone: </td>
  <td><input type="text" name="phone1" size="10"></td>
</tr>
<tr>
  <td align="right">Phone 2: </td>
  <td><input type="text" name="phone2" size="10"></td>
</tr>
<tr>
  <td align="right">City: </td>
  <td><input type="text" name="city" size="20"></td>
</tr>
<tr>
  <td align="right">State: </td>
  <td><input type="text" name="state" size=""></td>
</tr>
<tr>
  <td align="right">Member Type: </td>
  <td><select name="type">
      <option value="Rep">Rep</option>
      <option value="Rider">Rider</option>
      <option value="Rider/Rep">Rider/Rep</option>
      </select>
  </td>
</tr>
<tr>
  <td align="right" valign="top">Comments: </td>
  <td><textarea name="comments" cols="25" rows="3"></textarea></td>
</tr>
<tr>
  <td coslspan="2">&nbsp;</td>
</tr>
<tr>
  <td align="center"><input type="submit" name="teamsubmit" value="Add that Beeeeach!"></td>
  <td align="center"><input type="reset" name="reset" value="Clear Fields"></td>
</tr>
</table>

<?php

$dbh = mysql_connect("localhost","everideo_bj","tunahead");
if (!$dbh)
	{
	die ("Couldn't connect to Database: ".mysql_error()."</body>\n</html>");
	}
mysql_select_db("everideo_ss", $dbh);

if ($_POST['teamsubmit']) {

//format variables
$name = ucwords(strtolower($name));
$email = strtolower($email);
$city = ucwords(strtolower($city));
$state = strtoupper($state);
$comments = ucfirst(strtolower($comments));

//insert new member into database
$insertquery = "INSERT INTO `team` (`name`, `email`, `phone1`, `phone2`, `city`, `state`, `type`, `comments`) VALUES ('$name', '$email', '$phone1', '$phone2', '$city', '$state', '$type', '$comments')";

$insert = mysql_query($insertquery, $dbh);
if (!$insert)
  {
  die ("Could not insert into Database: ".mysql_error()."</body>\n</html>");
  }
else
  {
  print "<h2 class=\"eventtext\">Team Turd Added Successfully! You are still awesome!</h2>\n\n";
  }

if (!mysql_close($dbh))
	{
	die ("Couldn't close Database: ".mysql_error."</body>\n</html>");
	}
}
?>

</form>
</body>
</html>