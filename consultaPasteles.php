<?php
// Incluimos la clase

require_once 'Aco_DataGrid.php';

// Conectamos a la base de datos
include("conexion.php");
// Consulta
$sql = 'select codigo_microsip, nombre, detalle, precio from pasteles';

// Campos seleccionados
$campos = array('Codigo del producto' => 'codigo_microsip',
                'Nombre producto' => 'nombre',
                'Descripcion' => 'detalle',
                'Precio de venta' => 'precio');
        
// Objeto de la clase
$grid = new Aco_DataGrid;

// 
$grid->iniciar($sql, '', $campos, 'productosCSS');

// Mostrarmos el grid
$grid->gridMostrar();

$colores = array('#F0F9FC','#FFFFFF');
$grid->grid_BgColorFC( '#FFFFFF', $colores );
$grid->grid_PacingAndPadding(3, 3);
?>