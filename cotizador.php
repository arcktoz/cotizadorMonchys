<!DOCTYPE html>
<html lang="es">
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	
	<?php 
		include('conexion.php');
	?>
	
	<head>		
		<title>Bienvenido</title>
			
		<link rel="stylesheet" href="css/resetstylesheet.css" type="text/css" media="all" />
		<link rel="stylesheet" href="jquery-ui-1.7.2/css/ui-lightness/jquery-ui-1.7.2.custom.css" type="text/css" media="all" />
		<link rel="stylesheet" href="css/cotizastyles.css" type="text/css" media="all" />
		<link rel="stylesheet" href="fonts/stylesheet.css" type="text/css" media="all"/>
				
		<script type="text/javascript" src="jquery-1.3.2.js"></script>
		<script type="text/javascript" src="jquery-ui-1.7.2/development-bundle/ui/jquery-ui-1.7.2.custom.js"></script>
		<script type="text/javascript" src="jquery.jcoverflip.js"></script>
		<script type="text/javascript" src="js/animaciones.js"></script>
		<script type="text/javascript" src="jquery.scrollTo-1.4.2.js"></script>
		<!--<script type="text/javascript" src="jquery.easing.1.3.js"></script>-->
		<!--<script type="text/javascript" src="jquery.easing.compativility.js"></script>-->
		
		
		<style>
			
		</style>
			
	</head>
	
	<body>
	
		<header>
<!--		
		<div>
			<img src="img/header.png" style="width:100%; height:auto">
		</div>
-->
		
			<div>			
				<div id="logo">
					<img src="img/logos/monchysc.png" />
				</div>
				
				<div id="etiqueta">
					<h1>Cotizamos tu Pastel</h1>
					<a href="cerrar.php">Cerrar sesion</a>
				</div>
				
				<div id="bienvenido">					
					<?php 
						session_start(); //Inicializamos sesion		
							if(isset($_SESSION['nombre']))
								echo "<p>Bienvenido al Sistema</br><span>{$_SESSION['nombre']}</span></p>";
								
							else
								header('Location: index.php');
					?>					
				</div>
				
				<div style="clear:both"></div>			
				
			</div>
			
		</header>
<!--
<div style="width:100%; height:30px; background:rgba(123, 40, 0, 0.7)">
</div>
-->		
	<div id="mainPrincipal">	
		<section>	<!--background:#f5cb3f-->		
			<div class="contenedores ">
				<div id="wrapperTipos">
					<ul id="flipTipos">
						<?php 
							$consulta = "SELECT * FROM tipos ORDER BY nombre ASC";
							$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
							$total = mysql_num_rows($resultado);
						
							if ($total> 0) {
								while ($columna = mysql_fetch_array($resultado)):
						?>
						
						<!--<li title="<?php echo $columna['nombre']; ?>" onClick='localStorage["tipo"]=<?php echo $columna['id_tipo']; ?>; $("#mitipo").text(" Tipo: <?php echo $columna['nombre']; ?>");'>-->
						<li onClick='localStorage["tipo"]=<?php echo $columna['id_tipo']; ?>; $("#mitipo").text("Tipo: <?php echo $columna['nombre']; ?>");'>
							<img src="img/tipos/<?php echo $columna['imagen']; ?>"/>
							<div class="tooltip"><span><?php echo $columna['descripcion']; ?></span></div>						
						</li>						
							<?php 
								endwhile;
							}
							?>						
					</ul>
				</div>
					<a id="titt">¿Que pastel te gusta?</a>					
			</div>
			
			<div class="contenedores">
				<div id="wrapperSabores">
					<ul id="flipSabores">
						<?php 
							$consulta = "SELECT * FROM sabores ORDER BY nombre ASC";
							$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
							$total = mysql_num_rows($resultado);
				
							if ($total> 0) {
								while ($columna = mysql_fetch_array($resultado)):
							?>
						
						<li onClick='localStorage["sabor"]=<?php echo $columna['id_sabor']; ?>; $("#misabor").text("Sabor: <?php echo $columna['nombre']; ?>");'>
							<img src="img/sabores/<?php echo $columna['imagen']; ?>" />
						<div class="tooltip"><span><?php echo $columna['descripcion']; ?></span></div>
						</li>
						
							<?php 
								endwhile;
							}
							?>
					</ul>
				</div>
					<a id="tits">¿De que sabor?</a>
			</div>

			<div class="contenedores">	
				<div id="wrapperBetunes">
					<ul id="flipBetunes">
						<?php 
							$consulta = "SELECT * FROM betunes ORDER BY nombre ASC";
							$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
							$total = mysql_num_rows($resultado);
				
							if ($total> 0) {
								while ($columna = mysql_fetch_array($resultado)):
						?>
						
						<li onClick='localStorage["betun"]=<?php echo $columna['id_betun']; ?>; $("#mibetun").text("Betun: <?php echo $columna['nombre']; ?>");'>
							<img src="img/betunes/<?php echo $columna['imagen']; ?>" />
						<div class="tooltip"><span><?php echo $columna['descripcion']; ?></span></div>
						</li>
						
							<?php 
								endwhile;
							}
							?>
					</ul>
				</div>
					<a id="titb">¿Con que bet&uacute;n?</a>
			</div>   	

			<div class="contenedores">	
				<div id="wrapperRellenos">
					<ul id="flipRellenos">
						<?php 
							$consulta = "SELECT * FROM rellenos ORDER BY nombre ASC";
							$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
							$total = mysql_num_rows($resultado);
				
							if ($total> 0) {
								while ($columna = mysql_fetch_array($resultado)):
						?>
						
						<li onClick='localStorage["relleno"]=<?php echo $columna['id_relleno']; ?>; $("#mirelleno").text("Relleno: <?php echo $columna['nombre']; ?>");'>
							<img src="img/rellenos/<?php echo $columna['imagen']; ?>" />
						<div class="tooltip"><span><?php echo $columna['descripcion']; ?></span></div>
						</li>

						<?php 
								endwhile;
							}
						?>
					</ul>
				</div>
					<a id="titr">¿Con que relleno?</a> 
			</div>	
		</section>		
		<aside>	
			<div class="ticketDetalle">	
				<h3 id="titlDetalle">Tu selecci&oacute;n:</h3>		
				<div id="detalles">				
					<p id='mitipo'></p>
					<p id='misabor'></p>
					<p id='mibetun'></p>
					<p id='mirelleno'></p>				
				</div>			
			</div>
			
			<div style="margin:12px 0px 15px 14px">
				<button type="button" id='enlaceajax' class="botcotizar" value="cotizar">Cotizar</button>						
			</div>
			
			<div id="destino"></div>						
		</aside>		
	</div>
		<div style="clear:both"></div>		
		<footer>
			<!--<img style="width:100%" src="img/abejas.gif" />-->
			<div>
				<p>&copy; 2012 Cotizador  de  Pasteles  Especiales  Monchys</p>
			</div>
		</footer>
	</body>
</html>