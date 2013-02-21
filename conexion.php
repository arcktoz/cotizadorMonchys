<?php
	$conexion = mysql_connect("localhost", "systemas", "SysMon2013"); //solo BD cotizador	
	/*$conexion = mysql_connect("localhost", "root", "C04a120"); //Todas las BD's*/
	mysql_select_db("cotizador", $conexion);
	mysql_set_charset('utf8'); /*Evita que se muestren caracteres extraños	*/
?>