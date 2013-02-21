<?php
	// conexion a la d
	mysql_connect("localhost","root","");
	mysql_select_db("cotizador");
	
	// Solicitar la clase
	require_once("grid.php");
	// Cargamos la grilla con una tabla
	$grid = new Grid("pasteles");

	//agregado pasa joins y complex fields
	 $grid->joins=array("LEFT JOIN tipos ON (tipos.id_tipo = pasteles.id_tipo)");
   	 $grid->fields=array("tipo"=>"tipos.nombre");
   	$grid->load();
	echo json_encode($grid->data);
?>