<html>
<body>
<?php
function listado($descriptor, $objeto, $nivel) {
	echo "<u>$descriptor</u>:<br/>\n";
	echo "<div style='border: 1px solid gray; margin-left: 1cm'>Datos $descriptor: (nivel: $nivel)<br />\n";
	foreach ($objeto as $item => $dato)	{
		echo "$item = $dato <br />";
		if (is_Array($dato) && ($nivel < 5) && ($item != $descriptor))
			listado($descriptor."[ ".$item." ]", $dato, $nivel + 1);
	}
	echo "</div>";
}

listado ("GET", $_GET, 0);
echo "<hr />";
listado ("POST", $_POST, 0);
echo "<hr />";
listado ("FILES", $_FILES, 0);
?>
</body>
</htnl>
