
	<div class="ticketDetalleCotizado">
	<!--<h3 id="titlDetalle">Detalles del Pastel Seleccionado</h3>-->
	</div>
	
	<?php 
	 session_start();
		include('conexion.php');		
		$consulta = "
		
		SELECT pasteles.id_pastel, pasteles.nombre pastel,tipos.nombre tipo,sabores.nombre sabor,betunes.nombre betun,rellenos.nombre relleno, precio, pasteles.imagen imagen FROM pasteles 
		
		LEFT JOIN tipos ON tipos.id_tipo = pasteles.id_tipo
		LEFT JOIN sabores ON sabores.id_sabor = pasteles.id_sabor
		LEFT JOIN betunes ON betunes.id_betun = pasteles.id_betun
		LEFT JOIN rellenos ON rellenos.id_relleno = pasteles.id_relleno
		
		WHERE pasteles.id_tipo={$_POST['tipo']} AND pasteles.id_sabor={$_POST['sabor']} AND pasteles.id_betun={$_POST['betun']} AND pasteles.id_relleno={$_POST['relleno']}
				
		";
		
		$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
		$total = mysql_num_rows($resultado);
		
		
		// TRAE DATOS DE DECORADOS
		$decoradosData= array();
		$queryDecorados ="SELECT * FROM decorados";
		$resultadoDecorados = mysql_query($queryDecorados, $conexion) or die(mysql_error());
		while ( $decorado = mysql_fetch_array($resultadoDecorados)){
		
		  $decoradosData[]= $decorado;
		
		}
		
		// TRAE DATOS DE SERVICIO A DOMICILIO
		$serviciosData= array();
		$queryServicios ="SELECT * FROM servicios";
		$resultadoServicios = mysql_query($queryServicios, $conexion) or die(mysql_error());
		while ( $servicio = mysql_fetch_array($resultadoServicios)){
		
		  $serviciosData[]= $servicio;
		
		}
		
		if ($total> 0) {
			while ($columna = mysql_fetch_array($resultado)):

	?>

	<div id="pastel">
	<?php 
		echo "<h3>{$columna['pastel']}</h3>";			
	?>
	</div>
	
	<div id="titltDetalleCotizado">
	<?php 		
		echo "<p><strong>Tipo:</strong> {$columna['tipo']}</p>";
		echo "<p><strong>Sabor:</strong> {$columna['sabor']}</p>";
		echo "<p><strong>Bet&uacute;n:</strong> {$columna['betun']}</p>";
		echo "<p><strong>Relleno:</strong> {$columna['relleno']}</p>";
		echo "<p><strong>Precio del Pastel:</strong> $ {$columna['precio']}</p>";	
	?>
	</div>
	
	<div id="extras">
	
	<form action='recibepedido.php' method='post' id='myform'>

		<h3>Extras</h3>
		<div>	
			<label><input value='<?php echo $decoradosData[0]['id_decorado']; ?>' id="fotoPastel" onClick="verificaFoto()" name="fotografia" type="checkbox" value="fotografia" />Fotografia</label><br>
			<label><input value='<?php echo $decoradosData[1]['id_decorado']; ?>'  id="figuraPastel" onClick="verificaFigura()" name="figura" type="checkbox" value="figura" />Figura</label><br>
			<label><input  value='<?php echo $serviciosData[0]['id_servicio']; ?>'  id="servicioPastel" onClick="verificaServicio()"  name="servicio" type="checkbox" value="servicio" />Servicio a Domicilio</label><br>
		</div>
		
		<div id="costos">
			<h3>Costo del Pastel</h3>			
			<?php			
				echo "<p id='costoPastelLabel'>$ {$columna['precio']}</p>";	
				echo "<input  name='precio' id='costoPastel' type='hidden' value='{$columna['precio']}' />";	
				echo "<input  name='pastel_id'  type='hidden' value='{$columna['id_pastel']}' />";	
				echo "<input  name='cliente_id'  type='hidden' value='{$_SESSION['id_cliente']}' />";	
			?>			
		</div>
		
	</form>
	
	</div>

	<img id="ticket2" src="img/pasteles/<?php echo $columna['imagen']?>" width="300px">
		
	<?php 
			endwhile;
	}
	else
		echo '	<script language="javascript">
					alert("Falta algo en esta combinación o no existe un pastel con estas características, verifica tu combinación.");
					/*window.location.href="cotizador.php";*/
				</script>
			 ';
	?>
	
	<div style="margin:30px 0px 0px 14px">
		<button onClick="document.forms['myform'].submit();" type="button" id="realizaPedido" class="realizarPedido" value="realizaPedido">Realiza tu Pedido</button>						
	</div>
	
<!--REALIZA LA SUMA O RESTA EN LOS SERVICIOS Y DECORADOS-->
	<script>	
		function verificaFoto(){

				var checkeado=$("#fotoPastel").attr("checked");
				if(checkeado) {
					$("#costoPastelLabel").text( '$ ' + (parseFloat($("#costoPastel").val()) +  parseFloat(<?php echo $decoradosData[0]['precio']; ?>)) );
					$("#costoPastel").val( parseFloat($("#costoPastel").val()) +  parseFloat(<?php echo $decoradosData[0]['precio']; ?>) );
					
				} else {
				 $("#costoPastelLabel").text( '$ '+(parseFloat($("#costoPastel").val()) -  parseFloat(<?php echo $decoradosData[0]['precio']; ?>)));
				 $("#costoPastel").val( parseFloat($("#costoPastel").val()) -  parseFloat(<?php echo $decoradosData[0]['precio']; ?>));
				}
				
			}
			
			function verificaFigura(){

				var checkeado=$("#figuraPastel").attr("checked");
				if(checkeado) {
					$("#costoPastelLabel").text( '$ ' + (parseFloat($("#costoPastel").val()) +  parseFloat(<?php echo $decoradosData[1]['precio']; ?>)) );
					$("#costoPastel").val( parseFloat($("#costoPastel").val()) +  parseFloat(<?php echo $decoradosData[1]['precio']; ?>) );
					
				} else {
				 $("#costoPastelLabel").text( '$ '+(parseFloat($("#costoPastel").val()) -  parseFloat(<?php echo $decoradosData[1]['precio']; ?>)));
				 $("#costoPastel").val( parseFloat($("#costoPastel").val()) -  parseFloat(<?php echo $decoradosData[1]['precio']; ?>));
				}
				
			}
			
			function verificaServicio(){

				var checkeado=$("#servicioPastel").attr("checked");
				if(checkeado) {
					$("#costoPastelLabel").text( '$ ' + (parseFloat($("#costoPastel").val()) +  parseFloat(<?php echo $serviciosData[0]['precio']; ?>)) );
					$("#costoPastel").val( parseFloat($("#costoPastel").val()) +  parseFloat(<?php echo $serviciosData[0]['precio']; ?>) );
					
				} else {
				 $("#costoPastelLabel").text( '$ '+(parseFloat($("#costoPastel").val()) -  parseFloat(<?php echo $serviciosData[0]['precio']; ?>)));
				 $("#costoPastel").val( parseFloat($("#costoPastel").val()) -  parseFloat(<?php echo $serviciosData[0]['precio']; ?>));
				}
				
			}	
	</script>
	