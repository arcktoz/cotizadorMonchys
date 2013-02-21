<?php
	// conexion a la d
	mysql_connect("localhost","root","");
	mysql_select_db("cotizador");
	
	// Solicitar la clase
	require_once("grid.php");
	// Cargamos la grilla con una tabla
	$grid = new Grid("pasteles");

	//agregado pasa joins y complex fields
	 $grid->joins=array("LEFT JOIN tipos ON (tipos.id_tipo = pasteles.id_tipo)", "LEFT JOIN sabores ON (sabores.id_sabor = pasteles.id_sabor)",
	 	"LEFT JOIN betunes ON (betunes.id_betun = pasteles.id_betun)", "LEFT JOIN rellenos ON (rellenos.id_relleno = pasteles.id_relleno)");
   	 $grid->fields=array("tipo"=>"tipos.nombre", "sabor"=>"sabores.nombre", "betun"=>"betunes.nombre", "relleno"=>"rellenos.nombre");
  /* 	$grid->load();
	echo json_encode($grid->data);*/
	if(isset($_POST['save'])) {
      echo $grid->save();
   }/* else  if(isset($_POST['select'])) {
      // you don't have to switch im just showing what you would do for multiple drop downs
      switch($_POST['col']) {
         case "tipo":
            $grid->table = "tipos";
            // makeSelect takes 2 params.  First is the column that is Value of each <option value='ME'>
            // second is the column that will be used for display or inside of the <option>ME</option> tags
            $grid->makeSelect("id_tipo","tipo");
            echo json_encode($grid->data);
            break;
         default:
            break;
      }*/else if (isset($_POST['add'])) {
      echo $grid->add();
   } else if (isset($_POST['delete'])) {
      echo $grid->delete();
   } else {
      $grid->load();
      echo json_encode($grid->data);
   }
?>