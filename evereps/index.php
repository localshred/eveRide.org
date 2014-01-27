<?php

$user = $_SERVER['PHP_AUTH_USER'];

$cook = setcookie('user',$user);
//$cook = setcookie('user','');

if (!$cook) {
    print "You must enable cookies on your browser to continue";
}

header("Location: https://www.everide.org/~everideo/evereps/everteam.php");
?>