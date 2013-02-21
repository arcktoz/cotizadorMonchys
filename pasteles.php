<!DOCTYPE html>
<html>
   <lang="es">
   <meta charset="utf8">
   
   <head>
      <title>Registro de Pasteles</title>
         
      <link rel="stylesheet" href="css/regStyles.css" type="text/css" media="all" />   
      <link rel="stylesheet" href="css/kalendar.css" type="text/css" media="all" />       
      <link rel="stylesheet" type="text/css" href="css/grid.css">
      <link rel="stylesheet" type="text/css" href="css/grid.css">
      <script src="openjs/jquery.js"></script>
      <script src="openjs/grid.js"></script>
      
      <script type="text/javascript" src="js/libs/jquery-1.7.2.min.js"></script>    
      <script src="js/jquery.maskedinput.js" type="text/javascript"> </script>
      <script language="javascript" type="text/javascript" src="js/jquery.kalendar.min.js"></script>
       <script>
         $(function() {
               $(".editableAddDelete").loadGrid({
               inlineEditing:true,
               adding:true,
               deleting:true,
               deleteConfirm:"Code"
            });
         });   
      </script>            
   </head>

   <body>   
      <header>
         <div style="position:relative; left:45%;">
               <img src="img/logob.png" style="width:200"/>
         </div>
      </header>
     <div id="cuerpo_tabla"> 
     <table  class="grid editableAddDelete" action="ajax.php" title="Tabla de Pasteles Especiales">
         <tr>
          <!-- <th col="IsActive" editable="checkbox">Active</th>-->
            <th col="codigo_microsip" editable="text">Codigo</th>
            <th col="nombre" editable="text">Nombre</th>
            <th col="detalle" editable="text">Detalle</th>
            <th col="tipo" editable="select" nulltext="None Selected" width="150">Tipo</th>
            <th col="sabor" editable="select" nulltext="None Selected" width="150">Sabor</th>
            <th col="betun" editable="select" nulltext="None Selected" width="150">Betun</th>
            <th col="relleno" editable="select" nulltext="None Selected" width="150">Relleno</th>
            <th col="precio" currency="$" editable="text">Precio</th>
         </tr>
      </table>
      </div>
      <footer>
         <a href="http://www.monchys.com" id="back">By Monchys</a>
      </footer>
   </body>
   
</html>
   