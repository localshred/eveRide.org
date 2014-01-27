<?php
$rand_sp = array(
		array(img=>'images/repanim.gif', link=>'represent_f.php#rep',),
                array(img=>'images/bandanim.gif', link=>'band_f.php'),
                array(img=>'images/thefight.gif', link=>'http://people.cornell.edu/pages/cce3/stickfigures/fight3.swf" target="_blank"')
                		);

$new_num1 = rand(0,2);

/*
$new_num2 = rand(3,5);
$new_num3 = rand(6,8);
*/

?>
<table border="0" cellspacing="0" cellpadding="3" width="140"  class="body">
<tr>
        <td><strong>Sponsors and Links</strong></td>
</tr>
<tr>
        <td><img src="images/fullmerspons.gif"><br>website coming soon...</td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td>Did you know</td>
</tr>
<tr>
	<td style="background-image: url('images/lilkbg.gif'); background-repeat: no-repeat"><?php include "scroller.html"; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td><a href="<?php echo $rand_sp[$new_num1]['link']; ?>"><img src="<?php echo $rand_sp[$new_num1]['img']; ?>"></a></td>
</tr>
<!--
<tr>
	<td><a href="<?php echo $rand_sp[$new_num2]['link']; ?>"><img src="<?php echo $rand_sp[$new_num2]['img']; ?>"></a></td>
</tr>
<tr>
	<td><a href="<?php echo $rand_sp[$new_num3]['link']; ?>"><img src="<?php echo $rand_sp[$new_num3]['img']; ?>"></a></td>
</tr>
-->
</table>