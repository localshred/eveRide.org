<html>
<head>
<title></title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>
<h2 align="center" style="color: #FFFFFF">Register your band<br>for our Humanitarian Events!</h2>

<table class="table" width="50%" align="center" border="0" cellspacing="0" cellpadding="3">
<form name="band_reg" method="post" action="registered.php">
<tr>
    <td align="right" valign="top">Band Name:</td>
    <td><input type="text" name="bndname" size="25"></td>
</tr>

<tr>
    <td align="right" valign="top">Hometown:</td>
    <td><input type="text" name="town" size="25" value="City, ST"></td>
</tr>

<tr>
    <td align="right" valign="top">Your Band's Website:</td>
    <td><input type="text" name="site" size="35" value="http://"></td>
</tr>

<tr>
    <td align="right" valign="top">Link to Your Sample Music (optional):</td>
    <td><input type="text" name="samp_link" size="35"></td>
</tr>

<tr>
    <td align="right" valign="top">Your Type of Music:</td>
    <td>
<select name="type">
<option value="rock">Rock</option>
<option value="punk">Punk</option>
<option value="emo">Emo</option>
<option value="rap">Rap</option>
<option value="other">Other</option>
    </td>
</tr>

<tr>
    <td align="right" valign="top">Band's General Description:</td>
    <td>
<textarea name="desc" cols="35" rows="3">Number of Players
Years Playing together (or months)
Number of Records
etc...</textarea>
    </td>
</tr>

<tr>
    <td align="center" colspan="2"><input type="submit" name="submit" value="Register">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset"></td>
</tr>

</form>
</table>

</body>
</html>
