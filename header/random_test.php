<?php 

$image_swap = array(0 => 'benefactor', 1 => 'flag', 2 => 'circle', 3 => 'square', 4 => 'diamond');

$num = rand(0,4);
print_r ($image_swap);

print "<p><img src=\"../images/".$image_swap[$num].".gif\"></p>";

?>