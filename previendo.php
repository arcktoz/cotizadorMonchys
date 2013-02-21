<?php
session_start();
$url = ($_SESSION["cont"] == "")
	? fread(fopen("webmaster.gif", "rb"), filesize("webmaster.gif"))
	: $_SESSION["cont"];
$tip = ($_SESSION["tipo"] == "")
	? "image/gif"
	: $_SESSION["tipo"];
header("Content-type: $tip");
echo $url;
?>
