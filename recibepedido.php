<?php
	session_start();
	include('conexion.php');
	//print_r($_POST);/*PARA SABER LAS VARIABLES Y VALORES QUE SE ESTAN ENVIANDO*/			
	$foto = ( isset($_POST['fotografia']) )? $_POST['fotografia']:0;
	$fig = ( isset($_POST['figura']) )? $_POST['figura']:0;
	$id_servicio = ( isset($_POST['servicio']) )? $_POST['servicio']:0;
	$precioCotizado = $_POST['precio']; //VARIABLE PARA EL VALOR COTIZADO DEL PASTEL//
	$id_pastel = $_POST['pastel_id'];
	$id_cliente = $_POST['cliente_id'];	
?>

<html lang="es">	
	<meta equiv="Content-Type" content="text/html; charset=UTF-8" />
	<head>
		<title>Cotizador de pasteles Monchys</title>
			
		<link rel="stylesheet" href="css/resetstylesheet.css" type="text/css" media="all"/>
		<link type="text/css" href="css/rpedidostyles.css" rel="stylesheet" media="all" />	
		<link type="text/css" href="css/botones.css" rel="stylesheet" media="all"/>
		<link type="text/css" href="fonts/stylesheet.css" rel="stylesheet" media="all"/>
		
		<script src="js/libs/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
		<script src="js/botones.js" type="text/javascript"></script>
		<script language="JavaScript" src="js/funcioneslightbox.js"> </script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("input.file").si();				
			});
		</script>	
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="js/gmaps.js"></script>
		
	</head>

	<body onload="ini()">
	<!--CONTENEDORES DEL LIGHTBOX PARA FIGURAS-->
		<div id="over" class="overbox">
	<!--CONTENIDO DEL LIGHTBOX-->	
			<div id="content">
				<p id="tittle">
				Selecciona una figura para tu pastel haciendo click sobre ella, <br/>despu&eacute;s cierra la ventana para continuar con tu pedido.  
				</p>
				<ul id="categorias">
					<?php 
						$consulta = "SELECT * FROM figuras";
						$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
						$total = mysql_num_rows($resultado);
						
						if ($total> 0) {
							while ($columna = mysql_fetch_array($resultado)):
						?>
								
					<li  onClick='localStorage["idFigura"]=<?php echo $columna['id']; ?>; $("#idFigura").text("Figura Seleccionada: <?php echo $columna['nombre']; ?>");  $("#idFigura").val(localStorage["idFigura"]);'>				
						<p style="display: none;"><?php echo $columna['id']; ?></p>
						<img  id="figura<?php echo $columna['id']; ?>" onClick=" limpiaFigura(<?php echo $total; ?>); this.style.border='solid 2px #a6ce39';" class="imgLightBox" src="img/figuras/<?php echo $columna['imagen']; ?>" />			
						<!--this.style.border='solid 2px #a6ce39';-->
					</li>			
						<?php 
							endwhile;
						}				
						?>			
				</ul>
				
				<p id='idFigura'></p>
				
				<input type="button" onClick="javascript:hideLightbox();" value="Cerrar" id="cerrarLightBox"/>
			</div>
		</div>
		
		<div id="fade" class="fadebox">&nbsp;</div>

	<!--CONTENEDORES DEL LIGHTBOX PARA FIGURAS-->
		<div id="gover" class="overbox">
	<!--CONTENIDO DEL LIGHTBOX-->	
			<div id="mapa_canvas"></div>
			<input type="button" onClick="javascript:hidegLightbox();" value="Cerrar" id="cerrarLightBox"/>			
		</div>
		
		<div id="gfade" class="fadebox">&nbsp;</div>
		
	<!--INICIA CUERPO DEL FORMULARIO-->	
		<div id="cuerpo">
			<div id="posicionador">
			
				<div id="cabecera">
					<img id="logoMonchys" src="img/logos/monchys5c.png">
				</div>
				
				<div id="posicionform">
					<div id="baseform">
					<?php
						$consulta = "
							SELECT pasteles.nombre pastel, usuarios.nombre nomclie, usuarios.paterno, usuarios.materno, usuarios.correo 
							FROM pasteles, usuarios 
							WHERE id_pastel = ($id_pastel) AND id_cliente = ($id_cliente)
						";
						$resultado = mysql_query($consulta) or die(mysql_error());
						$total = mysql_num_rows($resultado);					
//echo "Hola $total";						
//echo "<br/>$foto <br/>$fig <br/>$id_servicio <br>$precioCotizado <br>$id_pastel <br>$id_cliente";
							
						if ($total> 0) {
							while ($columna = mysql_fetch_array($resultado)):
					?>				
						<form action="pedido.php" method="post" enctype="multipart/form-data" name="formu" id="datospedido" onsubmit="return validar(this)">								
							<!--FORMULARIO IZQUIERDA-->
							<div id="leftform" style="">
								<fieldset style="height:175px;">
									<legend>Datos del Cliente</legend>
										<label>Nombre:</label>
										<input class="dataPedido" readonly="" type="text" value='<?php echo"{$columna['nomclie']} {$columna['paterno']} {$columna['materno']}";?>'/>
										<input type="hidden" name="cliente" value="<?php echo"{$id_cliente}";?>">
										
										<label>Correo:</label>
										<input class="dataPedido" readonly="" type="text" name="correo" value='<?php echo"{$columna['correo']}";?>'/>
								</fieldset>
								
								<fieldset style="height:223px; margin-top:10px">
									<legend>Detalles del Pastel</legend>
										<label>Nombre del Pastel:</label>
										<input class="dataPedido" readonly="" type="text" value='<?php echo"{$columna['pastel']}";?>'/>
										<input type="hidden" name="pastel" value="<?php echo"{$id_pastel}";?>">	
										<label>Precio cotizado:</label>
										<input class="dataPedido" readonly="" type="text" name="precio" value='<?php echo"{$precioCotizado}";?>'/>
										<?php if($foto): ?>									
											<input type="file" class="file" name="fotografia"  id="fotografia" onchange="checkear(this);$('#fotografia2').val($('#fotografia').val())" accept="image/*" />
											<input type="hidden" name="fotografia2"  id="fotografia2" accept="image/*" />									
												<!--VALIDA PROPIEDADES DE LA IMAGEN-->
												<input type="hidden" disabled name="maxpeso" value="1048576" />
												<input type="hidden" disabled name="maxancho" value="1200" />
												<input type="hidden" disabled name="maxalto" value="1200" />
												<input type="hidden" readonly name="peso" value="0" />
												<input type="hidden" readonly name="ancho" value="0" />
												<input type="hidden" readonly name="alto" value="0" />								

										<?php else:?>								
											<!--CUANDO NO RECIBE NADA EN FOTO-->
											<input type="file" disabled="" class="file" name="fotografia" id="fotografia"/>
											<div class="tooltipFot"><span>Opci&oacute;n deshabilitada, no se cotiza fotograf&iacute;a</span></div>
										<?php endif; ?>
								
										<?php if($fig): ?>	
											<input onClick="javascript:showLightbox();" type="button" id="selfigura" name="figura"/>									
											<input id="idFigura" type="hidden" name="idFigura" />
										<?php else:?>
											<!--CUANDO NO RECIBE NADA EN FIGURA-->
											<input disabled="" type="button" id="selfigura"/>
											<div class="tooltipFig"><span>Opci&oacute;n deshabilitada, no se cotiza figura</span></div>
										<?php endif; ?>
								</fieldset>
								<!--<input type="file" class="" name="imagen" />-->								
							</div>
							
							<!--FORMULARIO DERECHA-->
							<div id="rightform" style="float:right">
								<fieldset id="rightfieldset">
									<legend>Detalles del Pedido</legend>
										<label>Domicilio para Entrega:<span id="editarDomicilio" onClick="editarMapa()" style="">Editar Domicilio</span> </label>
										<textarea class="dataPedido" id="dataDomicilio" style="margin-left:0px; width:222px;" <?php if($id_servicio==0){ echo 'disabled="" placeholder="Opci&oacute;n deshabilitada, no se cotizo Servicio a Domicilio"'; } ?> name="dom_entrega" rows="3" placeholder="Escribe la direcci&oacute;n completa o localizala con Google Maps."></textarea>
										<!--BOTON GMAPS-->
										<input id="tipo_domicilio" type='hidden' name='tipo_domicilio' value="escrito" />
										<input type="button" id="gmaps" onClick="javascript:showgLightbox();" <?php if($id_servicio==0){ echo 'disabled=""';} ?>/>
										
										<label>Fecha de Entrega: <i>(3 D&iacute;as habiles)</i></label>
										<input class="dataPedido" type='date' name='fecha_entrega' />
										
										<label>Observaciones:</label>
										<textarea class="dataPedido"  name="observaciones" rows="2" placeholder="Aclaraciones u Observaciones para tu pedido"></textarea>
										
										<label>Elige la sucursal m&aacute;s cercana para realizar tu pago:</label>
											<select class="dataPedido" name="tienda">												
												<option value="000001">SUCURSAL 5 DE FEBRERO</option>
												<option value="000002">SUCURSAL LIBERTAD</option>
												<option value="000003">SUCURSAL CUAHUT&Eacute;MOC</option>
												<option value="000004">SUCURSAL PASEO DURANGO</option>
												<option value="000005">SUCURSAL LA SALLE</option>
												<option value="000006">SUCURSAL MINA</option>
												<option value="000007">SUCURSAL CIRCUITO INTERIOR</option>
												<option value="000008">SUCURSAL DOLORES DEL R&Iacute;O</option>
												<option value="000009">SUCURSAL DOMINGO ARRIETA</option>
												<option value="000010">SUCURSAL VENDIMIA</option>
												<option value="000011">SUCURSAL POTASIO</option>
											</select>

									<button type="submit" id="procesaPedido" style="text-align: center" ></button>
								</fieldset>									
							</div>

<iframe  style="display:none;" src="previsor.php" id="ver" name="ver" style=" border-width: 0px; width: 50px; height: 50px;"><iframe>
							
					<?php
							endwhile;
						}
					?>	
						<!--DATOS OCULTOS ENVIADOS
						<input type="hidden" name="cliente" value="<?php //echo"{$id_cliente}";?>">
						<input type="hidden" name="pastel" value="<?php //echo"{$id_pastel}";?>">		-->									
						
						</form>
					</div>
				</div>
			</div>
		</div>

	</body>
	
</html>
