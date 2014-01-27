<table border="0" cellspacing="0" cellpadding="3" width="100%" class="body">
 <tr>
  <td height="130" width="370" valign="top"><?php

$image_swap = array('mountlogo', 'trail', 'timp', 'parkerbs', 'back_country', 'committed');
$num = rand(0,5);

if($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/index.php') {
print "<img src=\"images/".$image_swap[$num].".gif\">";
    }
else {
print "<a href=\"index.php\"><img src=\"images/".$image_swap[$num].".gif\"></a>";
    }
	
$bg_swap = array('a', 'rain', 'box', 'table', 'pipe');
$bgnum = rand(0,4);

?><p align="center"><img src="images/r_infinity.gif"></p></td>
<td valign="top" style="background-image: url('images/<?php echo $bg_swap[$bgnum];  ?>_bg.gif'); background-repeat: no-repeat; background-position: bottom center">
<p><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="300" height="60">
  <param name="movie" value="header/flash/stoked1.swf">
  <param name="quality" value="high">
  <embed src="header/flash/stoked1.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="300" height="60"></embed></object></p>
<img src="images/corner.gif"> <a onClick="javascript:window.open('sl/sort_signers.php','','scrollbars=yes,height=520,width=640', false);" href="javascript:void(0);">View stoked signers</a>


<br><img src="images/corner.gif"><a href="printform.html"> Print a signer form</a>

	</td>
 </tr>
</table>